<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RelicatController extends Controller
{

    public function add(Request $request)
    {
        // Validate the request data (accept optional document)
        $request->validate([
            'fonctionnaire_id' => 'required|string',
            'type_conge_id' => 'required|string',
            'nbr_jours_disponibles' => 'required|integer',
            'date_conge' => 'required|date',
            'is_additif' => 'nullable|boolean',
            'annee' => 'nullable|integer',
            'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:2048',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            $fonctionnaireId = $request->input('fonctionnaire_id');
            $typeCongeId = $request->input('type_conge_id');
            $joursPris = $request->input('nbr_jours_disponibles');
            $dateConge = $request->input('date_conge');
            $isAdditif = $request->has('is_additif') ? boolval($request->input('is_additif')) : false;
            $annee = $request->input('annee') ? intval($request->input('annee')) : ( $dateConge ? date('Y', strtotime($dateConge)) : null );

            // Handle optional document upload
            $documentPath = null;
            if ($request->hasFile('document')) {
                $file = $request->file('document');
                $documentPath = $file->store('relicat_documents', 'public');
            }

            // Get the TypeConge to check total days allowed per year
            $typeConge = \App\Models\TypeConge::findOrFail($typeCongeId);
            $joursTotalParAn = $typeConge->jours;

            // Get the year from the date_conge
            $year = date('Y', strtotime($dateConge));
            $currentYear = date('Y');

            // Get all relicats for this fonctionnaire, type of leave, and year
            $fonctionnaire = \App\Models\Fonctionnaire::findOrFail($fonctionnaireId);
            $joursDejaUtilises = 0;

            foreach ($fonctionnaire->relicats as $relicat) {
                if ($relicat->type_conge_id == $typeCongeId) {
                    // Check if the relicat has a date and it's from the same year
                    $relicatYear = $relicat->date_conge
                        ? date('Y', strtotime($relicat->date_conge))
                        : null;

                    // Count relicats with no date or from the same year
                    if (!$relicatYear || $relicatYear == $year) {
                        $joursDejaUtilises += $relicat->nbr_jours_disponibles;
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

            // Calculate remaining days (only enforce when NOT an additif)
            $joursRestants = $joursTotalParAn - $joursDejaUtilises - $joursPris;

            if ($isAdditif) {
                // For additif reliquats, we allow adding days even if it exceeds the standard allocation.
                // Additifs are meant to increase the cumulatif for the specified year.
                // Keep $joursRestants as-is for informational message, but do NOT block creation.
            } else {
                // Check if there are enough days remaining for a normal reliquat
                if ($joursRestants < 0) {
                    return redirect()->back()->with('error', 'Pas assez de jours disponibles pour ce type de congé. Il reste seulement ' . ($joursTotalParAn - $joursDejaUtilises) . ' jours.');
                }
            }

            // Create and save the new relicat (supports additif and document)
            $reliquat = new \App\Models\Relicat();
            $reliquat->fonctionnaire_id = $fonctionnaireId;
            $reliquat->type_conge_id = $typeCongeId;
            $reliquat->nbr_jours_disponibles = $joursPris;
            $reliquat->date_conge = $dateConge;
            $reliquat->is_additif = $isAdditif;
            $reliquat->annee = $annee;
            if ($documentPath) {
                $reliquat->document = $documentPath;
            }
            $reliquat->save();

            DB::commit();
            if ($isAdditif) {
                return redirect()->back()->with('success', 'Additif ajouté : +' . $joursPris . ' jours (année ' . ($annee ?? $year) . ').');
            }

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
