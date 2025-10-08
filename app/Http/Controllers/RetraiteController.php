<?php

namespace App\Http\Controllers;

use App\Models\Retraite;
use App\Models\Fonctionnaire;
use App\Models\RetirementSetting;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class RetraiteController extends Controller
{
    public function index()
    {
        return view('retraites.index');
    }

    public function data(Request $request)
    {
        $query = Retraite::with(['fonctionnaire', 'createdBy', 'validatedBy']);

        // Apply filters
        if ($request->filled('type_retraite')) {
            $query->where('type_retraite', $request->type_retraite);
        }

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('date_retraite', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('date_retraite', '<=', $request->date_to);
        }

        return DataTables::of($query)
            ->addColumn('fonctionnaire_info', function ($retraite) {
                if ($retraite->fonctionnaire) {
                    return $retraite->fonctionnaire->ppr . ' - ' .
                           $retraite->fonctionnaire->nom . ' ' .
                           $retraite->fonctionnaire->prenom;
                }
                return 'N/A';
            })
            ->addColumn('type_badge', function ($retraite) {
                $color = $retraite->type_retraite === 'limite_age' ? 'bg-info' : 'bg-warning';
                return '<span class="badge ' . $color . '">' . $retraite->type_retraite_libelle . '</span>';
            })
            ->addColumn('statut_badge', function ($retraite) {
                return '<span class="badge ' . $retraite->statut_badge . '">' . $retraite->statut_libelle . '</span>';
            })
            ->addColumn('age_info', function ($retraite) {
                return $retraite->age_retraite ? $retraite->age_retraite . ' ans' : 'N/A';
            })
            ->addColumn('service_info', function ($retraite) {
                return $retraite->annees_service ? $retraite->annees_service . ' ans' : 'N/A';
            })
            ->addColumn('date_retraite_formatted', function ($retraite) {
                return $retraite->date_retraite ? $retraite->date_retraite->format('d/m/Y') : 'N/A';
            })
            ->addColumn('actions', function ($retraite) {
                $actions = '<div class="action-table-data">
                    <div class="edit-delete-action">
                        <a class="me-2 p-2" href="#" onclick="viewRetraite(' . $retraite->id . ')">
                            <i data-feather="eye" class="feather-eye"></i>
                        </a>';

                if ($retraite->statut === 'propose') {
                    $actions .= '<a class="me-2 p-2" href="#" onclick="editRetraite(' . $retraite->id . ')">
                            <i data-feather="edit" class="feather-edit"></i>
                        </a>
                        <a class="me-2 p-2" href="#" onclick="validateRetraite(' . $retraite->id . ')">
                            <i data-feather="check" class="feather-check text-success"></i>
                        </a>
                        <a class="confirm-text p-2" href="#" onclick="deleteRetraite(' . $retraite->id . ')">
                            <i data-feather="trash-2" class="feather-trash-2"></i>
                        </a>';
                }

                $actions .= '</div></div>';
                return $actions;
            })
            ->rawColumns(['type_badge', 'statut_badge', 'actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fonctionnaire_id' => 'required|exists:fonctionnaires,id',
            'type_retraite' => 'required|in:limite_age,anticipee',
            'date_retraite' => 'required|date',
            'motif' => 'required_if:type_retraite,anticipee',
            'remarques' => 'nullable|string'
        ]);

        // Calculate age and years of service
        $fonctionnaire = Fonctionnaire::findOrFail($request->fonctionnaire_id);
        $dateNaissance = Carbon::parse($fonctionnaire->date_naissance);
        $dateEmbauche = Carbon::parse($fonctionnaire->date_embauche);
        $dateRetraite = Carbon::parse($request->date_retraite);

        $ageRetraite = $dateNaissance->diffInYears($dateRetraite, false);
        $anneesService = $dateEmbauche->diffInYears($dateRetraite, false);

        // Check if already has a retirement record
        $existingRetraite = Retraite::where('fonctionnaire_id', $request->fonctionnaire_id)
            ->whereIn('statut', ['propose', 'valide', 'effectue'])
            ->first();

        if ($existingRetraite) {
            return response()->json([
                'success' => false,
                'message' => 'Ce fonctionnaire a déjà un dossier de retraite en cours.'
            ], 422);
        }

        $retraite = Retraite::create([
            'fonctionnaire_id' => $request->fonctionnaire_id,
            'type_retraite' => $request->type_retraite,
            'date_retraite' => $request->date_retraite,
            'age_retraite' => $ageRetraite,
            'annees_service' => $anneesService,
            'motif' => $request->motif,
            'remarques' => $request->remarques,
            'created_by' => Auth::id(),
            'statut' => 'propose'
        ]);

        // Log activity
        activity()
            ->causedBy(Auth::user())
            ->performedOn($retraite)
            ->withProperties([
                'fonctionnaire' => $fonctionnaire->nom . ' ' . $fonctionnaire->prenom,
                'type' => $request->type_retraite
            ])
            ->log('Dossier de retraite créé');

        return response()->json(['success' => true, 'message' => 'Dossier de retraite créé avec succès']);
    }

    public function show($id)
    {
        $retraite = Retraite::with(['fonctionnaire', 'createdBy', 'validatedBy'])->findOrFail($id);
        return response()->json($retraite);
    }

    public function update(Request $request, $id)
    {
        $retraite = Retraite::findOrFail($id);

        if ($retraite->statut !== 'propose') {
            return response()->json([
                'success' => false,
                'message' => 'Seuls les dossiers proposés peuvent être modifiés.'
            ], 422);
        }

        $request->validate([
            'date_retraite' => 'required|date',
            'motif' => 'required_if:type_retraite,anticipee',
            'remarques' => 'nullable|string'
        ]);

        // Recalculate age and years of service
        $fonctionnaire = $retraite->fonctionnaire;
        $dateNaissance = Carbon::parse($fonctionnaire->date_naissance);
        $dateEmbauche = Carbon::parse($fonctionnaire->date_embauche);
        $dateRetraite = Carbon::parse($request->date_retraite);

        $ageRetraite = $dateNaissance->diffInYears($dateRetraite, false);
        $anneesService = $dateEmbauche->diffInYears($dateRetraite, false);

        $retraite->update([
            'date_retraite' => $request->date_retraite,
            'age_retraite' => $ageRetraite,
            'annees_service' => $anneesService,
            'motif' => $request->motif,
            'remarques' => $request->remarques
        ]);

        // Log activity
        activity()
            ->causedBy(Auth::user())
            ->performedOn($retraite)
            ->log('Dossier de retraite mis à jour');

        return response()->json(['success' => true, 'message' => 'Dossier de retraite mis à jour avec succès']);
    }

    public function validate($id)
    {
        $retraite = Retraite::findOrFail($id);

        if ($retraite->statut !== 'propose') {
            return response()->json([
                'success' => false,
                'message' => 'Seuls les dossiers proposés peuvent être validés.'
            ], 422);
        }

        $retraite->update([
            'statut' => 'valide',
            'validated_by' => Auth::id(),
            'validated_at' => now()
        ]);

        // Log activity
        activity()
            ->causedBy(Auth::user())
            ->performedOn($retraite)
            ->log('Dossier de retraite validé');

        return response()->json(['success' => true, 'message' => 'Dossier de retraite validé avec succès']);
    }

    public function destroy($id)
    {
        $retraite = Retraite::findOrFail($id);

        if ($retraite->statut !== 'propose') {
            return response()->json([
                'success' => false,
                'message' => 'Seuls les dossiers proposés peuvent être supprimés.'
            ], 422);
        }

        // Log activity before deletion
        activity()
            ->causedBy(Auth::user())
            ->performedOn($retraite)
            ->withProperties(['retraite_data' => $retraite->toArray()])
            ->log('Dossier de retraite supprimé');

        $retraite->delete();

        return response()->json(['success' => true, 'message' => 'Dossier de retraite supprimé avec succès']);
    }

    public function getFonctionnaires()
    {
        $fonctionnaires = Fonctionnaire::select('id', 'ppr', 'nom', 'prenom', 'date_naissance')
            ->whereNotIn('id', function($query) {
                $query->select('fonctionnaire_id')
                      ->from('retraites')
                      ->whereIn('statut', ['propose', 'valide', 'effectue']);
            })
            ->get()
            ->map(function($fonctionnaire) {
                $age = Carbon::parse($fonctionnaire->date_naissance)->age;
                return [
                    'id' => $fonctionnaire->id,
                    'text' => $fonctionnaire->ppr . ' - ' . $fonctionnaire->nom . ' ' . $fonctionnaire->prenom . ' (' . $age . ' ans)',
                    'age' => $age
                ];
            });

        return response()->json($fonctionnaires);
    }

    public function getEligibleFonctionnaires()
    {
        // Get configurable retirement age limit
        $retirementAgeLimit = RetirementSetting::getRetirementAgeLimit();

        // Fonctionnaires eligible for automatic retirement
        $eligibleFonctionnaires = Fonctionnaire::select('id', 'ppr', 'nom', 'prenom', 'date_naissance', 'date_embauche')
            ->whereNotIn('id', function($query) {
                $query->select('fonctionnaire_id')
                      ->from('retraites')
                      ->whereIn('statut', ['propose', 'valide', 'effectue']);
            })
            ->get()
            ->filter(function($fonctionnaire) use ($retirementAgeLimit) {
                $age = Carbon::parse($fonctionnaire->date_naissance)->age;
                return $age >= $retirementAgeLimit;
            })
            ->map(function($fonctionnaire) {
                $age = Carbon::parse($fonctionnaire->date_naissance)->age;
                $anneesService = Carbon::parse($fonctionnaire->date_embauche)->age;
                return [
                    'id' => $fonctionnaire->id,
                    'ppr' => $fonctionnaire->ppr,
                    'nom' => $fonctionnaire->nom,
                    'prenom' => $fonctionnaire->prenom,
                    'age' => $age,
                    'annees_service' => $anneesService,
                    'eligible' => true
                ];
            })
            ->values();

        return response()->json($eligibleFonctionnaires);
    }

    public function createAutoRetirements()
    {
        // Get configurable retirement age limit
        $retirementAgeLimit = RetirementSetting::getRetirementAgeLimit();

        $eligibleFonctionnaires = Fonctionnaire::whereNotIn('id', function($query) {
                $query->select('fonctionnaire_id')
                      ->from('retraites')
                      ->whereIn('statut', ['propose', 'valide', 'effectue']);
            })
            ->get()
            ->filter(function($fonctionnaire) use ($retirementAgeLimit) {
                $age = Carbon::parse($fonctionnaire->date_naissance)->age;
                return $age >= $retirementAgeLimit;
            });

        $created = 0;
        foreach ($eligibleFonctionnaires as $fonctionnaire) {
            $dateNaissance = Carbon::parse($fonctionnaire->date_naissance);
            $dateEmbauche = Carbon::parse($fonctionnaire->date_embauche);
            $dateRetraite = $dateNaissance->copy()->addYears($retirementAgeLimit);

            // If retirement date is in the past, set it to today
            if ($dateRetraite->isPast()) {
                $dateRetraite = Carbon::today();
            }

            $ageRetraite = $dateNaissance->diffInYears($dateRetraite, false);
            $anneesService = $dateEmbauche->diffInYears($dateRetraite, false);

            Retraite::create([
                'fonctionnaire_id' => $fonctionnaire->id,
                'type_retraite' => 'limite_age',
                'date_retraite' => $dateRetraite,
                'age_retraite' => $ageRetraite,
                'annees_service' => $anneesService,
                'motif' => "Retraite automatique - limite d'âge atteinte ({$retirementAgeLimit} ans)",
                'created_by' => Auth::id(),
                'statut' => 'propose'
            ]);

            $created++;
        }

        return response()->json([
            'success' => true,
            'message' => "{$created} dossier(s) de retraite automatique créé(s) avec succès"
        ]);
    }

    /**
     * Get retirement settings
     */
    public function getRetirementSettings()
    {
        $retirementAgeLimit = RetirementSetting::getRetirementAgeLimit();

        return response()->json([
            'retirement_age_limit' => $retirementAgeLimit
        ]);
    }

    /**
     * Update retirement settings
     */
    public function updateRetirementSettings(Request $request)
    {
        $request->validate([
            'retirement_age_limit' => 'required|numeric|min:50|max:70'
        ]);

        RetirementSetting::setRetirementAgeLimit($request->retirement_age_limit);

        return response()->json([
            'success' => true,
            'message' => 'Paramètres de retraite mis à jour avec succès'
        ]);
    }

    /**
     * Test method to debug retirement functions
     */
    public function testRetirementFunctions()
    {
        $retirementAgeLimit = RetirementSetting::getRetirementAgeLimit();

        $eligibleFonctionnaires = Fonctionnaire::select('id', 'ppr', 'nom', 'prenom', 'date_naissance', 'date_embauche')
            ->get()
            ->filter(function($fonctionnaire) use ($retirementAgeLimit) {
                if (!$fonctionnaire->date_naissance) return false;
                $age = Carbon::parse($fonctionnaire->date_naissance)->age;
                return $age >= $retirementAgeLimit;
            })
            ->map(function($fonctionnaire) {
                $age = Carbon::parse($fonctionnaire->date_naissance)->age;
                $anneesService = Carbon::parse($fonctionnaire->date_embauche)->age;
                return [
                    'id' => $fonctionnaire->id,
                    'ppr' => $fonctionnaire->ppr,
                    'nom' => $fonctionnaire->nom,
                    'prenom' => $fonctionnaire->prenom,
                    'age' => $age,
                    'annees_service' => $anneesService,
                    'eligible' => true
                ];
            })
            ->values();

        return response()->json([
            'retirement_age_limit' => $retirementAgeLimit,
            'eligible_count' => $eligibleFonctionnaires->count(),
            'eligible_fonctionnaires' => $eligibleFonctionnaires->take(5), // Only first 5 for testing
            'test_status' => 'success'
        ]);
    }
}
