<?php

namespace App\Http\Controllers;

use App\Models\Cadre;
use App\Models\CategorieCadre;
use App\Models\Fonction;
use App\Models\Fonctionnaire;
use App\Models\Grade;
use App\Models\GradeCadre;
use App\Models\NiveauCategorieFormation;
use App\Models\NomFormationSanitaire;
use App\Models\Position;
use App\Models\Relicat;
use App\Models\Service;
use App\Models\SpecialiteGrade;
use App\Models\TypeConge;
use App\Models\TypeMutation;
use App\Models\HistoriqueMutation;
use App\Utils\CustomPDF;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class FonctionnaireController extends Controller
{
    /**
     * Get fonctionnaire IDs that have the specified services as their latest service
     */
    private function getFonctionnairesWithLatestService($serviceIds)
    {
        // Use a more efficient approach with subqueries
        $fonctionnaireIds = [];

        // First, get fonctionnaires whose latest mutation has the specified service
        $fonctionnairesWithMutationService = DB::table('fonctionnaires as f')
            ->join(DB::raw('(
                SELECT fonctionnaire_id, nouveau_service_id,
                       ROW_NUMBER() OVER (PARTITION BY fonctionnaire_id ORDER BY date_mutation DESC) as rn
                FROM historique_mutations
                WHERE nouveau_service_id IS NOT NULL AND date_mutation IS NOT NULL
            ) as latest_mutations'), function($join) {
                $join->on('f.id', '=', 'latest_mutations.fonctionnaire_id')
                     ->where('latest_mutations.rn', '=', 1);
            })
            ->whereIn('latest_mutations.nouveau_service_id', $serviceIds)
            ->pluck('f.id')
            ->toArray();

        // Then, get fonctionnaires who have no mutations but their original service matches
        $fonctionnairesWithoutMutations = DB::table('fonctionnaires as f')
            ->leftJoin('historique_mutations as hm', function($join) {
                $join->on('f.id', '=', 'hm.fonctionnaire_id')
                     ->whereNotNull('hm.nouveau_service_id')
                     ->whereNotNull('hm.date_mutation');
            })
            ->whereNull('hm.id')
            ->whereIn('f.service_id', $serviceIds)
            ->pluck('f.id')
            ->toArray();

        // Combine both results
        $fonctionnaireIds = array_unique(array_merge($fonctionnairesWithMutationService, $fonctionnairesWithoutMutations));

        return $fonctionnaireIds;
    }















    /**
     * Get fonctionnaire IDs that have the specified positions as their latest position
     */
    private function getFonctionnairesWithLatestPosition($positionIds)
    {
        // Use a more efficient approach with subqueries
        $fonctionnaireIds = [];

        // First, get fonctionnaires whose latest position history has the specified position
        $fonctionnairesWithPositionHistory = DB::table('fonctionnaires as f')
            ->join(DB::raw('(
                SELECT fonctionnaire_id, nouveaux_position_id,
                       ROW_NUMBER() OVER (PARTITION BY fonctionnaire_id ORDER BY date_prise_en_service DESC) as rn
                FROM position_historiques
                WHERE nouveaux_position_id IS NOT NULL AND date_prise_en_service IS NOT NULL
            ) as latest_positions'), function($join) {
                $join->on('f.id', '=', 'latest_positions.fonctionnaire_id')
                     ->where('latest_positions.rn', '=', 1);
            })
            ->whereIn('latest_positions.nouveaux_position_id', $positionIds)
            ->pluck('f.id')
            ->toArray();

        // Then, get fonctionnaires who have no position history but their original position matches
        $fonctionnairesWithoutPositionHistory = DB::table('fonctionnaires as f')
            ->leftJoin('position_historiques as ph', function($join) {
                $join->on('f.id', '=', 'ph.fonctionnaire_id')
                     ->whereNotNull('ph.nouveaux_position_id')
                     ->whereNotNull('ph.date_prise_en_service');
            })
            ->whereNull('ph.id')
            ->whereIn('f.position_id', $positionIds)
            ->pluck('f.id')
            ->toArray();

        // Combine both results
        $fonctionnaireIds = array_unique(array_merge($fonctionnairesWithPositionHistory, $fonctionnairesWithoutPositionHistory));

        return $fonctionnaireIds;
    }

    /**
     * Get fonctionnaire IDs that have the specified specialites as their latest specialite
     */
    private function getFonctionnairesWithLatestSpecialite($specialiteIds)
    {
        // Use a more efficient approach with subqueries
        $fonctionnaireIds = [];

        // First, get fonctionnaires whose latest mutation has the specified specialite
        $fonctionnairesWithMutationSpecialite = DB::table('fonctionnaires as f')
            ->join(DB::raw('(
                SELECT fonctionnaire_id, nouveau_specialite_id,
                       ROW_NUMBER() OVER (PARTITION BY fonctionnaire_id ORDER BY date_mutation DESC) as rn
                FROM historique_mutations
                WHERE nouveau_specialite_id IS NOT NULL AND date_mutation IS NOT NULL
            ) as latest_mutations'), function($join) {
                $join->on('f.id', '=', 'latest_mutations.fonctionnaire_id')
                     ->where('latest_mutations.rn', '=', 1);
            })
            ->whereIn('latest_mutations.nouveau_specialite_id', $specialiteIds)
            ->pluck('f.id')
            ->toArray();

        // Then, get fonctionnaires who have no specialite mutations but their original specialite matches
        $fonctionnairesWithoutSpecialiteMutations = DB::table('fonctionnaires as f')
            ->leftJoin('historique_mutations as hm', function($join) {
                $join->on('f.id', '=', 'hm.fonctionnaire_id')
                     ->whereNotNull('hm.nouveau_specialite_id')
                     ->whereNotNull('hm.date_mutation');
            })
            ->whereNull('hm.id')
            ->whereIn('f.specialite_grade_id', $specialiteIds)
            ->pluck('f.id')
            ->toArray();

        // Combine both results
        $fonctionnaireIds = array_unique(array_merge($fonctionnairesWithMutationSpecialite, $fonctionnairesWithoutSpecialiteMutations));

        return $fonctionnaireIds;
    }

    /**
     * Get fonctionnaire IDs that have service dates within the specified range
     */
    private function getFonctionnairesWithServiceDateRange($dateDebut = null, $dateFin = null)
    {
        $fonctionnaireIds = [];

        // Get all fonctionnaires
        $fonctionnaires = Fonctionnaire::all();

        foreach ($fonctionnaires as $fonctionnaire) {
            // Get latest service date from history (mutations and positions)
            $latestMutation = $fonctionnaire->historiqueMutation()
                ->whereNotNull('date_prise_en_service')
                ->orderBy('date_prise_en_service', 'desc')
                ->first();

            $latestPosition = $fonctionnaire->historiquePosition()
                ->whereNotNull('date_prise_en_service')
                ->orderBy('date_prise_en_service', 'desc')
                ->first();

            // Get the most recent service date
            $latestServiceDate = null;
            $latestEndDate = null;

            if ($latestMutation && $latestPosition) {
                $mutationDate = \Carbon\Carbon::parse($latestMutation->date_prise_en_service);
                $positionDate = \Carbon\Carbon::parse($latestPosition->date_prise_en_service);
                $latestServiceDate = $mutationDate->greaterThan($positionDate) ? $mutationDate : $positionDate;

                // Get end date (cessation)
                if ($mutationDate->greaterThan($positionDate)) {
                    $latestEndDate = $latestMutation->date_cessation_service ? \Carbon\Carbon::parse($latestMutation->date_cessation_service) : null;
                } else {
                    $latestEndDate = $latestPosition->date_cessation_service ? \Carbon\Carbon::parse($latestPosition->date_cessation_service) : null;
                }
            } elseif ($latestMutation) {
                $latestServiceDate = \Carbon\Carbon::parse($latestMutation->date_prise_en_service);
                $latestEndDate = $latestMutation->date_cessation_service ? \Carbon\Carbon::parse($latestMutation->date_cessation_service) : null;
            } elseif ($latestPosition) {
                $latestServiceDate = \Carbon\Carbon::parse($latestPosition->date_prise_en_service);
                $latestEndDate = $latestPosition->date_cessation_service ? \Carbon\Carbon::parse($latestPosition->date_cessation_service) : null;
            } else {
                // Fallback to original dates
                $latestServiceDate = $fonctionnaire->date_prise_en_service ? \Carbon\Carbon::parse($fonctionnaire->date_prise_en_service) : \Carbon\Carbon::parse($fonctionnaire->date_embauche);
            }

            // Check date range
            $matches = true;

            if ($dateDebut && $latestServiceDate) {
                $dateDebutCarbon = \Carbon\Carbon::parse($dateDebut);
                if ($latestServiceDate->lessThan($dateDebutCarbon)) {
                    $matches = false;
                }
            }

            if ($dateFin && $latestEndDate) {
                $dateFinCarbon = \Carbon\Carbon::parse($dateFin);
                if ($latestEndDate->greaterThan($dateFinCarbon)) {
                    $matches = false;
                }
            } elseif ($dateFin && !$latestEndDate) {
                // If no end date, consider as still active, so it matches if service started before dateFin
                $dateFinCarbon = \Carbon\Carbon::parse($dateFin);
                if ($latestServiceDate && $latestServiceDate->greaterThan($dateFinCarbon)) {
                    $matches = false;
                }
            }

            if ($matches) {
                $fonctionnaireIds[] = $fonctionnaire->id;
            }
        }

        return $fonctionnaireIds;
    }

    public function page(Request $request)
    {
        // Get all the dropdown data
        $fonctions  = Fonction::all();
        $nomFormationSanitaires = NomFormationSanitaire::all();
        $services = Service::all();
        $specialite_grades = SpecialiteGrade::all();
        $positions = Position::all();
        $typemutations = TypeMutation::all();
        $cadres = Cadre::all();
        $grade_cadres = GradeCadre::all();
        $niveauCategoriesFormation = NiveauCategorieFormation::all();
        $categoriesCadre = CategorieCadre::all();

        // Get filtered fonctionnaires
        $fonctionnaires = $this->getFilteredFonctionnaires($request);

        // Get applied filters for display
        $appliedFilters = $this->getAppliedFilters($request);

        return view('fonctionnaire.page', compact(
            'fonctions',
            'nomFormationSanitaires',
            'services',
            'specialite_grades',
            'positions',
            'typemutations',
            'cadres',
            'grade_cadres',
            'niveauCategoriesFormation',
            'categoriesCadre',
            'fonctionnaires',
            'appliedFilters'
        ));
    }

    /**
     * Get filtered fonctionnaires based on request parameters
     */
    private function getFilteredFonctionnaires(Request $request)
    {
        $query = Fonctionnaire::with([
            'nomFormationSanitaire:id,nom,nom_arabe',
            'specialiteGrade:id,nom,nom_arabe',
            'service:id,nom',
            'position:id,nom'
        ]);

        // Collect all filter results to intersect them
        $filterResults = [];
        $hasAnyFilter = false;



        // Universal search
        if ($request->has('search_term') && !empty($request->search_term)) {
            $searchTerm = $request->search_term;
            $searchQuery = Fonctionnaire::where(function($q) use ($searchTerm) {
                $q->where('nom', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('prenom', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('nom_arabe', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('prenom_arabe', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('ppr', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('cin', 'LIKE', "%{$searchTerm}%");
            });
            $searchResults = $searchQuery->pluck('id')->toArray();
            $filterResults[] = $searchResults;
            $hasAnyFilter = true;
        }


        if ($request->has('nomformations') && !empty($request->nomformations)) {
            $searchQuery = Fonctionnaire::whereIn('nom_formation_sanitaire_id', $request->nomformations);
            $searchResults = $searchQuery->pluck('id')->toArray();
            $filterResults[] = $searchResults;
            $hasAnyFilter = true;
        }


        // Helper to normalize CSV or array inputs and remove 'all' tokens
        $normalizeFilter = function($val) {
            if (is_array($val)) {
                $arr = $val;
            } else {
                $arr = $val === null ? [] : explode(',', $val);
            }
            $arr = array_filter(array_map('trim', $arr), function($v) { return $v !== '' && strtolower($v) !== 'all'; });
            return array_values($arr);
        };

        // Service filter
        if ($request->has('services') && !empty($request->services)) {
            $serviceIds = $normalizeFilter($request->services);
            if (!empty($serviceIds)) {
                $matchingFonctionnaireIds = $this->getFonctionnairesWithLatestService($serviceIds);
                $filterResults[] = $matchingFonctionnaireIds;
                $hasAnyFilter = true;
            }
        }



        // Position filter
        if ($request->has('positions') && !empty($request->positions)) {
            $positionIds = explode(',', $request->positions);
            $matchingFonctionnaireIds = $this->getFonctionnairesWithLatestPosition($positionIds);
            $filterResults[] = $matchingFonctionnaireIds;
            $hasAnyFilter = true;
        }

        // Specialite filter
        if ($request->has('specialites') && !empty($request->specialites)) {
            $specialiteIds = explode(',', $request->specialites);
            $matchingFonctionnaireIds = $this->getFonctionnairesWithLatestSpecialite($specialiteIds);
            $filterResults[] = $matchingFonctionnaireIds;
            $hasAnyFilter = true;
        }

        // Date filters
        if ($request->has('date_debut_service') && !empty($request->date_debut_service)) {
            $dateDebut = $request->date_debut_service;
            $matchingFonctionnaireIds = $this->getFonctionnairesWithServiceDateRange($dateDebut, null);
            $filterResults[] = $matchingFonctionnaireIds;
            $hasAnyFilter = true;
        }

        if ($request->has('date_fin_service') && !empty($request->date_fin_service)) {
            $dateFin = $request->date_fin_service;
            $matchingFonctionnaireIds = $this->getFonctionnairesWithServiceDateRange(null, $dateFin);
            $filterResults[] = $matchingFonctionnaireIds;
            $hasAnyFilter = true;
        }





        // Apply intersection of all filter results
        if (!empty($filterResults)) {
            // Start with the first filter result
            $finalIds = $filterResults[0];

            // Intersect with all other filter results
            for ($i = 1; $i < count($filterResults); $i++) {
                $finalIds = array_intersect($finalIds, $filterResults[$i]);
            }

            if (!empty($finalIds)) {
                $query->whereIn('id', $finalIds);
            } else {
                // No matching fonctionnaires after intersection
                $query->whereRaw('1 = 0');
            }
        }

        // Direct relationship filters
        if ($request->has('categories_cadre') && !empty($request->categories_cadre)) {
            $categorieIds = explode(',', $request->categories_cadre);
            $query->whereHas('specialiteGrade.grade.cadre', function($q) use ($categorieIds) {
                $q->whereIn('categorie_cadre_id', $categorieIds);
            });
            $hasAnyFilter = true;
        }

        if ($request->has('cadres') && !empty($request->cadres)) {
            $cadreIds = explode(',', $request->cadres);
            $query->whereHas('specialiteGrade.grade', function($q) use ($cadreIds) {
                $q->whereIn('cadre_id', $cadreIds);
            });
            $hasAnyFilter = true;
        }

        if ($request->has('specialites_grades') && !empty($request->specialites_grades)) {
            $gradeIds = explode(',', $request->specialites_grades);
            $query->whereHas('specialiteGrade', function($q) use ($gradeIds) {
                $q->whereIn('grade_id', $gradeIds);
            });
            $hasAnyFilter = true;
        }

        // Retourner une pagination côté serveur pour éviter de charger tous les enregistrements en mémoire
        $perPage = 25;
        return $query->paginate($perPage)->appends($request->query());
    }

    /**
     * Get applied filters for display
     */
    private function getAppliedFilters(Request $request)
    {
        $filters = [];

        if ($request->has('search_term') && !empty($request->search_term)) {
            $filters['search_term'] = $request->search_term;
        }

        if ($request->has('services') && !empty($request->services)) {

            $serviceIds = explode(',', $request->services);
            $services = Service::whereIn('id', $serviceIds)->pluck('nom')->toArray();
            $filters['services'] = $services;
        }

        if ($request->has('nomformations') && !empty($request->nomformations)) {
            $nomformationsIds = $request->nomformations;

            $nomformations = NomFormationSanitaire::whereIn('id', $nomformationsIds)->pluck('nom')->toArray();
            $filters['nomformations'] = $nomformations;
        }




        if ($request->has('positions') && !empty($request->positions)) {
            $positionIds = explode(',', $request->positions);
            $positions = Position::whereIn('id', $positionIds)->pluck('nom')->toArray();
            $filters['positions'] = $positions;
        }

        if ($request->has('specialites') && !empty($request->specialites)) {
            $specialiteIds = explode(',', $request->specialites);
            $specialites = SpecialiteGrade::whereIn('id', $specialiteIds)->pluck('nom')->toArray();
            $filters['specialites'] = $specialites;
        }

        if ($request->has('categories_cadre') && !empty($request->categories_cadre)) {
            $categorieIds = explode(',', $request->categories_cadre);
            $categories = CategorieCadre::whereIn('id', $categorieIds)->pluck('nom')->toArray();
            $filters['categories_cadre'] = $categories;
        }

        if ($request->has('cadres') && !empty($request->cadres)) {
            $cadreIds = explode(',', $request->cadres);
            $cadres = Cadre::whereIn('id', $cadreIds)->pluck('nom')->toArray();
            $filters['cadres'] = $cadres;
        }

        if ($request->has('specialites_grades') && !empty($request->specialites_grades)) {
            $gradeIds = explode(',', $request->specialites_grades);
            $grades = GradeCadre::whereIn('id', $gradeIds)->pluck('nom')->toArray();
            $filters['specialites_grades'] = $grades;
        }

        if ($request->has('date_debut_service') && !empty($request->date_debut_service)) {
            $filters['date_debut_service'] = $request->date_debut_service;
        }

        if ($request->has('date_fin_service') && !empty($request->date_fin_service)) {
            $filters['date_fin_service'] = $request->date_fin_service;
        }

        return $filters;
    }

    // Test method to debug filters
    public function testFilters(Request $request)
    {
        $niveauCategoriesFormation = NiveauCategorieFormation::all();
        $categoriesCadre = CategorieCadre::all();

        // Test basic counts
        $totalFonctionnaires = Fonctionnaire::count();

        // Test niveau-categories-formation filter
        $testNiveau = 0;
        if ($niveauCategoriesFormation->count() > 0) {
            $testNiveau = Fonctionnaire::whereHas('nomFormationSanitaire', function ($q) use ($niveauCategoriesFormation) {
                $q->where('niveau_categorie_formation_id', $niveauCategoriesFormation->first()->id);
            })->count();
        }

        // Test categories-cadres filter
        $testCategorie = 0;
        if ($categoriesCadre->count() > 0) {
            $testCategorie = Fonctionnaire::whereHas('specialiteGrade.grade.cadre.categorie_cadre', function ($q) use ($categoriesCadre) {
                $q->where('id', $categoriesCadre->first()->id);
            })->count();
        }

        // Test relations
        $fonctionnaireWithRelations = Fonctionnaire::with([
            'nomFormationSanitaire.niveaucategorieformation',
            'specialiteGrade.grade.cadre.categorie_cadre'
        ])->first();

        return response()->json([
            'total_fonctionnaires' => $totalFonctionnaires,
            'niveaux_count' => $niveauCategoriesFormation->count(),
            'categories_count' => $categoriesCadre->count(),
            'test_niveau_filter' => $testNiveau,
            'test_categorie_filter' => $testCategorie,
            'sample_fonctionnaire' => $fonctionnaireWithRelations,
            'niveaux' => $niveauCategoriesFormation->take(3),
            'categories' => $categoriesCadre->take(3)
        ]);
    }

    // Simple test for specific filter
    public function testSpecificFilter(Request $request)
    {
        $query = Fonctionnaire::query();

        // Test the specific filter that's not working
        if ($request->has('niveau_categorie_formation') && !empty($request->niveau_categorie_formation)) {
            $query->whereHas('nomFormationSanitaire', function ($q) use ($request) {
                $q->where('niveau_categorie_formation_id', $request->niveau_categorie_formation);
            });
        }

        if ($request->has('categorie_cadre') && !empty($request->categorie_cadre)) {
            $query->whereHas('specialiteGrade.grade.cadre.categorie_cadre', function ($q) use ($request) {
                $q->where('id', $request->categorie_cadre);
            });
        }

        $results = $query->with(['nomFormationSanitaire', 'specialiteGrade'])->get();

        return response()->json([
            'request_params' => $request->all(),
            'count' => $results->count(),
            'results' => $results->take(5)
        ]);
    }

    // Debug method to test data endpoint directly
    public function debugData(Request $request)
    {
        // Simulate a filter request
        $testParams = [
            'service' => '1',
            'position' => '2',
            'niveau_categorie_formation' => '1',
            'categorie_cadre' => '1'
        ];

        $response = [];

        foreach ($testParams as $key => $value) {
            $request->merge([$key => $value]);
            $query = Fonctionnaire::query();

            if ($key === 'service') {
                $query->where('service_id', $value);
            } elseif ($key === 'position') {
                $query->where('position_id', $value);
            } elseif ($key === 'niveau_categorie_formation') {
                $query->whereHas('nomFormationSanitaire', function ($q) use ($value) {
                    $q->where('niveau_categorie_formation_id', $value);
                });
            } elseif ($key === 'categorie_cadre') {
                $query->whereHas('specialiteGrade.grade.cadre.categorie_cadre', function ($q) use ($value) {
                    $q->where('id', $value);
                });
            }

            $count = $query->count();
            $response[$key] = [
                'filter_value' => $value,
                'count' => $count,
                'working' => $count > 0 ? 'YES' : 'NO'
            ];

            $request = new Request(); // Reset request
        }

        return response()->json([
            'total_fonctionnaires' => Fonctionnaire::count(),
            'filter_tests' => $response
        ]);
    }

    // Debug relations for categorie cadre
    public function debugCategorieRelations()
    {
        // Get all categories cadres
        $categories = CategorieCadre::all();

        $result = [];

        foreach ($categories as $categorie) {
            // Method 1: Direct relation through cadre
            $count1 = Fonctionnaire::whereHas('specialiteGrade.grade.cadre', function ($q) use ($categorie) {
                $q->where('categorie_cadre_id', $categorie->id);
            })->count();

            // Method 2: Check the full chain
            $fonctionnaires = Fonctionnaire::with([
                'specialiteGrade.grade.cadre.categorie_cadre'
            ])->get();

            $count2 = $fonctionnaires->filter(function ($f) use ($categorie) {
                return $f->specialiteGrade &&
                       $f->specialiteGrade->grade &&
                       $f->specialiteGrade->grade->cadre &&
                       $f->specialiteGrade->grade->cadre->categorie_cadre &&
                       $f->specialiteGrade->grade->cadre->categorie_cadre->id == $categorie->id;
            })->count();

            $result[] = [
                'categorie_id' => $categorie->id,
                'categorie_nom' => $categorie->nom,
                'method1_count' => $count1,
                'method2_count' => $count2,
                'cadres_in_category' => $categorie->cadres->count()
            ];
        }

        return response()->json([
            'total_fonctionnaires' => Fonctionnaire::count(),
            'total_categories' => $categories->count(),
            'results' => $result,
            'sample_fonctionnaire' => Fonctionnaire::with([
                'specialiteGrade.grade.cadre.categorie_cadre'
            ])->first()
        ]);
    }

    // Ultra simple data method for testing
    public function dataSimple(Request $request)
    {
        Log::info('SIMPLE DATA REQUEST:', $request->all());

        $query = Fonctionnaire::query();

        // Only test service filter
        if ($request->get('service')) {
            $query->where('service_id', $request->get('service'));
            Log::info('APPLIED SERVICE FILTER: ' . $request->get('service'));
        }

        $total = Fonctionnaire::count();
        $filtered = $query->count();

        Log::info('TOTAL: ' . $total . ', FILTERED: ' . $filtered);

        $results = $query->take(10)->get(['id', 'ppr', 'nom', 'prenom', 'service_id']);

        return response()->json([
            'draw' => $request->get('draw', 1),
            'recordsTotal' => $total,
            'recordsFiltered' => $filtered,
            'data' => $results
        ]);
    }

    // FILTRE AVEC CHECKBOXES ET ANNÉES
    public function dataCheckbox(Request $request)
    {
    Log::info('🔥 NOUVEAU FILTRE CHECKBOX - REQUEST DATA:', $request->all());

        // Count total before filtering
        $totalBefore = Fonctionnaire::count();
    Log::info('📊 Total fonctionnaires avant filtrage:', ['count' => $totalBefore]);

        $query = Fonctionnaire::with([
            'nomFormationSanitaire:id,nom,nom_arabe',
            'specialiteGrade:id,nom,nom_arabe',
            'service:id,nom',
            'position:id,nom'
        ]);

        // Collect all filter results to intersect them
        $filterResults = [];
        $hasAnyFilter = false;

        // Recherche universelle
        if ($request->has('search_term') && !empty($request->search_term)) {
            $searchTerm = $request->search_term;
            $searchQuery = Fonctionnaire::where(function($q) use ($searchTerm) {
                $q->where('nom', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('prenom', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('nom_arabe', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('prenom_arabe', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('ppr', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('cin', 'LIKE', "%{$searchTerm}%");
            });
            $searchResults = $searchQuery->pluck('id')->toArray();
            $filterResults[] = $searchResults;
            $hasAnyFilter = true;
            Log::info('🔍 Recherche appliquée:', ['term' => $searchTerm, 'count' => count($searchResults)]);
        }

        // Filtre Services (checkboxes) - Using latest service from history
        if ($request->has('services') && !empty($request->services)) {
            $serviceIds = explode(',', $request->services);
            Log::info('🏢 Filtrage par services:', $serviceIds);

            // Get fonctionnaire IDs that match the service filter
            $matchingFonctionnaireIds = $this->getFonctionnairesWithLatestService($serviceIds);
            Log::info('🏢 Fonctionnaires trouvés avec services:', ['count' => count($matchingFonctionnaireIds), 'ids' => array_slice($matchingFonctionnaireIds, 0, 10)]);

            $filterResults[] = $matchingFonctionnaireIds;
            $hasAnyFilter = true;
        }

        // Filtre Positions (checkboxes) - Using latest position from history
        if ($request->has('positions') && !empty($request->positions)) {
            $positionIds = explode(',', $request->positions);
            Log::info('📍 Filtrage par positions:', $positionIds);

            // Get fonctionnaire IDs that match the position filter
            $matchingFonctionnaireIds = $this->getFonctionnairesWithLatestPosition($positionIds);
            Log::info('📍 Fonctionnaires trouvés avec positions:', ['count' => count($matchingFonctionnaireIds), 'ids' => array_slice($matchingFonctionnaireIds, 0, 10)]);

            $filterResults[] = $matchingFonctionnaireIds;
            $hasAnyFilter = true;
        }

        // Filtre Spécialités (checkboxes) - Using latest specialite from history
        if ($request->has('specialites') && !empty($request->specialites)) {
            $specialiteIds = explode(',', $request->specialites);
            Log::info('🎯 Filtrage par spécialités:', $specialiteIds);

            // Get fonctionnaire IDs that match the specialite filter
            $matchingFonctionnaireIds = $this->getFonctionnairesWithLatestSpecialite($specialiteIds);
            Log::info('🎯 Fonctionnaires trouvés avec spécialités:', ['count' => count($matchingFonctionnaireIds), 'ids' => array_slice($matchingFonctionnaireIds, 0, 10)]);

            $filterResults[] = $matchingFonctionnaireIds;
            $hasAnyFilter = true;
        }

        // Filtre par dates de prise de service et fin de service
        if ($request->has('date_debut_service') && !empty($request->date_debut_service)) {
            $dateDebut = $request->date_debut_service;
            Log::info('📅 Filtrage par date début service:', $dateDebut);

            // Get fonctionnaire IDs that have service start date >= dateDebut
            $matchingFonctionnaireIds = $this->getFonctionnairesWithServiceDateRange($dateDebut, null);
            Log::info('📅 Fonctionnaires trouvés avec date début:', ['count' => count($matchingFonctionnaireIds)]);

            $filterResults[] = $matchingFonctionnaireIds;
            $hasAnyFilter = true;
        }

        if ($request->has('date_fin_service') && !empty($request->date_fin_service)) {
            $dateFin = $request->date_fin_service;
            Log::info('📅 Filtrage par date fin service:', $dateFin);

            // Get fonctionnaire IDs that have service end date <= dateFin
            $matchingFonctionnaireIds = $this->getFonctionnairesWithServiceDateRange(null, $dateFin);
            Log::info('📅 Fonctionnaires trouvés avec date fin:', ['count' => count($matchingFonctionnaireIds)]);

            $filterResults[] = $matchingFonctionnaireIds;
            $hasAnyFilter = true;
        }

        // Apply intersection of all filter results
        if (!empty($filterResults)) {
            Log::info('🔄 Applying filter intersection:', ['filter_count' => count($filterResults), 'has_any_filter' => $hasAnyFilter]);

            // Start with the first filter result
            $finalIds = $filterResults[0];

            // Intersect with all other filter results
            for ($i = 1; $i < count($filterResults); $i++) {
                $finalIds = array_intersect($finalIds, $filterResults[$i]);
                Log::info('🔄 After intersection ' . $i . ':', ['count' => count($finalIds)]);
            }

            Log::info('🎯 Final filtered IDs:', ['count' => count($finalIds), 'ids' => array_slice($finalIds, 0, 10)]);

            if (!empty($finalIds)) {
                $query->whereIn('id', $finalIds);
            } else {
                // No matching fonctionnaires after intersection - return empty result
                Log::info('⚠️ No fonctionnaires match all selected filters');
                $query->whereRaw('1 = 0'); // More explicit than where('id', -1)
            }
        } else {
            if ($hasAnyFilter) {
                Log::info('ℹ️ Only direct relationship filters will be applied');
            } else {
                Log::info('ℹ️ No filters applied - showing all fonctionnaires');
            }
        }

        // Direct relationship filters (applied to already filtered results)
        // Filtre Catégorie Cadre (checkboxes)
        if ($request->has('categories_cadre') && !empty($request->categories_cadre)) {
            $categorieIds = explode(',', $request->categories_cadre);
            $countBefore = $query->count();
            $query->whereHas('specialiteGrade.grade.cadre', function($q) use ($categorieIds) {
                $q->whereIn('categorie_cadre_id', $categorieIds);
            });
            $countAfter = $query->count();
            $hasAnyFilter = true;
            Log::info('📋 Catégories Cadre filtrées:', [
                'categories' => $categorieIds,
                'before' => $countBefore,
                'after' => $countAfter
            ]);
        }

        // Filtre Cadres (checkboxes)
        if ($request->has('cadres') && !empty($request->cadres)) {
            $cadreIds = explode(',', $request->cadres);
            $countBefore = $query->count();
            $query->whereHas('specialiteGrade.grade', function($q) use ($cadreIds) {
                $q->whereIn('cadre_id', $cadreIds);
            });
            $countAfter = $query->count();
            $hasAnyFilter = true;
            Log::info('🏛️ Cadres filtrés:', [
                'cadres' => $cadreIds,
                'before' => $countBefore,
                'after' => $countAfter
            ]);
        }

        // Filtre Spécialité Grades (checkboxes)
        if ($request->has('specialites_grades') && !empty($request->specialites_grades)) {
            $gradeIds = explode(',', $request->specialites_grades);
            $countBefore = $query->count();
            $query->whereHas('specialiteGrade', function($q) use ($gradeIds) {
                $q->whereIn('grade_id', $gradeIds);
            });
            $countAfter = $query->count();
            $hasAnyFilter = true;
            Log::info('🎓 Spécialité Grades filtrés:', [
                'grades' => $gradeIds,
                'before' => $countBefore,
                'after' => $countAfter
            ]);
        }

        // Count after all filters
        $totalAfter = $query->count();
    Log::info('📊 Total fonctionnaires après filtrage:', ['count' => $totalAfter]);

        return DataTables::of($query)
            ->addColumn('nom_prenom', function ($data) {
                return $data->nom . ' ' . $data->prenom . ' / ' . $data->nom_arabe . ' ' . $data->prenom_arabe;
            })
            ->addColumn('nom_formation_sanitaire', function ($data) {
                return $data->nomFormationSanitaire ?
                    $data->nomFormationSanitaire->nom . ' / ' . $data->nomFormationSanitaire->nom_arabe : '-';
            })
            ->addColumn('specialite_grade', function ($data) {
                return $data->specialiteGrade ?
                    $data->specialiteGrade->nom . ' / ' . $data->specialiteGrade->nom_arabe : '-';
            })
            ->addColumn('action', function ($data) {
                return view('fonctionnaire.action', compact('data'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // FILTRE PERSONNALISÉ OPTIMISÉ
    public function dataCustom(Request $request)
    {
        // 🚀 Début du filtrage personnalisé
    Log::info('🔍 FILTRE PERSONNALISÉ DÉMARRÉ', $request->all());

        $query = Fonctionnaire::with([
            'nomFormationSanitaire:id,nom,nom_arabe,niveau_categorie_formation_id',
            'specialiteGrade:id,nom,nom_arabe,grade_id',
            'specialiteGrade.grade:id,nom,cadre_id',
            'specialiteGrade.grade.cadre:id,nom,categorie_cadre_id',
            'service:id,nom',
            'position:id,nom'
        ]);

        // 🔍 Recherche universelle
        if ($request->has('search_term') && !empty($request->search_term)) {
            $searchTerm = $request->search_term;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nom', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('prenom', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('nom_arabe', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('prenom_arabe', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('ppr', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('cin', 'LIKE', "%{$searchTerm}%");
            });
            Log::info('🔍 Recherche appliquée:', ['term' => $searchTerm]);
        }

        // 🎯 Filtres spécifiques
        if ($request->has('filters') && !empty($request->filters)) {
            $filters = json_decode($request->filters, true);
            Log::info('🎯 Filtres reçus:', $filters);

            foreach ($filters as $field => $value) {
                switch ($field) {
                    case 'service_id':
                        $query->where('service_id', $value);
                        break;
                    case 'position_id':
                        $query->where('position_id', $value);
                        break;
                    case 'specialite_grade_id':
                        $query->where('specialite_grade_id', $value);
                        break;
                    case 'cadre_id':
                        $query->whereHas('specialiteGrade.grade', function($q) use ($value) {
                            $q->where('cadre_id', $value);
                        });
                        break;
                    case 'categorie_cadre_id':
                        $query->whereHas('specialiteGrade.grade.cadre', function($q) use ($value) {
                            $q->where('categorie_cadre_id', $value);
                        });
                        break;
                    case 'niveau_categorie_formation_id':
                        $query->whereHas('nomFormationSanitaire', function($q) use ($value) {
                            $q->where('niveau_categorie_formation_id', $value);
                        });
                        break;
                }
                Log::info("✅ Filtre appliqué: {$field} = {$value}");
            }
        }

        return DataTables::of($query)
            ->addColumn('nom_prenom', function ($data) {
                return $data->nom . ' ' . $data->prenom . ' / ' . $data->nom_arabe . ' ' . $data->prenom_arabe;
            })
            ->addColumn('nom_formation_sanitaire', function ($data) {
                return $data->nomFormationSanitaire ?
                    $data->nomFormationSanitaire->nom . ' / ' . $data->nomFormationSanitaire->nom_arabe : '-';
            })
            ->addColumn('specialite_grade', function ($data) {
                return $data->specialiteGrade ?
                    $data->specialiteGrade->nom . ' / ' . $data->specialiteGrade->nom_arabe : '-';
            })
            ->addColumn('action', function ($data) {
                return view('fonctionnaire.action', compact('data'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // NOUVELLE MÉTHODE DE DONNÉES COMPLÈTEMENT REFAITE
    public function dataNew(Request $request)
    {
        // Log de tous les paramètres reçus
        error_log('=== NOUVELLE MÉTHODE DATA ===');
        error_log('Paramètres reçus: ' . json_encode($request->all()));

        $query = Fonctionnaire::query();

        // Compter le total AVANT filtres
        $totalRecords = Fonctionnaire::count();
        error_log('Total fonctionnaires: ' . $totalRecords);

        // RECHERCHE UNIVERSELLE
        if ($request->has('universal_search') && $request->universal_search != '') {
            $searchTerm = $request->universal_search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('nom', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('prenom', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('nom_arabe', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('prenom_arabe', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('ppr', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('cin', 'LIKE', "%{$searchTerm}%");
            });
            error_log('RECHERCHE UNIVERSELLE APPLIQUÉE: ' . $searchTerm);
        }

        // FILTRES SIMPLES ET DIRECTS
        $filtersApplied = 0;

        // Filtre Service
        if ($request->has('service') && $request->service != '' && $request->service != '0') {
            $query->where('service_id', $request->service);
            $filtersApplied++;
            error_log('FILTRE SERVICE APPLIQUÉ: ' . $request->service);
        }

        // Filtre Position
        if ($request->has('position') && $request->position != '' && $request->position != '0') {
            $query->where('position_id', $request->position);
            $filtersApplied++;
            error_log('FILTRE POSITION APPLIQUÉ: ' . $request->position);
        }

        // Filtre Spécialité
        if ($request->has('specialite') && $request->specialite != '' && $request->specialite != '0') {
            $query->where('specialite_grade_id', $request->specialite);
            $filtersApplied++;
            error_log('FILTRE SPECIALITE APPLIQUÉ: ' . $request->specialite);
        }

        // Filtre Cadre
        if ($request->has('cadre') && $request->cadre != '' && $request->cadre != '0') {
            $query->whereHas('specialiteGrade.grade', function($q) use ($request) {
                $q->where('cadre_id', $request->cadre);
            });
            $filtersApplied++;
            error_log('FILTRE CADRE APPLIQUÉ: ' . $request->cadre);
        }

        // Filtre Catégorie Cadre
        if ($request->has('categorie_cadre') && $request->categorie_cadre != '' && $request->categorie_cadre != '0') {
            $query->whereHas('specialiteGrade.grade.cadre', function($q) use ($request) {
                $q->where('categorie_cadre_id', $request->categorie_cadre);
            });
            $filtersApplied++;
            error_log('FILTRE CATEGORIE CADRE APPLIQUÉ: ' . $request->categorie_cadre);
        }

        // Filtre Niveau Catégorie Formation
        if ($request->has('niveau_categorie_formation') && $request->niveau_categorie_formation != '' && $request->niveau_categorie_formation != '0') {
            $query->whereHas('nomFormationSanitaire', function($q) use ($request) {
                $q->where('niveau_categorie_formation_id', $request->niveau_categorie_formation);
            });
            $filtersApplied++;
            error_log('FILTRE NIVEAU CATEGORIE FORMATION APPLIQUÉ: ' . $request->niveau_categorie_formation);
        }

        // Compter APRÈS filtres
        $filteredRecords = $query->count();
        error_log('Après filtres: ' . $filteredRecords . ' (Filtres appliqués: ' . $filtersApplied . ')');

        // Ajouter les relations nécessaires
        $query->with([
            'nomFormationSanitaire' => function ($q) {
                $q->select('id', 'nom', 'nom_arabe');
            },
            'specialiteGrade' => function ($q) {
                $q->select('id', 'nom', 'nom_arabe');
            }
        ]);

        // Utiliser DataTables comme l'ancienne méthode
        return DataTables::of($query)
            ->addColumn('nom_prenom', function ($data) {
                return $data->nom . ' ' . $data->prenom . ' / ' . $data->nom_arabe . ' ' . $data->prenom_arabe;
            })
            ->addColumn('nom_formation_sanitaire', function ($data) {
                if ($data->nomFormationSanitaire) {
                    return $data->nomFormationSanitaire->nom . ' / ' . $data->nomFormationSanitaire->nom_arabe;
                } else {
                    return '-';
                }
            })
            ->addColumn('specialite_grade', function ($data) {
                if ($data->specialiteGrade) {
                    return $data->specialiteGrade->nom . ' / ' . $data->specialiteGrade->nom_arabe;
                } else {
                    return '-';
                }
            })
            ->addColumn('action', function ($data) {
                return view('fonctionnaire.action', compact('data'))->render();
            })
            ->rawColumns(['action', 'nom_prenom', 'nom_formation_sanitaire', 'specialite_grade'])
            ->toJson();
    }

    // Test new filter logic
    public function testNewFilterLogic(Request $request)
    {
        $categorieId = $request->get('categorie_id', 1); // Default to category 1

        // Test the new logic
        $cadres = Cadre::where('categorie_cadre_id', $categorieId)->pluck('id');
        $gradeCadres = GradeCadre::whereIn('cadre_id', $cadres)->pluck('id');
        $specialiteGrades = SpecialiteGrade::whereIn('grade_id', $gradeCadres)->pluck('id');
        $fonctionnaires = Fonctionnaire::whereIn('specialite_grade_id', $specialiteGrades)->get();

        return response()->json([
            'categorie_id' => $categorieId,
            'cadres_count' => $cadres->count(),
            'cadres' => $cadres,
            'grade_cadres_count' => $gradeCadres->count(),
            'specialite_grades_count' => $specialiteGrades->count(),
            'fonctionnaires_count' => $fonctionnaires->count(),
            'fonctionnaires' => $fonctionnaires->take(5)->map(function($f) {
                return [
                    'id' => $f->id,
                    'nom' => $f->nom,
                    'prenom' => $f->prenom,
                    'ppr' => $f->ppr
                ];
            })
        ]);
    }

    // Test page for filters
    public function testFiltersPage()
    {
        $niveauCategoriesFormation = NiveauCategorieFormation::all();
        $categoriesCadre = CategorieCadre::all();

        return view('test-filters', compact('niveauCategoriesFormation', 'categoriesCadre'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'ppr' => 'nullable|string|max:255',
            'nom' => 'nullable|string|max:255',
            'nom_arabe' => 'nullable|string|max:255',
            'prenom' => 'nullable|string|max:255',
            'prenom_arabe' => 'nullable|string|max:255',
            'cin' => 'nullable|string|max:255',
            'sexe' => 'nullable|string|max:1',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date_naissance' => 'nullable|date',
            'date_embauche' => 'nullable|date',
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|string|max:255',
            'adresse' => 'nullable|string',
            'fonction_id' => 'nullable',
            'nom_formation_sanitaire_id' => 'nullable',
            'remarques' => 'nullable|string',
            'service_id' => 'nullable',
            'specialite_grade_id' => 'nullable',
            'position_id' => 'nullable',
            'type_mutation' => 'nullable|string|max:255',
            'date_mutation' => 'nullable|date',
            'date_prise_en_service' => 'nullable|date',
            'date_note' => 'nullable|date',
            'fichier_note' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg',
            'ref_note' => 'nullable|string|max:255',
        ]);


        // Gestion du fichier note
        $fichier_note_name = null;
        if ($request->hasFile('fichier_note')) {
            $fichier_note = $request->file('fichier_note');
            $fichier_note_name = time() . '.' . $fichier_note->getClientOriginalExtension();
            $fichier_note->move(public_path('storage'), $fichier_note_name);
        }

        // Gestion de la photo
        $photo_name = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo_name = 'photo_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('storage/photos'), $photo_name);
        }

        try {
            Fonctionnaire::create([
                'ppr' => $request->input('ppr') ?? "",
                'nom' => $request->input('nom') ?? "",
                'nom_arabe' => $request->input('nom_arabe') ?? "",
                'prenom' => $request->input('prenom') ?? "",
                'prenom_arabe' => $request->input('prenom_arabe') ?? "",
                'cin' => $request->input('cin') ?? "",
                'sexe' => $request->input('sexe') ?? "",
                'photo' => $photo_name,
                'date_naissance' => $request->input('date_naissance') ?? "",
                'date_embauche' => $request->input('date_embauche') ?? "",
                'email' => $request->input('email') ?? "",
                'telephone' => $request->input('telephone') ?? "",
                'adresse' => $request->input('adresse') ?? "",
                'fonction_id' => $request->input('fonction_id') ?? "",
                'nom_formation_sanitaire_id' => $request->input('nom_formation_sanitaire_id') ?? "",
                'remarques' => $request->input('remarques') ?? "",
                'service_id' => $request->input('service_id') ?? "",
                'specialite_grade_id' => $request->input('specialite_grade_id') ?? "",
                'position_id' => $request->input('position_id') ?? "",
                'type_mutation' => $request->input('type_mutation') ?? "",
                'date_mutation' => $request->input('date_mutation') ?? "",
                'date_prise_en_service' => $request->input('date_prise_en_service') ?? "",
                'date_note' => $request->input('date_note') ?? "",
                'fichier_note' => $fichier_note_name ?? "",
                'ref_note' => $request->input('ref_note') ?? "",
            ]);

            return redirect()->back()->with('success', 'Fonctionnaire ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de l\'ajout de Fonctionnaire.');
        }
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'ppr' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'nom_arabe' => 'nullable|string|max:255',
            'prenom' => 'required|string|max:255',
            'prenom_arabe' => 'nullable|string|max:255',
            'cin' => 'required|string|max:255',
            'sexe' => 'required|string|max:1',
            'date_naissance' => 'required|date',
            'date_embauche' => 'required|date',
            'email' => 'nullable|email|max:255',
            'telephone' => 'nullable|string|max:255',
            'adresse' => 'nullable|string',
            'fonction_id' => 'required',
            'nom_formation_sanitaire_id' => 'nullable',
            'remarques' => 'nullable|string',
            'service_id' => 'required',
            'specialite_grade_id' => 'required',
            'position_id' => 'required',
            'type_mutation' => 'nullable|string|max:255',
            'date_mutation' => 'nullable|date',
            'date_prise_en_service' => 'nullable|date',
            'date_note' => 'nullable|date',
            'fichier_note' => 'nullable|file|mimes:pdf,doc,docx,png,jpg,jpeg',
            'ref_note' => 'nullable|string|max:255',

        ]);

        if ($request->hasFile('fichier_note')) {
            $fichier_note = $request->file('fichier_note');
            $fichier_note_name = time() . '.' . $fichier_note->getClientOriginalExtension();
            $fichier_note->move(public_path('storage'), $fichier_note_name);
        }

        try {
            $fonctionnaire = Fonctionnaire::findOrFail($id);
            $fonctionnaire->update($request->only([
                'ppr',
                'nom',
                'nom_arabe',
                'prenom',
                'prenom_arabe',
                'cin',
                'sexe',
                'date_naissance',
                'date_embauche',
                'email',
                'telephone',
                'adresse',
                'fonction_id',
                'nom_formation_sanitaire_id',
                'remarques',
                'service_id',
                'specialite_grade_id',
                'position_id',
                'type_mutation',
                'date_mutation',
                'date_prise_en_service',
                'date_note',
                'ref_note',

            ]));

            $fonctionnaire->fichier_note = $fichier_note_name;
            $fonctionnaire->save();

            return redirect()->back()->with('success', 'Fonctionnaire mis à jour avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur s\'est produite lors de la mise à jour du fonctionnaire.');
        }
    }






    public function data(Request $request)
    {
        // === NOUVELLE MÉTHODE COMPLÈTEMENT REFAITE ===
        error_log('=== DÉBUT FILTRAGE FONCTIONNAIRES ===');
        error_log('Tous les paramètres: ' . json_encode($request->all()));

        $query = Fonctionnaire::query();

        // Compter le total AVANT filtres
        $totalRecords = Fonctionnaire::count();
        error_log('Total fonctionnaires dans la base: ' . $totalRecords);

        // === RECHERCHE UNIVERSELLE ===
        if ($universalSearch = $request->input('universal_search')) {
            $query->where(function ($q) use ($universalSearch) {
                $q->where('nom', 'like', "%$universalSearch%")
                    ->orWhere('prenom', 'like', "%$universalSearch%")
                    ->orWhere('ppr', 'like', "%$universalSearch%")
                    ->orWhere('cin', 'like', "%$universalSearch%");
            });
            error_log('Recherche universelle appliquée: ' . $universalSearch);
        }

        // === RECHERCHE DATATABLES ===
        if ($search = $request->input('search.value')) {
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', "%$search%")
                    ->orWhere('prenom', 'like', "%$search%")
                    ->orWhere('ppr', 'like', "%$search%");
            });
            error_log('Recherche DataTables appliquée: ' . $search);
        }



        // SIMPLE AND DIRECT FILTERS - NO COMPLEX LOGIC

        // Service filter
        if ($request->get('service') && $request->get('service') != '') {
            $query->where('service_id', $request->get('service'));
            Log::info('APPLIED SERVICE FILTER', ['service_id' => $request->get('service')]);
        }

        // Position filter
        if ($request->get('position') && $request->get('position') != '') {
            $query->where('position_id', $request->get('position'));
            Log::info('APPLIED POSITION FILTER', ['position_id' => $request->get('position')]);
        }

        // Specialite filter
        if ($request->get('specialite') && $request->get('specialite') != '') {
            $query->where('specialite_grade_id', $request->get('specialite'));
            Log::info('APPLIED SPECIALITE FILTER', ['specialite_id' => $request->get('specialite')]);
        }

        // Cadre filter
        if ($request->get('cadre') && $request->get('cadre') != '') {
            $cadreId = $request->get('cadre');
            $query->whereHas('specialiteGrade.grade.cadre', function($q) use ($cadreId) {
                $q->where('id', $cadreId);
            });
            Log::info('APPLIED CADRE FILTER', ['cadre_id' => $cadreId]);
        }

        // Niveau-categories-formation filter
        if ($request->get('niveau_categorie_formation') && $request->get('niveau_categorie_formation') != '') {
            $niveauId = $request->get('niveau_categorie_formation');
            $query->whereHas('nomFormationSanitaire', function($q) use ($niveauId) {
                $q->where('niveau_categorie_formation_id', $niveauId);
            });
            Log::info('APPLIED NIVEAU FORMATION FILTER', ['niveau_id' => $niveauId]);
        }

        // Categories-cadres filter
        if ($request->get('categorie_cadre') && $request->get('categorie_cadre') != '') {
            $categorieId = $request->get('categorie_cadre');
            $query->whereHas('specialiteGrade.grade.cadre', function($q) use ($categorieId) {
                $q->where('categorie_cadre_id', $categorieId);
            });
            Log::info('APPLIED CATEGORIE CADRE FILTER', ['categorie_id' => $categorieId]);
        }



        // Count results after filters
        $countAfterFilters = $query->count();
        Log::info('TOTAL AFTER FILTERS: ' . $countAfterFilters);

        $query->with([
            'nomFormationSanitaire' => function ($q) {
                $q->select('id', 'nom', 'nom_arabe');
            },
            'specialiteGrade' => function ($q) {
                $q->select('id', 'nom', 'nom_arabe');
            }
        ]);

        return DataTables::of($query)
            ->addColumn('nom_prenom', function ($data) {
                return $data->nom . ' ' . $data->prenom . ' / ' . $data->nom_arabe . ' ' . $data->prenom_arabe;
            })
            ->addColumn('nom_formation_sanitaire', function ($data) {
                if ($data->nomFormationSanitaire) {
                    return $data->nomFormationSanitaire->nom . ' / ' . $data->nomFormationSanitaire->nom_arabe;
                } else {
                    return '-';
                }
            })
            ->addColumn('specialite_grade', function ($data) {


                if ($data->specialiteGrade) {
                    return      $data->specialiteGrade->nom . ' / ' . $data->specialiteGrade->nom_arabe;
                } else {
                    return '-';
                }
            })
            ->addColumn('action', function ($data) {
                return view('fonctionnaire.action', compact('data'))->render();
            })
            ->rawColumns(['action', 'nom_prenom', 'nom_formation_sanitaire', 'specialite_grade'])
            ->toJson();
    }



    public function delete($id)
    {
        Fonctionnaire::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Fonctionnaire supprimé avec succès');
    }

    public function export()
    {
        $data = Fonctionnaire::with([
            'fonction',
            'nomFormationSanitaire',
            'service',
            'specialiteGrade',
            'position'
        ])->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Column Headers
        $headers = [
            'A1' => 'PPR',
            'B1' => 'Nom',
            'C1' => 'Nom Arabe',
            'D1' => 'Prenom',
            'E1' => 'Prenom Arabe',
            'F1' => 'CIN',
            'G1' => 'Sexe',
            'H1' => 'Date Naissance',
            'I1' => 'Date Embauche',
            'J1' => 'Email',
            'K1' => 'Téléphone',
            'L1' => 'Adresse',
            'M1' => 'Fonction',
            'N1' => 'Formation Sanitaire',
            'O1' => 'Remarques',
            'P1' => 'Service',
            'Q1' => 'Spécialité/Grade',
            'R1' => 'Position',
            'S1' => 'Type Mutation',
            'T1' => 'Date Mutation',
            'U1' => 'Date Prise En Service',
            'V1' => 'Categorie Cadre',
            'W1' => 'Cadre',
            'X1' => 'Spécialité',
            'Y1' => 'Nom de formation sanitaire',
        ];

        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }

        foreach ($data as $index => $row) {
            $sheet->setCellValue('A' . ($index + 2), $row->ppr);
            $sheet->setCellValue('B' . ($index + 2), $row->nom);
            $sheet->setCellValue('C' . ($index + 2), $row->nom_arabe);
            $sheet->setCellValue('D' . ($index + 2), $row->prenom);
            $sheet->setCellValue('E' . ($index + 2), $row->prenom_arabe);
            $sheet->setCellValue('F' . ($index + 2), $row->cin);
            $sheet->setCellValue('G' . ($index + 2), $row->sexe);
            $sheet->setCellValue('H' . ($index + 2), $row->date_naissance);
            $sheet->setCellValue('I' . ($index + 2), $row->date_embauche);
            $sheet->setCellValue('J' . ($index + 2), $row->email);
            $sheet->setCellValue('K' . ($index + 2), $row->telephone);
            $sheet->setCellValue('L' . ($index + 2), $row->adresse);
            $sheet->setCellValue('M' . ($index + 2), $row->fonction->nom ?? '');
            // Prefer latest mutation's destination formation if present
            $latestMutation = null;
            if (!empty($row->historiqueMutation)) {
                $latestMutation = collect($row->historiqueMutation)->sortByDesc('date_mutation')->first();
            }
            $formationName = $latestMutation && $latestMutation->formationSanitaireDestination ? $latestMutation->formationSanitaireDestination->nom : ($row->nomFormationSanitaire->nom ?? '');
            $sheet->setCellValue('N' . ($index + 2), $formationName);
            $sheet->setCellValue('O' . ($index + 2), $row->remarques);
            $sheet->setCellValue('P' . ($index + 2), $row->service->nom ?? '');
            $sheet->setCellValue('Q' . ($index + 2), $row->specialiteGrade->nom ?? '');
            $sheet->setCellValue('R' . ($index + 2), $row->position->nom ?? '');
            $sheet->setCellValue('S' . ($index + 2), $row->type_mutation);
            $sheet->setCellValue('T' . ($index + 2), $row->date_mutation);
            $sheet->setCellValue('U' . ($index + 2), $row->date_prise_en_service);
            $sheet->setCellValue('V' . ($index + 2),$row->specialiteGrade->grade->cadre->categorie_cadre->nom ?? '');
            $sheet->setCellValue('W' . ($index + 2), $row->specialiteGrade->grade->cadre->nom  ?? '');
            $sheet->setCellValue('X' . ($index + 2), $row->specialiteGrade->nom  ?? '');
            $sheet->setCellValue('X' . ($index + 2), $row->specialiteGrade->nom  ?? '');
        }

        $fileName = 'Fonctionnaire.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }

    public function pdf()
    {
        $data = Fonctionnaire::with([
            'fonction',
            'nomFormationSanitaire',
            'service',
            'specialiteGrade',
            'position'
        ])->get();

        $pdf = new CustomPDF('L', 'mm', 'A4'); // 'L' for Landscape

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Fonctionnaires');
        $pdf->SetSubject('Export PDF');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-paysage.png');
        // $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins
        $pdf->SetMargins(15, 50, 15); // Left, Top, Right
        $pdf->SetHeaderMargin(20);
        $pdf->SetFooterMargin(20);

        // Set Auto Page Break
        $pdf->SetAutoPageBreak(true, 30); // Bottom margin for auto page break

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('dejavusans', '', 12);

        $html = '<h3 style="text-align: center; margin-bottom: 5px;">Liste des Fonctionnaires</h3>';
        $html .= '<table border="1" cellspacing="0" cellpadding="1.5" style="width: 100%; text-align: center; border-collapse: collapse; margin-top: 10px;">
                    <thead>
                        <tr>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">PPR</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Nom</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Nom Arabe</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Prénom</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Prénom Arabe</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">CIN</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Sexe</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Date Naissance</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Date Embauche</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Email</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Téléphone</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Adresse</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Fonction</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Formation Sanitaire</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Service</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Position</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Categorie Cadre</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Cadre</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Specialite</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($data as $row) {
            $html .= '<tr>
                        <td style="font-size: 5px;font-weight:700;">' . $row->ppr . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->nom . '</td>
                        <td style="direction: rtl; text-align: center; font-size: 5px;font-weight:700;">' . $row->nom_arabe . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->prenom . '</td>
                        <td style="direction: rtl; text-align: center; font-size: 5px;font-weight:700;">' . $row->prenom_arabe . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->cin . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->sexe . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->date_naissance . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->date_embauche . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->email . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->telephone . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->adresse . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . ($row->fonction->nom ?? '') . '</td>
                        ';

            // Determine formation sanitaire to display: latest mutation destination if present, else fonctionnaire.nomFormationSanitaire
            $latestMutation = null;
            if (!empty($row->historiqueMutation)) {
                $latestMutation = collect($row->historiqueMutation)->sortByDesc('date_mutation')->first();
            }
            $formationName = $latestMutation && $latestMutation->formationSanitaireDestination ? $latestMutation->formationSanitaireDestination->nom : ($row->nomFormationSanitaire->nom ?? '');

            $html .= '<td style="font-size: 5px;font-weight:700;">' . $formationName . '</td>';
            $html .= '<td style="font-size: 5px;font-weight:700;">' . ($row->service->nom ?? '') . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . ($row->position->nom ?? '') . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . ($row->specialiteGrade->grade->cadre->categorie_cadre->nom ?? '') . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . ($row->specialiteGrade->grade->cadre->nom ?? '') . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . ($row->specialiteGrade->nom ?? '') . '</td>
                      </tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('Type_de_mutation.pdf', 'I'),
            'Type_de_mutation.pdf'
        );
    }

    /**
     * Export filtered fonctionnaires to Excel or PDF
     */
    public function exportFiltered(Request $request)
    {
        // Log request for debugging
        Log::info('exportFiltered - request', $request->all());

        // Get filtered data using the same logic as the page method
        $filteredFonctionnaires = $this->getFilteredFonctionnairesForExport($request);

        Log::info('exportFiltered - result_count', ['count' => is_countable($filteredFonctionnaires) ? count($filteredFonctionnaires) : 0]);

        $exportFormat = $request->input('export_format', 'excel');

        if ($exportFormat === 'pdf') {
            return $this->exportFilteredToPdf($filteredFonctionnaires, $request);
        } else {
            return $this->exportFilteredToExcel($filteredFonctionnaires, $request);
        }
    }

    /**
     * Get filtered fonctionnaires for export (with full relationships)
     */
    private function getFilteredFonctionnairesForExport(Request $request)
    {
        $query = Fonctionnaire::with([
            'fonction',
            'nomFormationSanitaire',
            'service',
            'specialiteGrade.grade.cadre.categorie_cadre',
            'position',
            'historiqueMutation'
        ]);

        // Collect all filter results to intersect them
        $filterResults = [];
        $hasAnyFilter = false;

        // Helper to normalize CSV or array inputs and remove 'all' tokens
        $normalizeFilter = function($val) {
            if (is_array($val)) {
                $arr = $val;
            } else {
                $arr = $val === null ? [] : explode(',', $val);
            }
            $arr = array_filter(array_map('trim', $arr), function($v) { return $v !== '' && strtolower($v) !== 'all'; });
            return array_values($arr);
        };

        // Universal search
        if ($request->has('search_term') && !empty($request->search_term)) {
            $searchTerm = $request->search_term;
            $searchQuery = Fonctionnaire::where(function($q) use ($searchTerm) {
                $q->where('nom', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('prenom', 'LIKE', "%{$searchTerm}%")
                  ->where('nom', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('nom_arabe', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('prenom_arabe', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('ppr', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('cin', 'LIKE', "%{$searchTerm}%");
            });
            $searchResults = $searchQuery->pluck('id')->toArray();
            $filterResults[] = $searchResults;
            $hasAnyFilter = true;
        }

        // Service filter
        if ($request->has('services') && !empty($request->services)) {
            $serviceIds = $normalizeFilter($request->services);
            if (!empty($serviceIds)) {
                $matchingFonctionnaireIds = $this->getFonctionnairesWithLatestService($serviceIds);
                $filterResults[] = $matchingFonctionnaireIds;
                $hasAnyFilter = true;
            }
        }



        // Formations filter
        if ($request->has('nomformations') && !empty($request->nomformations)) {
            $nomformationsIds = $normalizeFilter($request->nomformations);
            if (!empty($nomformationsIds)) {
                $matchingFonctionnaireIds = Fonctionnaire::whereIn('nom_formation_sanitaire_id', $nomformationsIds)->pluck('id')->toArray();
                $filterResults[] = $matchingFonctionnaireIds;
                $hasAnyFilter = true;
            }
        }

        // Position filter
        if ($request->has('positions') && !empty($request->positions)) {
            $positionIds = $normalizeFilter($request->positions);
            if (!empty($positionIds)) {
                $matchingFonctionnaireIds = $this->getFonctionnairesWithLatestPosition($positionIds);
                $filterResults[] = $matchingFonctionnaireIds;
                $hasAnyFilter = true;
            }
        }

        // Specialite filter
        if ($request->has('specialites') && !empty($request->specialites)) {
            $specialiteIds = $normalizeFilter($request->specialites);
            if (!empty($specialiteIds)) {
                $matchingFonctionnaireIds = $this->getFonctionnairesWithLatestSpecialite($specialiteIds);
                $filterResults[] = $matchingFonctionnaireIds;
                $hasAnyFilter = true;
            }
        }

        // Date filters
        if ($request->has('date_debut_service') && !empty($request->date_debut_service)) {
            $dateDebut = $request->date_debut_service;
            $matchingFonctionnaireIds = $this->getFonctionnairesWithServiceDateRange($dateDebut, null);
            $filterResults[] = $matchingFonctionnaireIds;
            $hasAnyFilter = true;
        }

        if ($request->has('date_fin_service') && !empty($request->date_fin_service)) {
            $dateFin = $request->date_fin_service;
            $matchingFonctionnaireIds = $this->getFonctionnairesWithServiceDateRange(null, $dateFin);
            $filterResults[] = $matchingFonctionnaireIds;
            $hasAnyFilter = true;
        }

        // Apply intersection of all filter results
        if (!empty($filterResults)) {
            // Start with the first filter result
            $finalIds = $filterResults[0];

            // Intersect with all other filter results
            for ($i = 1; $i < count($filterResults); $i++) {
                $finalIds = array_intersect($finalIds, $filterResults[$i]);
            }

            if (!empty($finalIds)) {
                $query->whereIn('id', $finalIds);
            } else {
                // No matching fonctionnaires after intersection
                $query->whereRaw('1 = 0');
            }
        }

        // Direct relationship filters
        if ($request->has('categories_cadre') && !empty($request->categories_cadre)) {
            $categorieIds = explode(',', $request->categories_cadre);
            $query->whereHas('specialiteGrade.grade.cadre', function($q) use ($categorieIds) {
                $q->whereIn('categorie_cadre_id', $categorieIds);
            });
            $hasAnyFilter = true;
        }

        if ($request->has('cadres') && !empty($request->cadres)) {
            $cadreIds = explode(',', $request->cadres);
            $query->whereHas('specialiteGrade.grade', function($q) use ($cadreIds) {
                $q->whereIn('cadre_id', $cadreIds);
            });
            $hasAnyFilter = true;
        }

        if ($request->has('specialites_grades') && !empty($request->specialites_grades)) {
            $gradeIds = explode(',', $request->specialites_grades);
            $query->whereHas('specialiteGrade', function($q) use ($gradeIds) {
                $q->whereIn('grade_id', $gradeIds);
            });
            $hasAnyFilter = true;
        }

        return $query->get();
    }

    /**
     * Export filtered fonctionnaires to Excel
     */
    private function exportFilteredToExcel($data, Request $request)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Column Headers
        $headers = [
            'A1' => 'PPR',
            'B1' => 'Nom',
            'C1' => 'Nom Arabe',
            'D1' => 'Prenom',
            'E1' => 'Prenom Arabe',
            'F1' => 'CIN',
            'G1' => 'Sexe',
            'H1' => 'Date Naissance',
            'I1' => 'Date Embauche',
            'J1' => 'Email',
            'K1' => 'Téléphone',
            'L1' => 'Adresse',
            'M1' => 'Fonction',
            'N1' => 'Formation Sanitaire',
            'O1' => 'Remarques',
            'P1' => 'Service',
            'Q1' => 'Spécialité/Grade',
            'R1' => 'Position',
            'S1' => 'Type Mutation',
            'T1' => 'Date Mutation',
            'U1' => 'Date Prise En Service',
            'V1' => 'Categorie Cadre',
            'W1' => 'Cadre',
            'X1' => 'Spécialité',
        ];

        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
        }

        foreach ($data as $index => $row) {
            $sheet->setCellValue('A' . ($index + 2), $row->ppr);
            $sheet->setCellValue('B' . ($index + 2), $row->nom);
            $sheet->setCellValue('C' . ($index + 2), $row->nom_arabe);
            $sheet->setCellValue('D' . ($index + 2), $row->prenom);
            $sheet->setCellValue('E' . ($index + 2), $row->prenom_arabe);
            $sheet->setCellValue('F' . ($index + 2), $row->cin);
            $sheet->setCellValue('G' . ($index + 2), $row->sexe);
            $sheet->setCellValue('H' . ($index + 2), $row->date_naissance);
            $sheet->setCellValue('I' . ($index + 2), $row->date_embauche);
            $sheet->setCellValue('J' . ($index + 2), $row->email);
            $sheet->setCellValue('K' . ($index + 2), $row->telephone);
            $sheet->setCellValue('L' . ($index + 2), $row->adresse);
            $sheet->setCellValue('M' . ($index + 2), $row->fonction->nom ?? '');
            $sheet->setCellValue('N' . ($index + 2), $row->nomFormationSanitaire->nom ?? '');
            $sheet->setCellValue('O' . ($index + 2), $row->remarques);
            $sheet->setCellValue('P' . ($index + 2), $row->service->nom ?? '');
            $sheet->setCellValue('Q' . ($index + 2), $row->specialiteGrade->nom ?? '');
            $sheet->setCellValue('R' . ($index + 2), $row->position->nom ?? '');
            $sheet->setCellValue('S' . ($index + 2), $row->type_mutation);
            $sheet->setCellValue('T' . ($index + 2), $row->date_mutation);
            $sheet->setCellValue('U' . ($index + 2), $row->date_prise_en_service);
            $sheet->setCellValue('V' . ($index + 2), $row->specialiteGrade->grade->cadre->categorie_cadre->nom ?? '');
            $sheet->setCellValue('W' . ($index + 2), $row->specialiteGrade->grade->cadre->nom ?? '');
            $sheet->setCellValue('X' . ($index + 2), $row->specialiteGrade->nom ?? '');
        }

        // Generate filename with filter info
        $filterInfo = $this->getFilterInfoForFilename($request);
        $fileName = 'Fonctionnaires_Filtres_' . $filterInfo . '.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }

    /**
     * Export filtered fonctionnaires to PDF
     */
    private function exportFilteredToPdf($data, Request $request)
    {
        $pdf = new CustomPDF('L', 'mm', 'A4'); // 'L' for Landscape

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Fonctionnaires Filtrés');
        $pdf->SetSubject('Export PDF');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-paysage.png');

        // Set margins
        $pdf->SetMargins(15, 50, 15); // Left, Top, Right
        $pdf->SetHeaderMargin(20);
        $pdf->SetFooterMargin(20);

        // Set Auto Page Break
        $pdf->SetAutoPageBreak(true, 30); // Bottom margin for auto page break

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('dejavusans', '', 12);

        $html = '<h3 style="text-align: center; margin-bottom: 5px;">Liste des Fonctionnaires Filtrés</h3>';
        $html .= '<p style="text-align: center; margin-bottom: 10px; font-size: 10px;">Nombre de résultats: ' . count($data) . '</p>';
        $html .= '<table border="1" cellspacing="0" cellpadding="1.5" style="width: 100%; text-align: center; border-collapse: collapse; margin-top: 10px;">
                    <thead>
                        <tr>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">PPR</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Nom</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Nom Arabe</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Prénom</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Prénom Arabe</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">CIN</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Sexe</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Date Naissance</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Date Embauche</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Email</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Téléphone</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Adresse</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Fonction</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Formation Sanitaire</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Service</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Position</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Categorie Cadre</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Cadre</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 7px;">Specialite</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($data as $row) {
            $html .= '<tr>
                        <td style="font-size: 5px;font-weight:700;">' . $row->ppr . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->nom . '</td>
                        <td style="direction: rtl; text-align: center; font-size: 5px;font-weight:700;">' . $row->nom_arabe . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->prenom . '</td>
                        <td style="direction: rtl; text-align: center; font-size: 5px;font-weight:700;">' . $row->prenom_arabe . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->cin . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->sexe . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->date_naissance . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->date_embauche . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->email . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->telephone . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . $row->adresse . '</td>
                        <td style="font-size: 5px;font-weight:700;">' . ($row->fonction->nom ?? '') . '</td>
                        ';

            // Compute formation name: prefer latest mutation destination, fallback to fonctionnaire.nomFormationSanitaire
            $formationName = '';
            if (!empty($row->historiqueMutation) && count($row->historiqueMutation) > 0) {
                $latestMutation = collect($row->historiqueMutation)->sortByDesc('date_mutation')->first();
                if ($latestMutation && !empty($latestMutation->formationSanitaireDestination)) {
                    $formationName = $latestMutation->formationSanitaireDestination->nom ?? '';
                }
            }
            if (empty($formationName) && !empty($row->nomFormationSanitaire)) {
                $formationName = $row->nomFormationSanitaire->nom ?? '';
            }

            // Append remaining cells in a clear, concatenated way
            $html .= '<td style="font-size: 5px;font-weight:700;">' . e($formationName) . '</td>';
            $html .= '<td style="font-size: 5px;font-weight:700;">' . ($row->service->nom ?? '') . '</td>';
            $html .= '<td style="font-size: 5px;font-weight:700;">' . ($row->position->nom ?? '') . '</td>';
            $html .= '<td style="font-size: 5px;font-weight:700;">' . ($row->specialiteGrade->grade->cadre->categorie_cadre->nom ?? '') . '</td>';
            $html .= '<td style="font-size: 5px;font-weight:700;">' . ($row->specialiteGrade->grade->cadre->nom ?? '') . '</td>';
            $html .= '<td style="font-size: 5px;font-weight:700;">' . ($row->specialiteGrade->nom ?? '') . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Generate filename with filter info
        $filterInfo = $this->getFilterInfoForFilename($request);
        $fileName = 'Fonctionnaires_Filtres_' . $filterInfo . '.pdf';

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output($fileName, 'I'),
            $fileName
        );
    }

    /**
     * Generate filter info for filename
     */
    private function getFilterInfoForFilename(Request $request)
    {
        $filterParts = [];

        if ($request->has('search_term') && !empty($request->search_term)) {
            $filterParts[] = 'Recherche';
        }

        if ($request->has('services') && !empty($request->services)) {
            $filterParts[] = 'Services';
        }

        if ($request->has('positions') && !empty($request->positions)) {
            $filterParts[] = 'Positions';
        }

        if ($request->has('specialites') && !empty($request->specialites)) {
            $filterParts[] = 'Specialites';
        }

        if ($request->has('categories_cadre') && !empty($request->categories_cadre)) {
            $filterParts[] = 'Categories';
        }

        if ($request->has('cadres') && !empty($request->cadres)) {
            $filterParts[] = 'Cadres';
        }

        if ($request->has('specialites_grades') && !empty($request->specialites_grades)) {
            $filterParts[] = 'Grades';
        }

        if ($request->has('date_debut_service') && !empty($request->date_debut_service)) {
            $filterParts[] = 'DateDebut';
        }

        if ($request->has('date_fin_service') && !empty($request->date_fin_service)) {
            $filterParts[] = 'DateFin';
        }

        if (empty($filterParts)) {
            return date('Y-m-d_H-i-s');
        }

        return implode('_', $filterParts) . '_' . date('Y-m-d_H-i-s');
    }


    /**
     * Export the list of latest assignments to Excel
     */
    public function exportAssignments(Request $request)
    {
        // Get parameters from request
        $dateDebut = $request->input('date_debut_service', date('Y-01-01'));
        $dateFin = $request->input('date_fin_service', date('Y-m-d'));
        $formationSanitaireId = $request->input('formation_sanitaire_id');

        // Query to get fonctionnaires who took service between the specified dates
        $query = Fonctionnaire::with([
            'fonction',
            'nomFormationSanitaire',
            'service',
            'specialiteGrade',
            'position',
            'historiqueMutation' => function($q) {
                $q->orderBy('date_mutation', 'desc');
            }
        ]);

        // Filter by service dates (date_prise_en_service or date_embauche)
        $query->where(function($q) use ($dateDebut, $dateFin) {
            $q->whereBetween('date_prise_en_service', [$dateDebut, $dateFin])
              ->orWhereBetween('date_embauche', [$dateDebut, $dateFin]);
        });

        // Filter by formation sanitaire if provided
        if ($formationSanitaireId) {
            $query->where('nom_formation_sanitaire_id', $formationSanitaireId);
        }

        $fonctionnaires = $query->get();

        // Create spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setTitle('Affectations');

        // Set headers
        $headers = [
            'A1' => 'PPR',
            'B1' => 'CIN',
            'C1' => 'Nom et Prénom',
            'D1' => 'Nom et Prénom (Arabe)',
            'E1' => 'Formation Sanitaire',
            'F1' => 'Service',
            'G1' => 'Fonction',
            'H1' => 'Spécialité/Grade',
            'I1' => 'Date d\'affectation',
            'J1' => 'Type de mutation',
            'K1' => 'Date de prise en service',
        ];

        // Apply header styles
        foreach ($headers as $cell => $text) {
            $sheet->setCellValue($cell, $text);
            $sheet->getStyle($cell)->getFont()->setBold(true);
            $sheet->getStyle($cell)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
            $sheet->getStyle($cell)->getFill()->getStartColor()->setRGB('4b75ff');
            $sheet->getStyle($cell)->getFont()->getColor()->setRGB('FFFFFF');
            $sheet->getStyle($cell)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        }

        // Fill data
        $row = 2;
        foreach ($fonctionnaires as $fonctionnaire) {
            // Check if there's a mutation history
            $latestMutation = $fonctionnaire->historiqueMutation->first();

            // Use mutation data if available, otherwise use fonctionnaire data
            $dateAffectation = $latestMutation ? $latestMutation->date_mutation : $fonctionnaire->date_mutation;
            $typeMutation = $latestMutation ?
                ($latestMutation->typeMutation ? $latestMutation->typeMutation->nom : '-') :
                ($fonctionnaire->typeMutation ? $fonctionnaire->typeMutation->nom : '-');
            $datePriseService = $latestMutation ? $latestMutation->date_prise_en_service : $fonctionnaire->date_prise_en_service;

            // Skip if the date is after the requested date
            if ($dateAffectation && Carbon::parse($dateAffectation)->isAfter(Carbon::parse($dateFin))) {
                continue;
            }

            $sheet->setCellValue('A' . $row, $fonctionnaire->ppr);
            $sheet->setCellValue('B' . $row, $fonctionnaire->cin);
            $sheet->setCellValue('C' . $row, $fonctionnaire->nom . ' ' . $fonctionnaire->prenom);
            $sheet->setCellValue('D' . $row, $fonctionnaire->nom_arabe . ' ' . $fonctionnaire->prenom_arabe);
            $sheet->setCellValue('E' . $row, $fonctionnaire->nomFormationSanitaire ? $fonctionnaire->nomFormationSanitaire->nom : '-');
            $sheet->setCellValue('F' . $row, $fonctionnaire->service ? $fonctionnaire->service->nom : '-');
            $sheet->setCellValue('G' . $row, $fonctionnaire->fonction ? $fonctionnaire->fonction->nom : '-');
            $sheet->setCellValue('H' . $row, $fonctionnaire->specialiteGrade ? $fonctionnaire->specialiteGrade->nom : '-');
            $sheet->setCellValue('I' . $row, $dateAffectation ?: '-');
            $sheet->setCellValue('J' . $row, $typeMutation);
            $sheet->setCellValue('K' . $row, $datePriseService ?: '-');

            // Apply row styling
            if ($row % 2 == 0) {
                $sheet->getStyle('A' . $row . ':K' . $row)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
                $sheet->getStyle('A' . $row . ':K' . $row)->getFill()->getStartColor()->setRGB('f8f9fa');
            }

            $row++;
        }

        // Auto-size columns
        foreach (range('A', 'K') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Add borders to all cells
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];
        $sheet->getStyle('A1:K' . ($row - 1))->applyFromArray($styleArray);

        // Create title for the export
        $formationName = '';
        if ($formationSanitaireId) {
            $formation = NomFormationSanitaire::find($formationSanitaireId);
            if ($formation) {
                $formationName = ' - ' . $formation->nom;
            }
        }

        $fileName = 'Fonctionnaires_Service_' . Carbon::parse($dateDebut)->format('d-m-Y') . '_au_' . Carbon::parse($dateFin)->format('d-m-Y') . $formationName . '.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }

    /**
     * Export the list of latest assignments to Word
     */
    public function exportAssignmentsWord(Request $request)
    {
        // Get parameters from request
        $dateDebut = $request->input('date_debut_service', date('Y-01-01'));
        $dateFin = $request->input('date_fin_service', date('Y-m-d'));
        $formationSanitaireId = $request->input('formation_sanitaire_id');

        // Query to get fonctionnaires who took service between the specified dates
        $query = Fonctionnaire::with([
            'fonction',
            'nomFormationSanitaire',
            'service',
            'specialiteGrade',
            'position',
            'historiqueMutation' => function($q) {
                $q->orderBy('date_mutation', 'desc');
            }
        ]);

        // Filter by service dates (date_prise_en_service or date_embauche)
        $query->where(function($q) use ($dateDebut, $dateFin) {
            $q->whereBetween('date_prise_en_service', [$dateDebut, $dateFin])
              ->orWhereBetween('date_embauche', [$dateDebut, $dateFin]);
        });

        // Filter by formation sanitaire if provided
        if ($formationSanitaireId) {
            $query->where('nom_formation_sanitaire_id', $formationSanitaireId);
        }

        $fonctionnaires = $query->get();

        // Create PDF instead of Word document since PhpWord is causing issues
        $pdf = new CustomPDF('L', 'mm', 'A4'); // 'L' for Landscape

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Liste des Affectations');
        $pdf->SetSubject('Export PDF');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-paysage.png');
        $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins
        $pdf->SetMargins(15, 50, 15); // Left, Top, Right
        $pdf->SetHeaderMargin(20);
        $pdf->SetFooterMargin(20);

        // Set Auto Page Break
        $pdf->SetAutoPageBreak(true, 30); // Bottom margin for auto page break

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('dejavusans', '', 12);

        // Add title
        $formationName = '';
        if ($formationSanitaireId) {
            $formation = NomFormationSanitaire::find($formationSanitaireId);
            if ($formation) {
                $formationName = ' - ' . $formation->nom;
            }
        }

        $title = 'Fonctionnaires en Service du ' . Carbon::parse($dateDebut)->format('d/m/Y') . ' au ' . Carbon::parse($dateFin)->format('d/m/Y') . $formationName;

        $html = '<h3 style="text-align: center; margin-bottom: 15px;">' . $title . '</h3>';
        $html .= '<table border="1" cellspacing="0" cellpadding="3" style="width: 100%; text-align: center; border-collapse: collapse; margin-top: 10px;">
                    <thead>
                        <tr>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 10px;">PPR</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 10px;">CIN</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 10px;">Nom et Prénom</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 10px;">Nom et Prénom (Arabe)</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 10px;">Formation Sanitaire</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 10px;">Service</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 10px;">Fonction</th>
                            <th style="background-color: #4b75ff; color: white; font-weight: bold; font-size: 10px;">Date d\'affectation</th>
                        </tr>
                    </thead>
                    <tbody>';

        $rowCount = 0;
        foreach ($fonctionnaires as $fonctionnaire) {
            // Check if there's a mutation history
            $latestMutation = $fonctionnaire->historiqueMutation->first();

            // Use mutation data if available, otherwise use fonctionnaire data
            $dateAffectation = $latestMutation ? $latestMutation->date_mutation : $fonctionnaire->date_mutation;

            // Skip if the date is outside the requested period
            if ($dateAffectation && (Carbon::parse($dateAffectation)->isBefore(Carbon::parse($dateDebut)) || Carbon::parse($dateAffectation)->isAfter(Carbon::parse($dateFin)))) {
                continue;
            }

            $rowStyle = $rowCount % 2 == 0 ? 'background-color: #f8f9fa;' : '';
            $rowCount++;

            $html .= '<tr style="' . $rowStyle . '">
                        <td style="font-size: 9px;">' . ($fonctionnaire->ppr ?: '-') . '</td>
                        <td style="font-size: 9px;">' . ($fonctionnaire->cin ?: '-') . '</td>
                        <td style="font-size: 9px;">' . $fonctionnaire->nom . ' ' . $fonctionnaire->prenom . '</td>
                        <td style="font-size: 9px; direction: rtl;">' . $fonctionnaire->nom_arabe . ' ' . $fonctionnaire->prenom_arabe . '</td>
                        <td style="font-size: 9px;">' . ($fonctionnaire->nomFormationSanitaire ? $fonctionnaire->nomFormationSanitaire->nom : '-') . '</td>
                        <td style="font-size: 9px;">' . ($fonctionnaire->service ? $fonctionnaire->service->nom : '-') . '</td>
                        <td style="font-size: 9px;">' . ($fonctionnaire->fonction ? $fonctionnaire->fonction->nom : '-') . '</td>
                        <td style="font-size: 9px;">' . ($dateAffectation ? Carbon::parse($dateAffectation)->format('d/m/Y') : '-') . '</td>
                      </tr>';
        }

        $html .= '</tbody></table>';

        // Write HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        $fileName = 'Fonctionnaires_Service_' . Carbon::parse($dateDebut)->format('d-m-Y') . '_au_' . Carbon::parse($dateFin)->format('d-m-Y') . $formationName . '.pdf';
        $filePath = storage_path("app/public/{$fileName}");

        $pdf->Output($filePath, 'F');

        return response()->download($filePath)->deleteFileAfterSend();
    }

    public function attestation($id)
    {
        $fonctionnaire = Fonctionnaire::with(['nomFormationSanitaire', 'service', 'specialiteGrade.grade.cadre'])
            ->findOrFail($id);

        $pdf = new CustomPDF();

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Attestation de Travail');
        $pdf->SetSubject('Export PDF');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-urh.png');
        $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins
        $pdf->SetMargins(15, 50, 15); // Left, Top, Right
        $pdf->SetHeaderMargin(20);
        $pdf->SetFooterMargin(20);

        // Set Auto Page Break
        $pdf->SetAutoPageBreak(true, 30); // Bottom margin for auto page break

        // Add a page
        $pdf->AddPage();

        // Title
        $pdf->SetFont('dejavusans', 'B', 16);
        $pdf->Cell(0, 10, 'ATTESTATION DE TRAVAIL', 0, 1, 'C');
        $pdf->Ln(10);

        // Content
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->Cell(0, 8, 'Je soussigné, Le Délégué du Ministère de la Santé et de la Protection Sociale à la préfecture de Fès,', 0, 1, 'L');
        $pdf->Ln(5);
        $pdf->Cell(0, 8, 'Atteste que :', 0, 1, 'L');
        $pdf->Ln(5);

        // Employee details with proper alignment (MÊME FORMAT QUE BATCH)
        $pdf->SetFont('dejavusans', '', 12);

        // Nom et Prénom
        $pdf->Cell(60, 8, 'Nom et Prénom', 0, 0, 'L');
        $pdf->Cell(5, 8, ':', 0, 0, 'L');
        $pdf->SetFont('dejavusans', 'B', 12);
        $pdf->Cell(0, 8, strtoupper($fonctionnaire->nom . ' ' . $fonctionnaire->prenom), 0, 1, 'L');

        // PPR
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->Cell(60, 8, 'PPR', 0, 0, 'L');
        $pdf->Cell(5, 8, ':', 0, 0, 'L');
        $pdf->Cell(0, 8, $fonctionnaire->ppr, 0, 1, 'L');

        // Cadre
        $pdf->Cell(60, 8, 'Cadre', 0, 0, 'L');
        $pdf->Cell(5, 8, ':', 0, 0, 'L');
        $pdf->Cell(0, 8, $fonctionnaire->specialiteGrade->grade->cadre->nom ?? 'N/A', 0, 1, 'L');

        // Spécialité Grade
        $pdf->Cell(60, 8, 'Spécialité Grade', 0, 0, 'L');
        $pdf->Cell(5, 8, ':', 0, 0, 'L');
        $pdf->Cell(0, 8, $fonctionnaire->specialiteGrade->nom ?? 'N/A', 0, 1, 'L');

        // Service
        $pdf->Cell(60, 8, 'Service', 0, 0, 'L');
        $pdf->Cell(5, 8, ':', 0, 0, 'L');
        $pdf->Cell(0, 8, $fonctionnaire->service->nom ?? 'N/A', 0, 1, 'L');

        // Affectation
        $pdf->Cell(60, 8, 'Affectation', 0, 0, 'L');
        $pdf->Cell(5, 8, ':', 0, 0, 'L');
        $pdf->Cell(0, 8, $fonctionnaire->nomFormationSanitaire->nom ?? 'N/A', 0, 1, 'L');

        $pdf->Ln(10);

        $pdf->SetFont('dejavusans', '', 12);
        $pdf->Cell(0, 8, 'Cette attestation est délivrée à l\'intéressé(e) pour servir et valoir ce que de droit.', 0, 1, 'L');

        // Date and signature
        $pdf->Ln(20);
        $pdf->SetFont('dejavusans', '', 12);
        $pdf->Cell(0, 8, 'Fait à Fès, le ' . date('d/m/Y'), 0, 1, 'R');
        $pdf->SetFont('dejavusans', 'B', 12);
        $pdf->Cell(0, 8, 'LE DÉLÉGUÉ DU MINISTRE DE LA SANTÉ', 0, 1, 'R');
        $pdf->Cell(0, 8, 'À LA PRÉFECTURE FÈS', 0, 1, 'R');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('attestation_de_travail_' . $fonctionnaire->ppr . '.pdf', 'I'),
            'attestation_de_travail_' . $fonctionnaire->ppr . '.pdf'
        );
    }






    public function show($id)
    {
        $fonctionnaire = Fonctionnaire::with([
            'relicats.typeConge',
            'greves',
            'certificates.type_certificate',
            'historiqueMutation',
            'historiquePosition'
        ])->findOrFail($id);

        // Get all congé documents for this fonctionnaire (like in global search)
        $congeDocuments = $this->getFonctionnaireCongeDocuments($fonctionnaire);

        // Get congé statistics by year and type
        $congeStatistics = $this->getFonctionnaireCongeStatistics($fonctionnaire);

        // Get totals by type for the list
        $congeTotals = $this->getCongeTypesTotals($fonctionnaire);

        return view('fonctionnaire.show', compact('fonctionnaire', 'congeDocuments', 'congeStatistics', 'congeTotals'));
    }

    /**
     * Get all congé documents for a specific fonctionnaire (similar to global search)
     */
    private function getFonctionnaireCongeDocuments($fonctionnaire)
    {
        $results = [];

        // Search in Relicat (old congé requests)
        $relicats = \App\Models\Relicat::with(['fonctionnaire', 'typeConge'])
            ->where('fonctionnaire_id', $fonctionnaire->id)
            ->get();

        foreach ($relicats as $relicat) {
            $results[] = [
                'id' => $relicat->id,
                'type' => 'Relicat',
                'type_conge' => $relicat->typeConge ? $relicat->typeConge->nom : 'Non défini',
                'nombre_jours' => $relicat->nbr_jours_disponibles,
                'date_debut' => $relicat->date_conge,
                'date_fin' => null,
                'statut' => 'Disponible',
                'created_at' => $relicat->created_at,
                'source' => 'relicat',
                'relicat' => $relicat
            ];
        }

        // Search in CongeDecision (new congé decisions)
        $congeDecisions = \App\Models\CongeDecision::with(['fonctionnaire', 'typeConge'])
            ->where('fonctionnaire_id', $fonctionnaire->id)
            ->get();

        foreach ($congeDecisions as $congeDecision) {
            $results[] = [
                'id' => $congeDecision->id,
                'type' => 'Décision',
                'type_conge' => $congeDecision->typeConge ? $congeDecision->typeConge->nom : 'Non défini',
                'nombre_jours' => $congeDecision->nombre_jours,
                'date_debut' => $congeDecision->date_debut,
                'date_fin' => $congeDecision->date_fin,
                'statut' => ucfirst($congeDecision->statut ?? 'En attente'),
                'created_at' => $congeDecision->created_at,
                'source' => 'decision',
                'congeDecision' => $congeDecision
            ];
        }

        // Sort by creation date (most recent first)
        usort($results, function($a, $b) {
            return $b['created_at'] <=> $a['created_at'];
        });

        return $results;
    }

    /**
     * Get congé statistics by year and type for a specific fonctionnaire
     */
    private function getFonctionnaireCongeStatistics($fonctionnaire)
    {
        $statistics = [
            'by_year' => [],
            'by_type' => [],
            'summary' => []
        ];

        // Use the same data as the list to ensure consistency
        $congeDocuments = $this->getFonctionnaireCongeDocuments($fonctionnaire);

        // Get all years from the documents
        $years = collect();
        foreach ($congeDocuments as $conge) {
            if ($conge['date_debut']) {
                $year = \Carbon\Carbon::parse($conge['date_debut'])->year;
                $years->push($year);
            }
        }
        $years = $years->unique()->sort()->values();

        // Get all types with their standard allocations
        $allTypes = \App\Models\TypeConge::all();
        $typeAllocations = [];
        foreach ($allTypes as $type) {
            // If the type is 'administratif' (or contains that word), enforce 22 days standard
            $lowerName = strtolower($type->nom ?? '');
            if (str_contains($lowerName, 'administratif')) {
                $typeAllocations[$type->nom] = 22;
            } else {
                $typeAllocations[$type->nom] = $type->jours ?? 0;
            }
        }

        // Calculate statistics by year
        foreach ($years as $year) {
            $yearStats = [
                'year' => $year,
                'reliquats_disponibles' => 0,
                'jours_pris' => 0,
                'by_type' => []
            ];

            // Initialize with standard allocations for each type
            foreach ($typeAllocations as $typeName => $standardDays) {
                // Start with standard allocation
                $yearStats['by_type'][$typeName] = [
                    'standard' => $standardDays,
                    'pris' => 0,
                    'solde' => $standardDays,
                    'additifs' => 0
                ];

                // Include additifs that apply to this year (Option B: additif applies only to its specified year)
                $typeModel = $allTypes->firstWhere('nom', $typeName);
                $typeId = $typeModel ? $typeModel->id : null;
                $additifsSum = 0;
                if ($typeId) {
                    $additifsSum = \App\Models\Relicat::where('fonctionnaire_id', $fonctionnaire->id)
                        ->where('type_conge_id', $typeId)
                        ->where('is_additif', 1)
                        ->where('annee', $year)
                        ->sum('nbr_jours_disponibles');
                }

                // total available for this type in this year = standard allocation + additifs for that year
                $yearStats['by_type'][$typeName]['additifs'] = $additifsSum;
                $yearStats['by_type'][$typeName]['solde'] = $standardDays + $additifsSum;
                $yearStats['reliquats_disponibles'] += ($standardDays + $additifsSum);
            }

            // Calculate days taken for this year
            foreach ($congeDocuments as $conge) {
                if ($conge['date_debut'] && \Carbon\Carbon::parse($conge['date_debut'])->year == $year) {
                    $typeNom = $conge['type_conge'];

                    // Only count decisions (actual leave taken), not relicats
                    if ($conge['source'] == 'decision') {
                        $yearStats['jours_pris'] += $conge['nombre_jours'];

                        if (isset($yearStats['by_type'][$typeNom])) {
                            $yearStats['by_type'][$typeNom]['pris'] += $conge['nombre_jours'];
                            // solde = standard + additifs - pris
                            $yearStats['by_type'][$typeNom]['solde'] =
                                $yearStats['by_type'][$typeNom]['standard'] + $yearStats['by_type'][$typeNom]['additifs'] - $yearStats['by_type'][$typeNom]['pris'];
                        }
                    }
                }
            }

            // Update total available days (standard + additifs - taken)
            $yearStats['reliquats_disponibles'] = $yearStats['reliquats_disponibles'] - $yearStats['jours_pris'];

            $statistics['by_year'][$year] = $yearStats;
        }

    // Calculate overall statistics by type using standard allocations + additifs for the current year (Option B)
        $typeStats = [];

        // Initialize with all types and their standard allocations
        foreach ($allTypes as $type) {

            // Sum additifs that apply to the current year only (Option B)
            $currentYear = date('Y');
            $additifsSum = \App\Models\Relicat::where('fonctionnaire_id', $fonctionnaire->id)
                ->where('type_conge_id', $type->id)
                ->where('is_additif', 1)
                ->where('annee', $currentYear)
                ->sum('nbr_jours_disponibles');

            $totalAvailable = ($type->jours ?? 0) + $additifsSum;

            $typeStats[$type->nom] = [
                'standard_allocation' => $type->jours ?? 0,
                'additifs' => $additifsSum,
                'reliquats_total' => $totalAvailable, // standard + additifs
                'pris_total' => 0,
                'restant' => $totalAvailable
            ];
        }

        // Calculate total days taken by type across all years
        foreach ($congeDocuments as $conge) {
            $typeNom = $conge['type_conge'];

            // Only count decisions (actual leave taken)
            if ($conge['source'] == 'decision' && isset($typeStats[$typeNom])) {
                $typeStats[$typeNom]['pris_total'] += $conge['nombre_jours'];
            }
        }

        // Calculate remaining days for each type
        foreach ($typeStats as $typeName => $typeData) {
            $typeStats[$typeName]['restant'] = $typeData['reliquats_total'] - $typeData['pris_total'];
        }

        $statistics['by_type'] = $typeStats;

        // Summary using standard allocations + additifs
        $totalAvailableAllocation = 0;
        $totalPris = 0;
        foreach ($typeStats as $typeData) {
            // 'standard_allocation' already includes additifs (cumulative standard), so don't add additifs again
            $totalAvailableAllocation += ($typeData['standard_allocation'] ?? 0);
            $totalPris += $typeData['pris_total'];
        }

        $statistics['summary'] = [
            'total_reliquats' => $totalAvailableAllocation,
            'total_pris' => $totalPris,
            'total_restant' => $totalAvailableAllocation - $totalPris
        ];

        return $statistics;
    }

    /**
     * Get totals by congé type for display in the list
     */
    private function getCongeTypesTotals($fonctionnaire)
    {
        $totals = [];

        // Get all congé types with their predefined soldes
        $allTypes = \App\Models\TypeConge::all();

    // Normalize fonctionnaire sexe to decide whether to hide gender-specific types
    $sexeChar = isset($fonctionnaire->sexe) ? strtoupper(substr($fonctionnaire->sexe, 0, 1)) : null;
    $isFemale = $sexeChar === 'F';
    $isMale = $sexeChar === 'M';

        foreach ($allTypes as $type) {
            // If fonctionnaire is female, skip paternity-type entries (name contains 'patern')
            $typeNomLower = strtolower($type->nom ?? '');
            // Skip paternity for females, skip maternity for males (name-based heuristic)
            if ($isFemale && stripos($typeNomLower, 'patern') !== false) {
                continue;
            }
            if ($isMale && stripos($typeNomLower, 'matern') !== false) {
                continue;
            }
            // Calculate reliquats total (what the employee has been allocated) including additifs
            $reliquatsTotal = \App\Models\Relicat::where('fonctionnaire_id', $fonctionnaire->id)
                ->where('type_conge_id', $type->id)
                ->sum('nbr_jours_disponibles');


            // Sum additifs that apply to the current year only (Option B)
            $currentYear = date('Y');
            $additifsSum = \App\Models\Relicat::where('fonctionnaire_id', $fonctionnaire->id)
                ->where('type_conge_id', $type->id)
                ->where('is_additif', 1)
                ->where('annee', $currentYear)
                ->sum('nbr_jours_disponibles');

            // If there are no explicit reliquats, consider standard + additifs as available
            if ($reliquatsTotal <= 0 && $additifsSum > 0) {
                $reliquatsTotal = ($type->jours ?? 0) + $additifsSum;
            }

            // Calculate jours pris total (what the employee has used)
            $joursPrisTotal = \App\Models\CongeDecision::where('fonctionnaire_id', $fonctionnaire->id)
                ->where('type_conge_id', $type->id)
                ->sum('nombre_jours');

            // Use the jours from type_conges table as the standard allocation, but enforce 22 for administratif
            $lowerTypeName = strtolower($type->nom ?? '');
            $standardDays = str_contains($lowerTypeName, 'administratif') ? 22 : ($type->jours ?? 0);

            // Cumulative standard shown to user = standard allocation + additifs for the current year
            $cumulativeStandard = $standardDays + $additifsSum;

            // For administratif: standard = 22 + additifs, disponible = standard - pris, restants = disponible
            if (str_contains($lowerTypeName, 'administratif')) {
                // Additifs cumulés: tous les additifs antérieurs et de l'année courante
                $additifsCumul = \App\Models\Relicat::where('fonctionnaire_id', $fonctionnaire->id)
                    ->where('type_conge_id', $type->id)
                    ->where('is_additif', 1)
                    ->where('annee', '<=', date('Y'))
                    ->sum('nbr_jours_disponibles');
                $standardAdmin = 22 + $additifsCumul;
                $disponibleAdmin = $standardAdmin - $joursPrisTotal;
                $totals[$type->nom] = [
                    'type_id' => $type->id,
                    'standard_allocation' => $standardAdmin,
                    'reliquats_total' => $standardAdmin,
                    'additifs' => $additifsCumul,
                    'jours_pris_total' => $joursPrisTotal,
                    'jours_restants' => $disponibleAdmin,
                    'available_days' => $disponibleAdmin,
                    'pourcentage_utilise' => $standardAdmin > 0 ? round(($joursPrisTotal / $standardAdmin) * 100, 1) : 0
                ];
            } else {
                // For other types, keep previous logic (prefer relicatsTotal if present)
                $allocatedAmount = $reliquatsTotal > 0 ? $reliquatsTotal : $cumulativeStandard;
                $joursRestants = $allocatedAmount - $joursPrisTotal;
                $totals[$type->nom] = [
                    'type_id' => $type->id,
                    'standard_allocation' => $cumulativeStandard,
                    'reliquats_total' => $allocatedAmount,
                    'additifs' => $additifsSum,
                    'jours_pris_total' => $joursPrisTotal,
                    'jours_restants' => $joursRestants,
                    'available_days' => $joursRestants,
                    'pourcentage_utilise' => $allocatedAmount > 0 ? round(($joursPrisTotal / $allocatedAmount) * 100, 1) : 0
                ];
            }
        }

        return $totals;
    }

    /**
     * Show congé decision details
     */
    public function showCongeDecision($id)
    {
        // First try to find a CongeDecision with this id
        $congeDecision = \App\Models\CongeDecision::with(['fonctionnaire', 'typeConge'])->find($id);

        if ($congeDecision) {
            return response()->json([
                'success' => true,
                'decision' => [
                    'id' => $congeDecision->id,
                    'fonctionnaire' => $congeDecision->fonctionnaire->nom . ' ' . $congeDecision->fonctionnaire->prenom,
                    'ppr' => $congeDecision->fonctionnaire->ppr,
                    'type_conge' => $congeDecision->typeConge ? $congeDecision->typeConge->nom : 'Non défini',
                    'nombre_jours' => $congeDecision->nombre_jours,
                    'date_debut' => $congeDecision->date_debut ? \Carbon\Carbon::parse($congeDecision->date_debut)->format('d/m/Y') : null,
                    'date_fin' => $congeDecision->date_fin ? \Carbon\Carbon::parse($congeDecision->date_fin)->format('d/m/Y') : null,
                    'statut' => ucfirst($congeDecision->statut ?? 'En attente'),
                    'remarques' => $congeDecision->remarques,
                    'created_at' => $congeDecision->created_at->format('d/m/Y H:i'),
                    'updated_at' => $congeDecision->updated_at->format('d/m/Y H:i')
                ]
            ]);
        }

        // If not found, try a Relicat (ancien format de congé)
        $relicat = \App\Models\Relicat::with(['fonctionnaire', 'typeConge'])->find($id);

        if ($relicat) {
            return response()->json([
                'success' => true,
                'decision' => [
                    'id' => $relicat->id,
                    'fonctionnaire' => $relicat->fonctionnaire->nom . ' ' . $relicat->fonctionnaire->prenom,
                    'ppr' => $relicat->fonctionnaire->ppr ?? null,
                    'type_conge' => $relicat->typeConge ? $relicat->typeConge->nom : 'Non défini',
                    'nombre_jours' => $relicat->nbr_jours_disponibles,
                    'date_debut' => $relicat->date_conge ? \Carbon\Carbon::parse($relicat->date_conge)->format('d/m/Y') : null,
                    'date_fin' => null,
                    'statut' => 'Disponible',
                    'remarques' => null,
                    'created_at' => $relicat->created_at ? $relicat->created_at->format('d/m/Y H:i') : null,
                    'updated_at' => $relicat->updated_at ? $relicat->updated_at->format('d/m/Y H:i') : null
                ]
            ]);
        }

        // Not found in either table
        return response()->json(['success' => false, 'message' => 'Décision ou reliquat introuvable'], 404);
    }

    /**
     * Show import form for fonctionnaires
     */
    public function showImport()
    {
        return view('fonctionnaire.import');
    }

    /**
     * Process Excel import for fonctionnaires
     */
    public function processImport(Request $request)
    {
        // Debug: vérifier si la méthode est appelée
        Log::info('Import process called', ['request' => $request->all()]);

        $request->validate([
            'excel_file' => 'required|file|mimes:xlsx,xls,csv|max:10240', // 10MB max
        ]);

        try {
            // Vérifier si PhpSpreadsheet est disponible
            if (!class_exists('\PhpOffice\PhpSpreadsheet\IOFactory')) {
                return redirect()->route('fonctionnaire.page')->with('error', 'PhpSpreadsheet n\'est pas installé. Veuillez installer composer require phpoffice/phpspreadsheet');
            }
            $file = $request->file('excel_file');
            $extension = $file->getClientOriginalExtension();

            // Traitement différent selon le type de fichier
            if (strtolower($extension) === 'csv') {
                $rows = $this->readCSVFile($file);
            } else {
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getPathname());
                $worksheet = $spreadsheet->getActiveSheet();
                $rows = $worksheet->toArray();
            }

            // Remove header row if exists
            $header = array_shift($rows);

            $imported = 0;
            $errors = [];
            $duplicates = 0;

            foreach ($rows as $index => $row) {
                $rowNumber = $index + 2; // +2 because we removed header and arrays are 0-indexed

                // Skip empty rows
                if (empty(array_filter($row))) {
                    continue;
                }

                // Extract data from row (assuming order: PPR, Nom, Prénom, CIN, Sexe, Date de naissance)
                $ppr = trim($row[0] ?? '');
                $nom = trim($row[1] ?? '');
                $prenom = trim($row[2] ?? '');
                $cin = trim($row[3] ?? '');
                $sexe = trim($row[4] ?? '');
                $dateNaissance = $row[5] ?? null;

                // Validate required fields
                if (empty($ppr) || empty($nom) || empty($prenom)) {
                    $errors[] = "Ligne {$rowNumber}: PPR, Nom et Prénom sont obligatoires";
                    continue;
                }

                // Normalize sexe
                $sexeNormalized = null;
                if (!empty($sexe)) {
                    $sexeLower = strtolower(trim($sexe));
                    if (in_array($sexeLower, ['m', 'masculin', 'homme', 'male', '1'])) {
                        $sexeNormalized = 'M';
                    } elseif (in_array($sexeLower, ['f', 'féminin', 'feminin', 'femme', 'female', '2'])) {
                        $sexeNormalized = 'F';
                    } else {
                        $errors[] = "Ligne {$rowNumber}: Sexe invalide '{$sexe}'. Utilisez M/F, Masculin/Féminin, Homme/Femme";
                        continue;
                    }
                }

                // Check if fonctionnaire already exists
                $existingFonctionnaire = Fonctionnaire::where('ppr', $ppr)->first();
                if ($existingFonctionnaire) {
                    $duplicates++;
                    continue;
                }

                // Parse date if provided
                $parsedDate = null;
                if (!empty($dateNaissance)) {
                    try {
                        if (is_numeric($dateNaissance)) {
                            // Excel date serial number
                            $parsedDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($dateNaissance)->format('Y-m-d');
                        } else {
                            // Text date
                            $parsedDate = \Carbon\Carbon::parse($dateNaissance)->format('Y-m-d');
                        }
                    } catch (\Exception $e) {
                        $errors[] = "Ligne {$rowNumber}: Format de date invalide pour '{$dateNaissance}'";
                        continue;
                    }
                }

                // Create fonctionnaire avec seulement les champs essentiels
                try {
                    $fonctionnaireData = [
                        'ppr' => $ppr,
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'date_mutation' => now()->format('Y-m-d'), // Date d'aujourd'hui pour éviter l'erreur
                    ];

                    // Ajouter les champs optionnels seulement s'ils ne sont pas vides
                    if (!empty($cin)) {
                        $fonctionnaireData['cin'] = $cin;
                    }

                    if (!empty($sexeNormalized)) {
                        $fonctionnaireData['sexe'] = $sexeNormalized;
                    }

                    if (!empty($parsedDate)) {
                        $fonctionnaireData['date_naissance'] = $parsedDate;
                    }

                    Fonctionnaire::create($fonctionnaireData);
                    $imported++;
                } catch (\Exception $e) {
                    $errors[] = "Ligne {$rowNumber}: Erreur lors de la création - " . $e->getMessage();
                }
            }

            $message = "Import terminé: {$imported} fonctionnaires importés";
            if ($duplicates > 0) {
                $message .= ", {$duplicates} doublons ignorés";
            }
            if (!empty($errors)) {
                $message .= ", " . count($errors) . " erreurs";
            }

            // Rediriger vers la page des fonctionnaires avec le message
            return redirect()->route('fonctionnaire.page')->with('success', $message)->with('errors', $errors);

        } catch (\Exception $e) {
            Log::error('Import error', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->route('fonctionnaire.page')->with('error', 'Erreur lors de l\'import: ' . $e->getMessage());
        }
    }

    /**
     * Read CSV file and return rows array
     */
    private function readCSVFile($file)
    {
        $rows = [];
        $handle = fopen($file->getPathname(), 'r');

        if ($handle !== false) {
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $rows[] = $data;
            }
            fclose($handle);
        }

        return $rows;
    }

    /**
     * Test import method - creates a test fonctionnaire
     */
    public function testImport()
    {
        try {
            $testData = [
                'ppr' => 'TEST' . time(), // PPR unique avec timestamp
                'nom' => 'TEST',
                'prenom' => 'IMPORT',
                'cin' => 'TEST' . time(),
                'sexe' => 'M',
                'date_mutation' => now()->format('Y-m-d'), // Date d'aujourd'hui
            ];

            Fonctionnaire::create($testData);

            return redirect()->route('fonctionnaire.page')->with('success', 'Test d\'import réussi ! PPR: ' . $testData['ppr']);
        } catch (\Exception $e) {
            return redirect()->route('fonctionnaire.page')->with('error', 'Erreur test: ' . $e->getMessage());
        }
    }

    /**
     * Export congés data to Excel
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportConges(Request $request)
    {
        // Validate request
        $request->validate([
            'date_debut' => 'nullable|date',
            'date_fin' => 'nullable|date',
            'type_conge_id' => 'nullable|exists:type_conges,id',
            'formation_sanitaire_id' => 'nullable|exists:nom_formation_sanitaires,id',
            'ppr' => 'nullable|string',
        ]);

        // Build query
        $query = Relicat::with(['fonctionnaire', 'fonctionnaire.nomFormationSanitaire', 'typeConge']);

        // Apply filters
        if ($request->filled('date_debut')) {
            $query->whereDate('date_conge', '>=', $request->date_debut);
        }

        if ($request->filled('date_fin')) {
            $query->whereDate('date_conge', '<=', $request->date_fin);
        }

        if ($request->filled('type_conge_id')) {
            $query->where('type_conge_id', $request->type_conge_id);
        }

        if ($request->filled('formation_sanitaire_id')) {
            $query->whereHas('fonctionnaire', function ($q) use ($request) {
                $q->where('nom_formation_sanitaire_id', $request->formation_sanitaire_id);
            });
        }

        if ($request->filled('ppr')) {
            $query->whereHas('fonctionnaire', function ($q) use ($request) {
                $q->where('ppr', 'like', '%' . $request->ppr . '%');
            });
        }

        // Get data
        $data = $query->get();

        // Create Excel file
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'Nom & Prénom');
        $sheet->setCellValue('B1', 'Affectation');
        $sheet->setCellValue('C1', 'PPR');
        $sheet->setCellValue('D1', 'Type de congé');
        $sheet->setCellValue('E1', 'Nombre de jours de congé');
        $sheet->setCellValue('F1', 'Date de prise');

        // Style headers
        $headerStyle = $sheet->getStyle('A1:F1');
        $headerStyle->getFont()->setBold(true);
        $headerStyle->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFCCCCCC');

        // Add data
        $row = 2;
        foreach ($data as $item) {
            if (!$item->fonctionnaire) {
                continue; // Skip if fonctionnaire is null
            }

            $sheet->setCellValue('A' . $row, $item->fonctionnaire->nom . ' ' . $item->fonctionnaire->prenom);
            $sheet->setCellValue('B' . $row, $item->fonctionnaire->nomFormationSanitaire ? $item->fonctionnaire->nomFormationSanitaire->nom : '');
            $sheet->setCellValue('C' . $row, $item->fonctionnaire->ppr);
            $sheet->setCellValue('D' . $row, $item->typeConge ? $item->typeConge->nom : '');
            $sheet->setCellValue('E' . $row, $item->nbr_jours_disponibles);
            $sheet->setCellValue('F' . $row, $item->date_conge ? \Carbon\Carbon::parse($item->date_conge)->format('d/m/Y') : '');

            $row++;
        }

        // Auto size columns
        foreach (range('A', 'F') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Create file
        $fileName = 'Congés_' . date('Y-m-d_H-i-s') . '.xlsx';
        $filePath = storage_path("app/public/{$fileName}");

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }

    /**
     * Generate a PDF decision for a congé
     *
     * @param int $relicatId
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function congeDecision($relicatId, Request $request)
    {
        // Validate ampliations
        $request->validate([
            'ampliations' => 'nullable|array',
            'ampliations.*' => 'string',
        ]);

        // Get the relicat with related data
        $relicat = Relicat::with([
            'fonctionnaire',
            'fonctionnaire.specialiteGrade',
            'fonctionnaire.nomFormationSanitaire',
            'typeConge'
        ])->findOrFail($relicatId);

        $fonctionnaire = $relicat->fonctionnaire;

        if (!$fonctionnaire) {
            return redirect()->back()->with('error', 'Fonctionnaire non trouvé.');
        }

        // Get the year from the relicat date or use the current year
        $congeYear = $relicat->date_conge
            ? Carbon::parse($relicat->date_conge)->year
            : date('Y');

        // Create PDF
        $pdf = new CustomPDF('P', 'mm', 'A4');

        // Set document information
        $pdf->SetCreator('GRHDMSP-Fes');
        $pdf->SetAuthor('Med Kaddouri');
        $pdf->SetTitle('Décision de Congé');
        $pdf->SetSubject('Décision de Congé');

        // Set header and footer images
        $pdf->headerImage = public_path('html/assets/img/pdf/header-delegation-urh.png');
        // $pdf->footerImage = public_path('html/assets/img/pdf/footer-deligation.png');

        // Set margins
        $pdf->SetMargins(20, 50, 20); // Left, Top, Right
        $pdf->SetHeaderMargin(20);
        $pdf->SetFooterMargin(20);

        // Set Auto Page Break
        $pdf->SetAutoPageBreak(true, 30); // Bottom margin for auto page break

        // Add a page
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('dejavusans', '', 12);

        // Add content
        $html = '<h1 style="text-align: center; font-size: 18px; margin-bottom: 20px;text-decoration: underline;">DECISION</h1>';
        $html .= '<p style="text-align: justify; line-height: 0.5;">Le Délégué du M.S. à la Préfecture de Fès :</p>';
        $html .= '<p style="text-align: justify; line-height: 0.5;">Vu la demande de congé présentée par M. ' . $fonctionnaire->nom . ' ' . $fonctionnaire->prenom . '</p>';
        $html .= '<p style="text-align: justify; line-height: 0.5;">Vu l\'avis favorable de son chef immédiat</p>';
        $html .= '<p style="text-align: justify; line-height: 0.5;">Vu les pièces justificatives des journées travaillées:</p>';

        $html .= '<h2 style="text-align: center; font-size: 14px; margin: 20px 0;text-decoration: underline;">DECIDE:</h2>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Article unique : </strong><b style="text-transform: uppercase;">' . ($relicat->typeConge ? $relicat->typeConge->nom : 'Congé') . '</b></p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Une durée de : </strong>' . $relicat->nbr_jours_disponibles . ' Jour(s)</p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Au titre de l\'année : </strong>' . $congeYear . '</p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Accordé à : </strong>' . $fonctionnaire->nom . ' ' . $fonctionnaire->prenom . '</p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>PPR : </strong>' . $fonctionnaire->ppr . '</p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Grade : </strong>' . ($fonctionnaire->specialiteGrade ? $fonctionnaire->specialiteGrade->nom : '') . '</p>';
        $html .= '<p style="text-align: justify; line-height: 1.2;"><strong>Est en fonction : </strong>' . ($fonctionnaire->specialiteGrade ? $fonctionnaire->specialiteGrade->nom : '') . ' (' . ($fonctionnaire->nomFormationSanitaire ? $fonctionnaire->nomFormationSanitaire->nom : 'Fès') . ')</p>';

        // Format the date if available
        $dateConge = $relicat->date_conge ? Carbon::parse($relicat->date_conge)->format('d/m/Y') : '........................';
        $html .= '<p style="text-align: justify; line-height: 1.5;"><strong>Pour en bénéficier à compter du : </strong> ' . $dateConge . '</p>';

        $html .= '<p style="text-align: right; margin-top: 30px;">Fès, le ' . date('d/m/Y') . '</p>';
        $html .= '<p style="text-align: right; font-weight: bold;">LE DELEGUE DU MINISTERE DE LA SANTE<br>A LA PREFECTURE DE FES</p>';

        // Add ampliations
        $html .= '<p style="margin-top: 40px;"><strong>AMPLIATIONS:</strong></p>';
        $html .= '<ul>';

        // Add selected ampliations
        if ($request->has('ampliations') && is_array($request->ampliations)) {
            foreach ($request->ampliations as $ampliation) {
                $html .= '<li>' . $ampliation . '</li>';
            }
        }

        // Always add these ampliations
        $html .= '<li>L\'INTERESSE(E)</li>';
        $html .= '<li>ARCHIVES.</li>';
        $html .= '</ul>';

        // Write HTML to PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF to the browser
        return response()->streamDownload(
            fn() => $pdf->Output('decision_conge_' . $fonctionnaire->ppr . '.pdf', 'I'),
            'decision_conge_' . $fonctionnaire->ppr . '.pdf'
        );
    }
}
