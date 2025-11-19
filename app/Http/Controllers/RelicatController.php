<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class RelicatController extends Controller
{

    public function add(Request $request)
    {
        // Validate the request data
        $request->validate([
            'fonctionnaire_id' => 'required|string',
            'type_conge_id' => 'required|string',
            'nbr_jours_disponibles' => 'required|numeric|min:0',
            // date_conge may be omitted for additif; date_depot is used for additif deposits
            'date_conge' => 'sometimes|nullable|date',
            'date_depot' => 'sometimes|nullable|date',
            'is_additif' => 'sometimes|boolean',
            'annee' => 'sometimes|nullable|integer',
            'document' => 'sometimes|nullable|file|max:5120'
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            $fonctionnaireId = $request->input('fonctionnaire_id');
            $typeCongeId = $request->input('type_conge_id');
            $joursPris = (int) $request->input('nbr_jours_disponibles');
            $dateConge = $request->input('date_conge');
            $dateDepot = $request->input('date_depot');
            $isAdditif = $request->boolean('is_additif');
            $annee = $request->input('annee');

            // If this is an additif, force the type to 'administratif' (first matching TypeConge)
            if ($isAdditif) {
                $adminType = \App\Models\TypeConge::whereRaw('LOWER(nom) LIKE ?', ['%administratif%'])->first();
                if ($adminType) {
                    $typeCongeId = $adminType->id;
                }
            }

            // Get the TypeConge to check total days allowed per year
            $typeConge = \App\Models\TypeConge::findOrFail($typeCongeId);
            $joursTotalParAn = $typeConge->jours;

            // Determine the year: if additif and date_depot provided, use date_depot; otherwise date_conge
            $yearSource = $isAdditif && $dateDepot ? $dateDepot : $dateConge;
            $year = $yearSource ? date('Y', strtotime($yearSource)) : date('Y');
            $currentYear = date('Y');

            // Get all relicats for this fonctionnaire, type of leave, and year
            $fonctionnaire = \App\Models\Fonctionnaire::findOrFail($fonctionnaireId);
            $sumAdditifs = 0;
            $sumPris = 0;

            foreach ($fonctionnaire->relicats as $relicat) {
                if ($relicat->type_conge_id == $typeCongeId) {
                    // relicat may have date_depot (for additif) or date_conge; prefer date_depot
                    $relicatDateValue = property_exists($relicat, 'date_depot') && $relicat->date_depot ? $relicat->date_depot : ($relicat->date_conge ?? null);
                    $relicatYear = $relicatDateValue ? date('Y', strtotime($relicatDateValue)) : null;

                    if (!$relicatYear || $relicatYear == $year) {
                        // classify as additif or prise
                        $isAdd = (isset($relicat->is_additif) && $relicat->is_additif) ? true : false;
                        if ($isAdd) {
                            $sumAdditifs += (int) $relicat->nbr_jours_disponibles;
                        } else {
                            $sumPris += (int) $relicat->nbr_jours_disponibles;
                        }
                    }
                }
            }

            // If the year is different from the current year, adjust the calculation
            if ($year != $currentYear) {
                // For future years, we reset the count (each year gets a fresh allocation)
                if ($year > $currentYear) {
                    $joursDejaUtilises = 0;
                }
                // For past years, we keep the calculation as is
            }

            // Calculate remaining days (for non-additif validation)
            // Compute remaining days: base allocation + sumAdditifs - sumPris
            $joursRestantsAvant = $joursTotalParAn + $sumAdditifs - $sumPris;

            // If it's not an additif, ensure there are enough days for the requested prise
            if (!$isAdditif) {
                $joursRestants = $joursRestantsAvant - $joursPris;
                if ($joursRestants < 0) {
                    return redirect()->back()->with('error', 'Pas assez de jours disponibles pour ce type de congé. Il reste seulement ' . $joursRestantsAvant . ' jours.');
                }
            } else {
                // For additif, remaining after credit will be increased
                $joursRestants = $joursRestantsAvant + $joursPris; // here $joursPris is the credit amount
            }

            // Create and save the new relicat
            $reliquat = new \App\Models\Relicat();
            $reliquat->fonctionnaire_id = $fonctionnaireId;
            $reliquat->type_conge_id = $typeCongeId;
            // For additif: nbr_jours_disponibles is the credit amount, and date_depot stores deposit date
            $reliquat->nbr_jours_disponibles = $joursPris;
            $reliquat->date_conge = $isAdditif ? null : $dateConge;
            // Only set date_depot if the column exists in the database (migration may not have been run)
            if (Schema::hasColumn('relicats', 'date_depot')) {
                $reliquat->date_depot = $isAdditif ? $dateDepot : $dateConge;
            } else {
                // If the column does not exist, fallback: set date_conge to the provided date (or leave null for additif)
                $reliquat->date_conge = $isAdditif ? null : ($dateConge ?: $dateDepot);
            }
            // Additif metadata
            $reliquat->is_additif = $isAdditif ? 1 : 0;
            $reliquat->annee = $annee ?: ($yearSource ? date('Y', strtotime($yearSource)) : null);

            // Handle optional document upload
            if ($request->hasFile('document')) {
                try {
                    $path = $request->file('document')->store('relicats', 'public');
                    $reliquat->document = $path;
                } catch (\Exception $e) {
                    // ignore upload errors but log if necessary
                }
            }

            $reliquat->save();

            DB::commit();
            return redirect()->back()->with('success', 'Le reliquat a bien été ajouté pour le fonctionnaire. Il reste ' . $joursRestants . ' jours pour ce type de congé.');
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            // Handle the exception (e.g., log it, return an error response)
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }


    public function delete($id)
    {
        $reliquat = \App\Models\Relicat::find($id);
        $reliquat->delete();
        return redirect()->back()->with('success', 'La reliquat a bien éte supprimé ');
    }
}
