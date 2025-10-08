<?php

namespace App\Http\Controllers;

use App\Models\Fonctionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoriqueMutationController extends Controller
{
    public function add(Request $request)
    {

        // Validate the request data
        $request->validate([
            'fonctionnaire_id' => 'nullable|string',
            'type_mutation_id' => 'nullable|string',
            'date_mutation' => 'nullable|date',
            'date_note' => 'nullable|date',
            'ref_note' => 'nullable|string',
            'fichiers_notes' => 'nullable|file|mimes:pdf,doc,docx,jpg,png,jpeg',
            'formation_sanitaire_origine_id' => 'nullable|string',
            'formation_sanitaire_destination_id' => 'nullable|string',
            'remarque' => 'nullable|string',
            'date_prise_en_service' => 'nullable|date',
            'date_cessation_service' => 'nullable|date',
            'ancien_service_id' => 'nullable|string',
            'nouveau_service_id' => 'nullable|string',
            'ancien_fonction_id' => 'nullable|string',
            'nouveau_fonction_id' => 'nullable|string',
            'ancien_specialite_id' => 'nullable|string',
            'nouveau_specialite_id' => 'nullable|string',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Check if the fonctionnaire has already mutated before
            $get_when_ever_functionnaire_has_alreadymutated_before_or_not = \App\Models\HistoriqueMutation::where('fonctionnaire_id', $request->input('fonctionnaire_id'))->get();
            // dd(count($get_when_ever_functionnaire_has_alreadymutated_before_or_not));
            if (count($get_when_ever_functionnaire_has_alreadymutated_before_or_not) == 0) {
                // dd(count($get_when_ever_functionnaire_has_alreadymutated_before_or_not),'yes it is 0');
                $historiqueMutation = new \App\Models\HistoriqueMutation();
                $fonctionnerfirstdata = Fonctionnaire::where('id', $request->input('fonctionnaire_id'))->first();

                // Check if fonctionnaire exists
                if (!$fonctionnerfirstdata) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Fonctionnaire non trouvé avec l\'ID fourni.');
                }

                $historiqueMutation->fonctionnaire_id = $request->input('fonctionnaire_id');
                $historiqueMutation->type_mutation_id = $fonctionnerfirstdata->type_mutation;
                $historiqueMutation->date_mutation = $fonctionnerfirstdata->date_mutation;
                $historiqueMutation->date_note = $fonctionnerfirstdata->date_note;
                $historiqueMutation->ref_note = $fonctionnerfirstdata->ref_note;
                $historiqueMutation->fichiers_notes = $fonctionnerfirstdata->fichier_note;
                $historiqueMutation->formation_sanitaire_origine_id = $fonctionnerfirstdata->nom_formation_sanitaire_id;
                $historiqueMutation->formation_sanitaire_destination_id = $fonctionnerfirstdata->nom_formation_sanitaire_id;
                $historiqueMutation->date_prise_en_service = $fonctionnerfirstdata->date_prise_en_service;
                $historiqueMutation->ancien_service_id = $fonctionnerfirstdata->service_id;
                $historiqueMutation->nouveau_service_id = $fonctionnerfirstdata->service_id;
                $historiqueMutation->ancien_fonction_id = $fonctionnerfirstdata->fonction_id;
                $historiqueMutation->nouveau_fonction_id = $fonctionnerfirstdata->fonction_id;
                $historiqueMutation->ancien_specialite_id = $fonctionnerfirstdata->specialite_grade_id;
                $historiqueMutation->nouveau_specialite_id = $fonctionnerfirstdata->specialite_grade_id;

                $historiqueMutation->save();
            }

            $historiqueMutation = new \App\Models\HistoriqueMutation();
            $historiqueMutation->fonctionnaire_id = $request->input('fonctionnaire_id');
            $historiqueMutation->type_mutation_id = $request->input('type_mutation_id');
            $historiqueMutation->date_mutation = $request->input('date_mutation');
            $historiqueMutation->date_note = $request->input('date_note');
            $historiqueMutation->ref_note = $request->input('ref_note');

            // Handle file upload if provided
            if ($request->hasFile('fichiers_notes')) {
                $path = 'fichiers_notes';
                if (!file_exists(public_path($path))) {
                    mkdir(public_path($path), 0777, true);
                }
                $historiqueMutation->fichiers_notes = $request->file('fichiers_notes')->store($path, 'public');
            }
            $historiqueMutation->formation_sanitaire_origine_id = $request->input('formation_sanitaire_origine_id');
            $historiqueMutation->formation_sanitaire_destination_id = $request->input('formation_sanitaire_destination_id');
            $historiqueMutation->remarque = $request->input('remarque');
            $historiqueMutation->date_prise_en_service = $request->input('date_prise_en_service');
            $historiqueMutation->date_cessation_service = $request->input('date_cessation_service');
            $historiqueMutation->ancien_service_id = $request->input('ancien_service_id');
            $historiqueMutation->nouveau_service_id = $request->input('nouveau_service_id');
            $historiqueMutation->ancien_fonction_id = $request->input('ancien_fonction_id');
            $historiqueMutation->nouveau_fonction_id = $request->input('nouveau_fonction_id');
            $historiqueMutation->ancien_specialite_id = $request->input('ancien_specialite_id');
            $historiqueMutation->nouveau_specialite_id = $request->input('nouveau_specialite_id');
            $historiqueMutation->save();

            $fonctionnaire = \App\Models\Fonctionnaire::find($request->input('fonctionnaire_id'));

            // Check if fonctionnaire exists
            if (!$fonctionnaire) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Fonctionnaire non trouvé avec l\'ID fourni.');
            }

            $fonctionnaire->fonction_id = $request->input('nouveau_fonction_id');
            $fonctionnaire->nom_formation_sanitaire_id = $request->input('formation_sanitaire_destination_id');
            $fonctionnaire->service_id = $request->input('nouveau_service_id');
            $fonctionnaire->specialite_grade_id = $request->input('nouveau_specialite_id');
            $fonctionnaire->type_mutation = $request->input('type_mutation_id');
            $fonctionnaire->date_mutation = $request->input('date_mutation');
            $fonctionnaire->date_prise_en_service = $request->input('date_prise_en_service');
            $fonctionnaire->date_note = $request->input('date_note');
            $fonctionnaire->ref_note = $request->input('ref_note');

            // Only update file if one was uploaded
            if ($request->hasFile('fichiers_notes')) {
                $fonctionnaire->fichier_note = $historiqueMutation->fichiers_notes;
            }
            $fonctionnaire->save();

            // Update the fonctionnaire's type_mutation to reflect the latest mutation/position
            $this->updateFonctionnaireLatestMutationType($fonctionnaire);

            // Commit the transaction
            DB::commit();
            return redirect()->back()->with('success', 'La mutation a bien été ajoutée pour le fonctionnaire : ' . ($fonctionnaire->nom ?? 'N/A') . ' ' . ($fonctionnaire->prenom ?? 'N/A'));
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            // Handle the exception (e.g., log it, return an error response)
            dd($e);
        }
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'type_mutation_id' => 'nullable|string',
            'date_mutation' => 'nullable|date',
            'date_note' => 'nullable|date',
            'ref_note' => 'nullable|string',
            'fichiers_notes' => 'nullable|file|mimes:pdf,doc,docx,jpg,png,jpeg',
            'formation_sanitaire_origine_id' => 'nullable|string',
            'formation_sanitaire_destination_id' => 'nullable|string',
            'remarque' => 'nullable|string',
            'date_prise_en_service' => 'nullable|date',
            'date_cessation_service' => 'nullable|date',
            'ancien_service_id' => 'nullable|string',
            'nouveau_service_id' => 'nullable|string',
            'ancien_fonction_id' => 'nullable|string',
            'nouveau_fonction_id' => 'nullable|string',
            'ancien_specialite_id' => 'nullable|string',
            'nouveau_specialite_id' => 'nullable|string',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            $historiqueMutation = \App\Models\HistoriqueMutation::find($id);
            if (!$historiqueMutation) {
                return redirect()->back()->with('error', 'Mutation non trouvée');
            }

            // Update the mutation record
            $historiqueMutation->type_mutation_id = $request->input('type_mutation_id');
            $historiqueMutation->date_mutation = $request->input('date_mutation');
            $historiqueMutation->date_note = $request->input('date_note');
            $historiqueMutation->ref_note = $request->input('ref_note');
            $historiqueMutation->formation_sanitaire_origine_id = $request->input('formation_sanitaire_origine_id');
            $historiqueMutation->formation_sanitaire_destination_id = $request->input('formation_sanitaire_destination_id');
            $historiqueMutation->remarque = $request->input('remarque');
            $historiqueMutation->date_prise_en_service = $request->input('date_prise_en_service');
            $historiqueMutation->date_cessation_service = $request->input('date_cessation_service');
            $historiqueMutation->ancien_service_id = $request->input('ancien_service_id');
            $historiqueMutation->nouveau_service_id = $request->input('nouveau_service_id');
            $historiqueMutation->ancien_fonction_id = $request->input('ancien_fonction_id');
            $historiqueMutation->nouveau_fonction_id = $request->input('nouveau_fonction_id');
            $historiqueMutation->ancien_specialite_id = $request->input('ancien_specialite_id');
            $historiqueMutation->nouveau_specialite_id = $request->input('nouveau_specialite_id');

            // Handle file upload if provided
            if ($request->hasFile('fichiers_notes')) {
                $path = 'fichiers_notes';
                if (!file_exists(public_path($path))) {
                    mkdir(public_path($path), 0777, true);
                }
                // Delete old file if exists
                if ($historiqueMutation->fichiers_notes && file_exists(public_path($historiqueMutation->fichiers_notes))) {
                    unlink(public_path($historiqueMutation->fichiers_notes));
                }
                $historiqueMutation->fichiers_notes = $request->file('fichiers_notes')->store($path, 'public');
            }

            $historiqueMutation->save();

            // Update the fonctionnaire's current information with the latest mutation data
            $fonctionnaire = Fonctionnaire::find($historiqueMutation->fonctionnaire_id);
            $fonctionnaire->service_id = $request->input('nouveau_service_id');
            $fonctionnaire->fonction_id = $request->input('nouveau_fonction_id');
            $fonctionnaire->specialite_grade_id = $request->input('nouveau_specialite_id');
            $fonctionnaire->type_mutation = $request->input('type_mutation_id');
            $fonctionnaire->date_mutation = $request->input('date_mutation');
            $fonctionnaire->date_prise_en_service = $request->input('date_prise_en_service');
            $fonctionnaire->date_note = $request->input('date_note');
            $fonctionnaire->ref_note = $request->input('ref_note');
            if ($request->hasFile('fichiers_notes')) {
                $fonctionnaire->fichier_note = $historiqueMutation->fichiers_notes;
            }
            $fonctionnaire->save();

            // Update the fonctionnaire's type_mutation to reflect the latest mutation/position
            $this->updateFonctionnaireLatestMutationType($fonctionnaire);

            // Commit the transaction
            DB::commit();
            return redirect()->back()->with('success', 'La mutation a bien été mise à jour pour le fonctionnaire : ' . ($fonctionnaire->nom ?? 'N/A') . ' ' . ($fonctionnaire->prenom ?? 'N/A'));
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $historiqueMutation = \App\Models\HistoriqueMutation::find($id);
        $fonctionnaire = $historiqueMutation->fonctionnaire;
        $historiqueMutation->delete();

        // Update the fonctionnaire's type_mutation after deletion
        if ($fonctionnaire) {
            $this->updateFonctionnaireLatestMutationType($fonctionnaire);
        }

        return redirect()->back()->with('success', 'La mutation a bien éte supprimé ');
    }

    /**
     * Update fonctionnaire's type_mutation based on latest mutation or position
     */
    private function updateFonctionnaireLatestMutationType($fonctionnaire)
    {
        // Get the latest mutation
        $latestMutation = \App\Models\HistoriqueMutation::where('fonctionnaire_id', $fonctionnaire->id)
            ->whereNotNull('date_mutation')
            ->orderBy('date_mutation', 'desc')
            ->first();

        // Get the latest position
        $latestPosition = \App\Models\PositionHistorique::where('fonctionnaire_id', $fonctionnaire->id)
            ->whereNotNull('date_prise_en_service')
            ->orderBy('date_prise_en_service', 'desc')
            ->first();

        // Compare dates to find the most recent
        $latestMutationDate = $latestMutation ? \Carbon\Carbon::parse($latestMutation->date_mutation) : null;
        $latestPositionDate = $latestPosition ? \Carbon\Carbon::parse($latestPosition->date_prise_en_service) : null;

        // Update fonctionnaire's type_mutation and date_mutation based on the most recent
        if ($latestMutationDate && $latestPositionDate) {
            if ($latestMutationDate->greaterThan($latestPositionDate)) {
                $fonctionnaire->type_mutation = $latestMutation->type_mutation_id;
                $fonctionnaire->date_mutation = $latestMutation->date_mutation;
            } else {
                // For position, we might want to set a special type or keep the current one
                // Since positions don't have type_mutation_id, we keep the current type
                $fonctionnaire->date_mutation = $latestPosition->date_prise_en_service;
            }
        } elseif ($latestMutationDate) {
            $fonctionnaire->type_mutation = $latestMutation->type_mutation_id;
            $fonctionnaire->date_mutation = $latestMutation->date_mutation;
        } elseif ($latestPositionDate) {
            $fonctionnaire->date_mutation = $latestPosition->date_prise_en_service;
        }

        $fonctionnaire->save();
    }

}
