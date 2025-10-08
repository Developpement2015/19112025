<?php

namespace App\Http\Controllers;

use App\Services\CongeAvailabilityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoriquePositionController extends Controller
{
    /**
     * The CongeAvailabilityService instance.
     *
     * @var CongeAvailabilityService
     */
    protected $congeAvailabilityService;

    /**
     * Create a new controller instance.
     *
     * @param CongeAvailabilityService $congeAvailabilityService
     * @return void
     */
    public function __construct(CongeAvailabilityService $congeAvailabilityService)
    {
        $this->congeAvailabilityService = $congeAvailabilityService;
    }



    public function add(Request $request)
    {
        // Validate the request data
        $request->validate([
            'fonctionnaire_id' => 'nullable|string',
            'ancien_position_id' => 'nullable|string',
            'nouveaux_position_id' => 'nullable|string',
            'date_cessation_service' => 'nullable|date',
            'date_prise_en_service' => 'nullable|date',
            'remarque' => 'nullable|string',
            'date_note' => 'nullable|date',
            'ref_note' => 'nullable|string',
            'fichiers_notes' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg',
            'type' => 'nullable|string',
            'type_certificate_id' => 'nullable|string',
            'type_conge_id' => 'nullable|string',
            'conge_jours' => 'nullable|integer|min:1',
            'relicat_data' => 'nullable|string',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            $fonctionnaireId = $request->input('fonctionnaire_id');
            $fonctionnaire = \App\Models\Fonctionnaire::find($fonctionnaireId);

            // Check if fonctionnaire exists
            if (!$fonctionnaire) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Fonctionnaire non trouvé avec l\'ID fourni.');
            }

            // Check if this is a congé type and validate available days
            if ($request->input('type') === 'conge' && $request->input('type_conge_id')) {
                $typeCongeId = $request->input('type_conge_id');
                $congeJours = $request->input('conge_jours', 1);
                $dateCessationService = $request->input('date_cessation_service');

                // Get the year from the date_cessation_service
                $year = date('Y', strtotime($dateCessationService));

                // Check if there are enough days available using the service
                if (!$this->congeAvailabilityService->hasEnoughDaysAvailable($fonctionnaireId, $typeCongeId, $year, $congeJours)) {
                    $daysAvailable = $this->congeAvailabilityService->getDaysAvailable($fonctionnaireId, $typeCongeId, $year);
                    return redirect()->back()->with('error', 'Pas assez de jours disponibles pour ce type de congé. Il reste seulement ' . $daysAvailable . ' jours.');
                }
            }

            $historiquePosition = new \App\Models\PositionHistorique();
            $historiquePosition->fonctionnaire_id = $fonctionnaireId;
            $historiquePosition->ancien_position_id = $request->input('ancien_position_id');
            $historiquePosition->nouveaux_position_id = $request->input('nouveaux_position_id');
            $historiquePosition->date_cessation_service = $request->input('date_cessation_service');
            $historiquePosition->date_prise_en_service = $request->input('date_prise_en_service');
            $historiquePosition->remarque = $request->input('remarque');
            $historiquePosition->date_note = $request->input('date_note');
            $historiquePosition->ref_note = $request->input('ref_note');

            if ($request->hasFile('fichiers_notes')) {
                $path = 'fichiers_notes';
                if (!file_exists(public_path($path))) {
                    mkdir(public_path($path), 0777, true);
                }
                $historiquePosition->fichiers_notes = $request->file('fichiers_notes')->store($path, 'public');
            }

            $historiquePosition->type = $request->input('type');
            $historiquePosition->type_certificate_id = $request->input('type_certificate_id');
            $historiquePosition->type_conge_id = $request->input('type_conge_id');
            $historiquePosition->save();

            $fonctionnaire->position_id = $request->input('nouveaux_position_id');
            $fonctionnaire->save();

            // Update the fonctionnaire's type_mutation to reflect the latest mutation/position
            $this->updateFonctionnaireLatestMutationType($fonctionnaire);

            // If this is a congé type, create a relicat automatically and update availability
            if ($request->input('type') === 'conge' && $request->input('type_conge_id')) {
                $typeCongeId = $request->input('type_conge_id');
                $congeJours = $request->input('conge_jours', 1);
                $dateCessationService = $request->input('date_cessation_service');
                $year = date('Y', strtotime($dateCessationService));

                // Create relicat record
                $reliquat = new \App\Models\Relicat();
                $reliquat->fonctionnaire_id = $fonctionnaireId;
                $reliquat->type_conge_id = $typeCongeId;
                $reliquat->nbr_jours_disponibles = $congeJours;
                $reliquat->date_conge = $dateCessationService;
                $reliquat->save();

                // Update congé availability
                $this->congeAvailabilityService->updateAvailability($fonctionnaireId, $typeCongeId, $year, $congeJours);
            }

            // Commit the transaction
            DB::commit();
            return redirect()->back()->with('success', 'La position a bien éte ajouté pour fonctionnaire : ' . ($fonctionnaire->nom ?? '') . ' ' . ($fonctionnaire->prenom ?? ''));
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            // Handle the exception (e.g., log it, return an error response)
            return redirect()->back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'ancien_position_id' => 'nullable|string',
            'nouveaux_position_id' => 'nullable|string',
            'date_cessation_service' => 'nullable|date',
            'date_prise_en_service' => 'nullable|date',
            'remarque' => 'nullable|string',
            'date_note' => 'nullable|date',
            'ref_note' => 'nullable|string',
            'fichiers_notes' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg',
            'type' => 'nullable|string',
            'type_certificate_id' => 'nullable|string',
            'type_conge_id' => 'nullable|string',
            'conge_jours' => 'nullable|integer|min:1',
            'relicat_data' => 'nullable|string',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            $historiquePosition = \App\Models\PositionHistorique::find($id);
            if (!$historiquePosition) {
                return redirect()->back()->with('error', 'Position non trouvée');
            }

            $fonctionnaireId = $historiquePosition->fonctionnaire_id;
            $fonctionnaire = \App\Models\Fonctionnaire::find($fonctionnaireId);

            // Check if fonctionnaire exists
            if (!$fonctionnaire) {
                DB::rollBack();
                return redirect()->back()->with('error', 'Fonctionnaire non trouvé avec l\'ID fourni.');
            }

            // Check if this is a congé type and validate available days
            if ($request->input('type') === 'conge' && $request->input('type_conge_id')) {
                $typeCongeId = $request->input('type_conge_id');
                $congeJours = $request->input('conge_jours', 1);
                $dateCessationService = $request->input('date_cessation_service');

                // Get the year from the date_cessation_service
                $year = date('Y', strtotime($dateCessationService));
            }

            // Update the position record
            $historiquePosition->ancien_position_id = $request->input('ancien_position_id');
            $historiquePosition->nouveaux_position_id = $request->input('nouveaux_position_id');
            $historiquePosition->date_cessation_service = $request->input('date_cessation_service');
            $historiquePosition->date_prise_en_service = $request->input('date_prise_en_service');
            $historiquePosition->remarque = $request->input('remarque');
            $historiquePosition->date_note = $request->input('date_note');
            $historiquePosition->ref_note = $request->input('ref_note');

            // Handle file upload if provided
            if ($request->hasFile('fichiers_notes')) {
                $path = 'fichiers_notes';
                if (!file_exists(public_path($path))) {
                    mkdir(public_path($path), 0777, true);
                }
                // Delete old file if exists
                if ($historiquePosition->fichiers_notes && file_exists(public_path('storage/' . $historiquePosition->fichiers_notes))) {
                    unlink(public_path('storage/' . $historiquePosition->fichiers_notes));
                }
                $historiquePosition->fichiers_notes = $request->file('fichiers_notes')->store($path, 'public');
            }

            $historiquePosition->type = $request->input('type');
            $historiquePosition->type_certificate_id = $request->input('type_certificate_id');
            $historiquePosition->type_conge_id = $request->input('type_conge_id');
            $historiquePosition->save();

            // Update fonctionnaire's current position
            if ($request->input('nouveaux_position_id')) {
                $fonctionnaire->position_id = $request->input('nouveaux_position_id');
                $fonctionnaire->save();
            }

            // Update the fonctionnaire's type_mutation to reflect the latest mutation/position
            $this->updateFonctionnaireLatestMutationType($fonctionnaire);

            // Handle congé type updates if needed
            if ($request->input('type') === 'conge' && $request->input('type_conge_id')) {
                $typeCongeId = $request->input('type_conge_id');
                $congeJours = $request->input('conge_jours', 1);
                $dateCessationService = $request->input('date_cessation_service');
                $year = date('Y', strtotime($dateCessationService));

                // Update congé availability if needed
                if (method_exists($this, 'congeAvailabilityService')) {
                    $this->congeAvailabilityService->updateAvailability($fonctionnaireId, $typeCongeId, $year, $congeJours);
                }
            }

            // Commit the transaction
            DB::commit();
            return redirect()->back()->with('success', 'La position a bien été mise à jour pour le fonctionnaire : ' . ($fonctionnaire->nom ?? '') . ' ' . ($fonctionnaire->prenom ?? ''));
        } catch (\Exception $e) {
            // Rollback the transaction in case of error
            DB::rollBack();
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la mise à jour: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $position = \App\Models\PositionHistorique::find($id);
        $fonctionnaire = $position->fonctionnaire;
        $position->delete();

        // Update the fonctionnaire's type_mutation after deletion
        if ($fonctionnaire) {
            $this->updateFonctionnaireLatestMutationType($fonctionnaire);
        }

        return redirect()->back()->with('success', 'La position a bien éte supprimé ');
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
