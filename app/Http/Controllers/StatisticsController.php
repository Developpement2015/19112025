<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\ArrondissementCommune;
use App\Models\Cadre;
use App\Models\CategorieCadre;
use App\Models\CategorieFormation;
use App\Models\Fonctionnaire;
use App\Models\GradeCadre;
use App\Models\NiveauCategorieFormation;
use App\Models\NomFormationSanitaire;
use App\Models\Position;
use App\Models\PositionHistorique;
use App\Models\Region;
use App\Models\SpecialiteGrade;
use App\Models\TypeCategorieFormation;
use App\Models\Ville;


use Barryvdh\DomPDF\Facade\Pdf as DomPDF;
use App\Models\Greve;
use App\Models\Certificate;
use App\Models\Relicat;
use App\Models\DemandeConge;
use App\Models\TypeConge;
use App\Models\Retraite;
use App\Models\CongeDecision;
use App\Models\Conge;
use App\Models\HistoriqueMutation;
use App\Models\Mutation;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class StatisticsController extends Controller
{
    public function detailedStatistics(Request $request)
    {
        // Get all hierarchical data
        $regions = Region::with('villes')->get();
        $villes = Ville::with('arrondissementCommunes')->get();
        $arrondissementCommunes = ArrondissementCommune::all();

        // Healthcare formations
        $nomFormationSanitaires = NomFormationSanitaire::with([
            'arrondissement_commune.ville.region'
        ])->get();
        $niveauCategorieFormations = NiveauCategorieFormation::all();
        $typeCategorieFormations = TypeCategorieFormation::all();
        $categorieFormations = CategorieFormation::all();

        // Cadre relationships
        $categorieCadres = CategorieCadre::with('cadres')->get();
        $cadres = Cadre::all();
        $gradeCadres = GradeCadre::all();
        $specialiteGrades = SpecialiteGrade::all();
        $positions = Position::all();

        // Fonctionnaires query - start with all fonctionnaires by default
        $fonctionnairesQuery = Fonctionnaire::with([
            'specialiteGrade.grade.cadre.categorie_cadre',
            'nomFormationSanitaire'
        ])->whereNotNull('id'); // Inclure TOUS les fonctionnaires par défaut

        // Apply date filters for service dates (standard filters)
        if ($request->filled('date_debut_service')) {
            $fonctionnairesQuery->where('date_prise_en_service', '>=', $request->date_debut_service);
        }
        if ($request->filled('date_fin_service')) {
            $fonctionnairesQuery->where('date_prise_en_service', '<=', $request->date_fin_service);
        }

        // Apply formations-specific date filters for service dates
        if ($request->filled('formations_date_debut_service')) {
            $fonctionnairesQuery->where('date_prise_en_service', '>=', $request->formations_date_debut_service);
        }
        if ($request->filled('formations_date_fin_service')) {
            $fonctionnairesQuery->where('date_prise_en_service', '<=', $request->formations_date_fin_service);
        }

        // Apply position filters: prioritize explicit filters from the request.
        // Treat 'all' (string) or empty string as 'Tous' => do NOT apply position filter.
        $posParamPresent = $request->get('position_id') !== null;
        $formationsPosParamPresent = $request->get('formations_position_id') !== null;

        $posValue = $request->get('position_id');
        $formationsPosValue = $request->get('formations_position_id');

        if ($posParamPresent && ($posValue === '' || $posValue === 'all')) {
            // 'Tous' in Cadre tab -> no position filter
        } elseif ($formationsPosParamPresent && ($formationsPosValue === '' || $formationsPosValue === 'all')) {
            // 'Tous' in Formations tab -> no position filter
        } elseif ($request->filled('position_id') && $posValue !== 'all') {
            // Specific position selected in Cadre tab
            $fonctionnairesQuery->where('position_id', $request->position_id);
        } elseif ($request->filled('formations_position_id') && $formationsPosValue !== 'all') {
            // Specific position(s) selected in Formations tab
            $positionsFilter = $request->formations_position_id;
            $positionIds = is_array($positionsFilter) ? $positionsFilter : [$positionsFilter];
            $matchingIds = $this->getFonctionnaireIdsWithLatestPosition($positionIds);

            if (!empty($matchingIds)) {
                $fonctionnairesQuery->whereIn('id', $matchingIds);
            } else {
                // No matching fonctionnaires for requested positions
                $fonctionnairesQuery->whereRaw('1 = 0');
            }
        } else {
            // No position-related parameters provided -> default: only active fonctionnaires
            $fonctionnairesQuery->where('position_id', 2);
        }

        // Apply category filter (standard)
        if ($request->filled('categorie_cadre_id')) {
            $fonctionnairesQuery->whereHas('specialiteGrade.grade.cadre.categorie_cadre', function($query) use ($request) {
                $query->where('id', $request->categorie_cadre_id);
            });
        }

        // Apply formations-specific category filter
        if ($request->filled('formations_categorie_cadre_id')) {
            $fonctionnairesQuery->whereHas('specialiteGrade.grade.cadre.categorie_cadre', function($query) use ($request) {
                $query->where('id', $request->formations_categorie_cadre_id);
            });
        }

        // Apply formation sanitaire filter (standard)
        if ($request->filled('formation_sanitaire_id')) {
            $fonctionnairesQuery->where('nom_formation_sanitaire_id', $request->formation_sanitaire_id);
        }

        // Apply formations-specific formation sanitaire filter
        if ($request->filled('formations_formation_sanitaire_id')) {
            $fonctionnairesQuery->where('nom_formation_sanitaire_id', $request->formations_formation_sanitaire_id);
        }

        // Debug: log the incoming formations_position_id and the built query bindings and flags
        try {
            Log::info('detailedStatistics - request position_id present: ' . ($request->get('position_id') !== null ? 'yes' : 'no'));
            Log::info('detailedStatistics - request position_id value: ' . json_encode($request->get('position_id')));
            Log::info('detailedStatistics - request formations_position_id present: ' . ($request->get('formations_position_id') !== null ? 'yes' : 'no'));
            Log::info('detailedStatistics - request formations_position_id value: ' . json_encode($request->get('formations_position_id')));
            Log::info('detailedStatistics - built fonctionnairesQuery SQL: ' . $fonctionnairesQuery->toSql());
            Log::info('detailedStatistics - fonctionnairesQuery bindings: ' . json_encode($fonctionnairesQuery->getBindings()));
            // Count the resulting rows from the built query (before get)
            try {
                $builtCount = $fonctionnairesQuery->count();
                Log::info('detailedStatistics - fonctionnairesQuery count (before get): ' . $builtCount);
            } catch (\Exception $e) {
                Log::warning('detailedStatistics - unable to run count() on fonctionnairesQuery: ' . $e->getMessage());
            }
        } catch (\Exception $e) {
            Log::warning('detailedStatistics - unable to log query details: ' . $e->getMessage());
        }

        $fonctionnaires = $fonctionnairesQuery->get();

        // All affectations
        $affectations = Affectation::with([
            'fonctionnaire',
            'formation_arrondissement_commune',
            'categorie_formation',
            'service',
            'fonction'
        ])->get();

        // Calculate statistics
        $stats = $this->calculateStats(
            $regions,
            $villes,
            $arrondissementCommunes,
            $nomFormationSanitaires,
            $niveauCategorieFormations,
            $typeCategorieFormations,
            $categorieFormations,
            $categorieCadres,
            $cadres,
            $gradeCadres,
            $specialiteGrades,
            $fonctionnaires,
            $affectations
        );

        return view('statistics.detailed', compact(
            'regions',
            'villes',
            'arrondissementCommunes',
            'nomFormationSanitaires',
            'niveauCategorieFormations',
            'typeCategorieFormations',
            'categorieFormations',
            'categorieCadres',
            'cadres',
            'gradeCadres',
            'specialiteGrades',
            'fonctionnaires',
            'affectations',
            'positions',
            'stats'
        ));
    }

    private function calculateStats($regions, $villes, $arrondissementCommunes, $nomFormationSanitaires,
                                    $niveauCategorieFormations, $typeCategorieFormations, $categorieFormations,
                                    $categorieCadres, $cadres, $gradeCadres, $specialiteGrades,
                                    $fonctionnaires, $affectations)
    {
        $stats = [];

        // Geographic stats
        $stats['regions'] = [];
        foreach ($regions as $region) {
            $regionVilles = $villes->where('region_id', $region->id);
            $regionArrondissements = collect();

            foreach ($regionVilles as $ville) {
                $villeArrondissements = $arrondissementCommunes->where('ville_id', $ville->id);
                $regionArrondissements = $regionArrondissements->concat($villeArrondissements);
            }

            $regionFormations = $nomFormationSanitaires->whereIn('arrondissement_commune_id', $regionArrondissements->pluck('id'));
            $regionFonctionnaires = $fonctionnaires->whereIn('nom_formation_sanitaire_id', $regionFormations->pluck('id'));

            $stats['regions'][$region->id] = [
                'name' => $region->nom,
                'villes_count' => $regionVilles->count(),
                'arrondissements_count' => $regionArrondissements->count(),
                'formations_count' => $regionFormations->count(),
                'fonctionnaires_count' => $regionFonctionnaires->count(),
                'villes' => []
            ];

            // Cities within region
            foreach ($regionVilles as $ville) {
                $villeArrondissements = $arrondissementCommunes->where('ville_id', $ville->id);
                $villeFormations = $nomFormationSanitaires->whereIn('arrondissement_commune_id', $villeArrondissements->pluck('id'));
                $villeFonctionnaires = $fonctionnaires->whereIn('nom_formation_sanitaire_id', $villeFormations->pluck('id'));

                $stats['regions'][$region->id]['villes'][$ville->id] = [
                    'name' => $ville->nom,
                    'arrondissements_count' => $villeArrondissements->count(),
                    'formations_count' => $villeFormations->count(),
                    'fonctionnaires_count' => $villeFonctionnaires->count(),
                    'arrondissements' => []
                ];

                // Arrondissements within city
                foreach ($villeArrondissements as $arrondissement) {
                    $arrondissementFormations = $nomFormationSanitaires->where('arrondissement_commune_id', $arrondissement->id);
                    $arrondissementFonctionnaires = $fonctionnaires->whereIn('nom_formation_sanitaire_id', $arrondissementFormations->pluck('id'));

                    $stats['regions'][$region->id]['villes'][$ville->id]['arrondissements'][$arrondissement->id] = [
                        'name' => $arrondissement->nom,
                        'formations_count' => $arrondissementFormations->count(),
                        'fonctionnaires_count' => $arrondissementFonctionnaires->count()
                    ];
                }
            }
        }

        // Healthcare formations stats
        $stats['formations'] = [];
        foreach ($nomFormationSanitaires as $formation) {
            $formationFonctionnaires = $fonctionnaires->where('nom_formation_sanitaire_id', $formation->id);

            // Get unique cadres for this formation
            $formationCadres = $formationFonctionnaires->map(function($fonctionnaire) {
                return $fonctionnaire->specialiteGrade &&
                       $fonctionnaire->specialiteGrade->grade &&
                       $fonctionnaire->specialiteGrade->grade->cadre ?
                       $fonctionnaire->specialiteGrade->grade->cadre->nom : null;
            })->filter()->unique()->values()->toArray();

            // Get specialite grades with counts for this formation
            $formationSpecialiteGrades = [];
            $specialiteGradeCounts = $formationFonctionnaires->groupBy('specialite_grade_id');
            foreach ($specialiteGradeCounts as $specialiteGradeId => $fonctionnairesGroup) {
                $specialiteGrade = $specialiteGrades->find($specialiteGradeId);
                if ($specialiteGrade) {
                    $formationSpecialiteGrades[] = [
                        'name' => $specialiteGrade->nom,
                        'count' => $fonctionnairesGroup->count()
                    ];
                }
            }

            $stats['formations'][$formation->id] = [
                'name' => $formation->nom,
                'fonctionnaires_count' => $formationFonctionnaires->count(),
                'arrondissement' => optional($formation->arrondissement_commune)->nom ?? 'N/A',
                'ville' => optional(optional($formation->arrondissement_commune)->ville)->nom ?? 'N/A',
                'region' => optional(optional(optional($formation->arrondissement_commune)->ville)->region)->nom ?? 'N/A',
                'cadres' => $formationCadres,
                'specialite_grades' => $formationSpecialiteGrades
            ];
        }

        // Niveau catégorie formation stats
        $stats['niveaux'] = [];
        foreach ($niveauCategorieFormations as $niveau) {
            // Get the type that this niveau belongs to
            $niveauType = $typeCategorieFormations->where('id', $niveau->type_categorie_formation_id)->first();

            // Get the category that this type belongs to
            $niveauCategory = null;
            if ($niveauType) {
                $niveauCategory = $categorieFormations->where('id', $niveauType->categorie_formation_id)->first();
            }

            // Get formations that belong directly to this niveau
            $niveauFormations = $nomFormationSanitaires->where('niveau_categorie_formation_id', $niveau->id);
            $niveauFonctionnaires = $fonctionnaires->whereIn('nom_formation_sanitaire_id', $niveauFormations->pluck('id'));

            $stats['niveaux'][$niveau->id] = [
                'name' => $niveau->nom,
                'types_count' => $niveauType ? 1 : 0,
                'categories_count' => $niveauCategory ? 1 : 0,
                'formations_count' => $niveauFormations->count(),
                'fonctionnaires_count' => $niveauFonctionnaires->count(),
                'types' => []
            ];

            // Add type details if exists
            if ($niveauType) {
                // Get all formations for this type (through all niveaux that belong to this type)
                $typeNiveaux = $niveauCategorieFormations->where('type_categorie_formation_id', $niveauType->id);
                $typeFormations = $nomFormationSanitaires->whereIn('niveau_categorie_formation_id', $typeNiveaux->pluck('id'));
                $typeFonctionnaires = $fonctionnaires->whereIn('nom_formation_sanitaire_id', $typeFormations->pluck('id'));

                $stats['niveaux'][$niveau->id]['types'][$niveauType->id] = [
                    'name' => $niveauType->nom,
                    'categories_count' => $niveauCategory ? 1 : 0,
                    'formations_count' => $typeFormations->count(),
                    'fonctionnaires_count' => $typeFonctionnaires->count(),
                    'categories' => []
                ];

                // Add category details if exists
                if ($niveauCategory) {
                    // Get all formations for this category (through all types that belong to this category)
                    $categoryTypes = $typeCategorieFormations->where('categorie_formation_id', $niveauCategory->id);
                    $categoryNiveaux = $niveauCategorieFormations->whereIn('type_categorie_formation_id', $categoryTypes->pluck('id'));
                    $categoryFormations = $nomFormationSanitaires->whereIn('niveau_categorie_formation_id', $categoryNiveaux->pluck('id'));
                    $categoryFonctionnaires = $fonctionnaires->whereIn('nom_formation_sanitaire_id', $categoryFormations->pluck('id'));

                    $stats['niveaux'][$niveau->id]['types'][$niveauType->id]['categories'][$niveauCategory->id] = [
                        'name' => $niveauCategory->nom,
                        'formations_count' => $categoryFormations->count(),
                        'fonctionnaires_count' => $categoryFonctionnaires->count()
                    ];
                }
            }
        }

        // Cadre Relationships stats
        $stats['categorie_cadres'] = [];
        foreach ($categorieCadres as $categorieCadre) {
            $categorieCadreCadres = $cadres->where('categorie_cadre_id', $categorieCadre->id);
            $categorieCadreGradeCadres = $gradeCadres->whereIn('cadre_id', $categorieCadreCadres->pluck('id'));
            $categorieCadreSpecialiteGrades = $specialiteGrades->whereIn('grade_id', $categorieCadreGradeCadres->pluck('id'));
            $categorieCadreFonctionnaires = $fonctionnaires->whereIn('specialite_grade_id', $categorieCadreSpecialiteGrades->pluck('id'));

            // Get formations for this category
            $categorieFormations = $nomFormationSanitaires->whereIn('id', $categorieCadreFonctionnaires->pluck('nom_formation_sanitaire_id')->filter())->unique('id');

            $stats['categorie_cadres'][$categorieCadre->id] = [
                'name' => $categorieCadre->nom,
                'cadres_count' => $categorieCadreCadres->count(),
                'grade_cadres_count' => $categorieCadreGradeCadres->count(),
                'specialite_grades_count' => $categorieCadreSpecialiteGrades->count(),
                'fonctionnaires_count' => $categorieCadreFonctionnaires->count(),
                'formations_count' => $categorieFormations->count(),
                'formation_names' => $categorieFormations->pluck('nom')->unique()->values()->toArray(),
                'cadres' => []
            ];

            // Cadres within categorie
            foreach ($categorieCadreCadres as $cadre) {
                $cadreGradeCadres = $gradeCadres->where('cadre_id', $cadre->id);
                $cadreSpecialiteGrades = $specialiteGrades->whereIn('grade_id', $cadreGradeCadres->pluck('id'));
                $cadreFonctionnaires = $fonctionnaires->whereIn('specialite_grade_id', $cadreSpecialiteGrades->pluck('id'));

                // Get formations for this cadre
                $cadreFormations = $nomFormationSanitaires->whereIn('id', $cadreFonctionnaires->pluck('nom_formation_sanitaire_id')->filter())->unique('id');

                $stats['categorie_cadres'][$categorieCadre->id]['cadres'][$cadre->id] = [
                    'name' => $cadre->nom,
                    'grade_cadres_count' => $cadreGradeCadres->count(),
                    'specialite_grades_count' => $cadreSpecialiteGrades->count(),
                    'fonctionnaires_count' => $cadreFonctionnaires->count(),
                    'formations_count' => $cadreFormations->count(),
                    'formation_names' => $cadreFormations->pluck('nom')->unique()->values()->toArray(),
                    'grade_cadres' => []
                ];

                // Grade Cadres within cadre
                foreach ($cadreGradeCadres as $gradeCadre) {
                    $gradeCadreSpecialiteGrades = $specialiteGrades->where('grade_id', $gradeCadre->id);
                    $gradeCadreFonctionnaires = $fonctionnaires->whereIn('specialite_grade_id', $gradeCadreSpecialiteGrades->pluck('id'));

                    // Get formations for this grade
                    $gradeFormations = $nomFormationSanitaires->whereIn('id', $gradeCadreFonctionnaires->pluck('nom_formation_sanitaire_id')->filter())->unique('id');

                    $stats['categorie_cadres'][$categorieCadre->id]['cadres'][$cadre->id]['grade_cadres'][$gradeCadre->id] = [
                        'name' => $gradeCadre->nom,
                        'specialite_grades_count' => $gradeCadreSpecialiteGrades->count(),
                        'fonctionnaires_count' => $gradeCadreFonctionnaires->count(),
                        'formations_count' => $gradeFormations->count(),
                        'formation_names' => $gradeFormations->pluck('nom')->unique()->values()->toArray(),
                        'specialite_grades' => []
                    ];

                    // Specialite Grades within grade cadre
                    foreach ($gradeCadreSpecialiteGrades as $specialiteGrade) {
                        $specialiteGradeFonctionnaires = $fonctionnaires->where('specialite_grade_id', $specialiteGrade->id);

                        // Get healthcare formations for this specialite
                        $specialiteFormations = $nomFormationSanitaires->whereIn('id', $specialiteGradeFonctionnaires->pluck('nom_formation_sanitaire_id')->filter());

                        $stats['categorie_cadres'][$categorieCadre->id]['cadres'][$cadre->id]['grade_cadres'][$gradeCadre->id]['specialite_grades'][$specialiteGrade->id] = [
                            'name' => $specialiteGrade->nom,
                            'fonctionnaires_count' => $specialiteGradeFonctionnaires->count(),
                            'formations' => $specialiteFormations->map(function($formation) {
                                return [
                                    'id' => $formation->id,
                                    'nom' => $formation->nom,
                                    'arrondissement' => $formation->arrondissement_commune ? $formation->arrondissement_commune->nom : 'N/A',
                                    'ville' => $formation->arrondissement_commune && $formation->arrondissement_commune->ville ? $formation->arrondissement_commune->ville->nom : 'N/A',
                                    'region' => $formation->arrondissement_commune && $formation->arrondissement_commune->ville && $formation->arrondissement_commune->ville->region ? $formation->arrondissement_commune->ville->region->nom : 'N/A'
                                ];
                            })->values()->toArray()
                        ];
                    }
                }
            }
        }

        // Detailed affectations
        $stats['affectations'] = [];
        foreach ($nomFormationSanitaires as $formation) {
            $formationAffectations = $affectations->filter(function ($affectation) use ($formation) {
                return $affectation->formation_arrondissement_commune &&
                       $affectation->formation_arrondissement_commune->nom_formation_sanitaire_id == $formation->id;
            });

            if ($formationAffectations->count() > 0) {
                $stats['affectations'][$formation->id] = [
                    'formation_name' => $formation->nom,
                    'count' => $formationAffectations->count(),
                    'details' => []
                ];

                foreach ($formationAffectations as $affectation) {
                    $stats['affectations'][$formation->id]['details'][] = [
                        'fonctionnaire' => $affectation->fonctionnaire ? $affectation->fonctionnaire->nom . ' ' . $affectation->fonctionnaire->prenom : 'N/A',
                        'date_affectation' => $affectation->date_affectation,
                        'service' => $affectation->service ? $affectation->service->nom : 'N/A',
                        'fonction' => $affectation->fonction ? $affectation->fonction->nom : 'N/A',
                        'categorie_formation' => $affectation->categorie_formation ? $affectation->categorie_formation->nom : 'N/A'
                    ];
                }
            }
        }

        return $stats;
    }



    /**
     * Display HR statistics page
     */
    public function hrStatistics(Request $request)
    {
        // Clear previous logs
        Log::info('========== Starting HR Statistics Calculation ==========');

        // Get date range from request or set defaults
        $dateDebut = $request->get('date_debut', now()->subYear()->format('Y-m-d'));
        $dateFin = $request->get('date_fin', now()->format('Y-m-d'));

        Log::info("Date range: {$dateDebut} to {$dateFin}");

        // Get all active fonctionnaires (position_id = 2 represents active status)
        $activeFonctionnaires = Fonctionnaire::where('position_id', 2)->get();
        Log::info('Active fonctionnaires count: ' . $activeFonctionnaires->count());

        // Get all fonctionnaires (including inactive)
        $allFonctionnaires = Fonctionnaire::all();
        Log::info('All fonctionnaires count: ' . $allFonctionnaires->count());

        // Get position historiques for absences, leaves, etc. with date filtering
        $positionHistoriques = PositionHistorique::with(['fonctionnaire', 'ancienPosition', 'nouveauxPosition'])
            ->whereBetween('created_at', [$dateDebut, $dateFin])
            ->get();
        Log::info('Position historiques count (filtered): ' . $positionHistoriques->count());

        // Log position historique types
        $types = $positionHistoriques->pluck('type')->unique()->toArray();
        Log::info('Position historique types: ' . implode(', ', array_filter($types)));

        // Get cadre categories
        $categorieCadres = CategorieCadre::with('cadres')->get();
        Log::info('Cadre categories count: ' . $categorieCadres->count());

        // Get cadres
        $cadres = Cadre::all();
        Log::info('Cadres count: ' . $cadres->count());

        // Log cadre categories
        foreach ($categorieCadres as $categorie) {
            Log::info("Cadre category: {$categorie->id} - {$categorie->nom}, Cadres count: " . $categorie->cadres->count());

            // Log cadres in this category
            foreach ($categorie->cadres as $cadre) {
                Log::info("  Cadre: {$cadre->id} - {$cadre->nom}");

                // Log grades for this cadre
                $grades = GradeCadre::where('cadre_id', $cadre->id)->get();
                Log::info("    Grades count: " . $grades->count());

                foreach ($grades as $grade) {
                    Log::info("    Grade: {$grade->id} - {$grade->nom}");

                    // Log specialites for this grade
                    $specialites = SpecialiteGrade::where('grade_id', $grade->id)->get();
                    Log::info("      Specialites count: " . $specialites->count());

                    foreach ($specialites as $specialite) {
                        Log::info("      Specialite: {$specialite->id} - {$specialite->nom}");

                        // Log fonctionnaires with this specialite
                        $fonctionnairesCount = Fonctionnaire::where('specialite_grade_id', $specialite->id)->count();
                        Log::info("        Fonctionnaires count: " . $fonctionnairesCount);
                    }
                }
            }
        }

        // Calculate statistics
        $hrStats = $this->calculateHrStats(
            $activeFonctionnaires,
            $allFonctionnaires,
            $positionHistoriques,
            $categorieCadres,
            $cadres,
            $dateDebut,
            $dateFin
        );

        Log::info('========== HR Statistics Calculation Complete ==========');

        return view('statistics.hr', compact(
            'activeFonctionnaires',
            'allFonctionnaires',
            'positionHistoriques',
            'categorieCadres',
            'cadres',
            'hrStats',
            'dateDebut',
            'dateFin'
        ));
    }

    /**
     * Test HR statistics calculation
     */
    public function testHrStatistics()
    {
        // Clear previous logs
        Log::info('========== Starting HR Statistics Test ==========');

        // Get all active fonctionnaires (position_id = 2 represents active status)
        $activeFonctionnaires = Fonctionnaire::where('position_id', 2)->get();
        Log::info('Active fonctionnaires count: ' . $activeFonctionnaires->count());

        // Get all fonctionnaires (including inactive)
        $allFonctionnaires = Fonctionnaire::all();
        Log::info('All fonctionnaires count: ' . $allFonctionnaires->count());

        // Get position historiques for absences, leaves, etc.
        $positionHistoriques = PositionHistorique::with(['fonctionnaire', 'ancienPosition', 'nouveauxPosition'])->get();
        Log::info('Position historiques count: ' . $positionHistoriques->count());

        // Log position historique types
        $types = $positionHistoriques->pluck('type')->unique()->toArray();
        Log::info('Position historique types: ' . implode(', ', array_filter($types)));

        // Get cadre categories
        $categorieCadres = CategorieCadre::with('cadres')->get();
        Log::info('Cadre categories count: ' . $categorieCadres->count());

        // Log cadre categories
        foreach ($categorieCadres as $categorie) {
            Log::info("Cadre category: {$categorie->id} - {$categorie->nom}");
        }

        // Get cadres
        $cadres = Cadre::all();
        Log::info('Cadres count: ' . $cadres->count());

        // Log cadres
        foreach ($cadres as $cadre) {
            Log::info("Cadre: {$cadre->id} - {$cadre->nom} - Category: {$cadre->categorie_cadre_id}");
        }

        // Get grade cadres
        $gradeCadres = GradeCadre::all();
        Log::info('Grade cadres count: ' . $gradeCadres->count());

        // Log grade cadres
        foreach ($gradeCadres as $gradeCadre) {
            Log::info("Grade cadre: {$gradeCadre->id} - {$gradeCadre->nom} - Cadre: {$gradeCadre->cadre_id}");
        }

        // Get specialite grades
        $specialiteGrades = SpecialiteGrade::all();
        Log::info('Specialite grades count: ' . $specialiteGrades->count());

        // Log specialite grades
        foreach ($specialiteGrades as $specialiteGrade) {
            Log::info("Specialite grade: {$specialiteGrade->id} - {$specialiteGrade->nom} - Grade: {$specialiteGrade->grade_id}");
        }

        // Test getStaffIdsByCadreIds method
        $medicalCadreIds = $cadres->whereIn('categorie_cadre_id', [8, 6, 5])->pluck('id')->toArray(); // Medical, Pharmacists, Assistants
        $nursingCadreIds = $cadres->where('categorie_cadre_id', 4)->pluck('id')->toArray(); // Nursing/Health Tech
        $adminCadreIds = $cadres->where('categorie_cadre_id', 1)->pluck('id')->toArray(); // Administrative

        Log::info('Medical cadre IDs: ' . implode(', ', $medicalCadreIds));
        Log::info('Nursing cadre IDs: ' . implode(', ', $nursingCadreIds));
        Log::info('Admin cadre IDs: ' . implode(', ', $adminCadreIds));

        $medicalStaffIds = $this->getStaffIdsByCadreIds($activeFonctionnaires, $medicalCadreIds);
        $nursingStaffIds = $this->getStaffIdsByCadreIds($activeFonctionnaires, $nursingCadreIds);
        $adminStaffIds = $this->getStaffIdsByCadreIds($activeFonctionnaires, $adminCadreIds);

        Log::info('Medical staff IDs: ' . implode(', ', $medicalStaffIds));
        Log::info('Nursing staff IDs: ' . implode(', ', $nursingStaffIds));
        Log::info('Admin staff IDs: ' . implode(', ', $adminStaffIds));

    // Test calculateTotalAbsenceDays method (use last year as default range)
    $dateFinTest = now()->format('Y-m-d');
    $dateDebutTest = now()->subYear()->format('Y-m-d');
    $totalAbsenceDays = $this->calculateTotalAbsenceDays($positionHistoriques, $dateDebutTest, $dateFinTest);
        Log::info('Total absence days: ' . $totalAbsenceDays);

        // Test calculateLeaveRate method
        $leaveRate = $this->calculateLeaveRate($positionHistoriques, $allFonctionnaires);
        Log::info('Leave rate: ' . json_encode($leaveRate));

        Log::info('========== HR Statistics Test Complete ==========');

        return response()->json([
            'success' => true,
            'message' => 'HR statistics test completed. Check the logs for details.',
            'data' => [
                'active_fonctionnaires_count' => $activeFonctionnaires->count(),
                'all_fonctionnaires_count' => $allFonctionnaires->count(),
                'position_historiques_count' => $positionHistoriques->count(),
                'cadre_categories_count' => $categorieCadres->count(),
                'cadres_count' => $cadres->count(),
                'grade_cadres_count' => $gradeCadres->count(),
                'specialite_grades_count' => $specialiteGrades->count(),
                'medical_staff_count' => count($medicalStaffIds),
                'nursing_staff_count' => count($nursingStaffIds),
                'admin_staff_count' => count($adminStaffIds),
                'total_absence_days' => $totalAbsenceDays,
                'leave_rate' => $leaveRate,
            ]
        ]);
    }

    /**
     * Calculate HR statistics
     */
    private function calculateHrStats($activeFonctionnaires, $allFonctionnaires, $positionHistoriques, $categorieCadres, $cadres, $dateDebut, $dateFin)
    {
        $stats = [];
        // Log cadre categories
        Log::info('Cadre categories: ' . $categorieCadres->pluck('nom')->implode(', '));

        // Get cadre categories based on the actual category IDs in the database
        // Based on the logs, category 8 is Medical, category 4 is Nursing/Health Tech, and category 1 is Administrative
        $medicalCadreIds = $cadres->whereIn('categorie_cadre_id', [8, 6, 5])->pluck('id')->toArray(); // Medical, Pharmacists, Assistants
        $nursingCadreIds = $cadres->where('categorie_cadre_id', 4)->pluck('id')->toArray(); // Nursing/Health Tech
        $adminCadreIds = $cadres->where('categorie_cadre_id', 1)->pluck('id')->toArray(); // Administrative

        // Get staff IDs by category
        $medicalStaffIds = $this->getStaffIdsByCadreIds($activeFonctionnaires, $medicalCadreIds);
        $nursingStaffIds = $this->getStaffIdsByCadreIds($activeFonctionnaires, $nursingCadreIds);
        $adminStaffIds = $this->getStaffIdsByCadreIds($activeFonctionnaires, $adminCadreIds);

        // 1. Taux absence totale
        $totalAbsenceDays = $this->calculateTotalAbsenceDays($positionHistoriques, $dateDebut, $dateFin);

        $stats['taux_absence_totale'] = [
            'total_days' => $totalAbsenceDays,
            'percentage' => $allFonctionnaires->count() > 0 ? ($totalAbsenceDays / (365 * $allFonctionnaires->count())) * 100 : 0,
        ];

        // Calculate by cadre category
        $stats['taux_absence_par_cadre'] = [
            'medical' => $this->calculateAbsenceRateForStaff($positionHistoriques, $medicalStaffIds, $dateDebut, $dateFin),
            'nursing' => $this->calculateAbsenceRateForStaff($positionHistoriques, $nursingStaffIds, $dateDebut, $dateFin),
            'admin' => $this->calculateAbsenceRateForStaff($positionHistoriques, $adminStaffIds, $dateDebut, $dateFin),
        ];

        // 2. Ratio rotation du personnel
        $stats['rotation_personnel'] = $this->calculateStaffRotationRate($positionHistoriques, $allFonctionnaires);

        // Add incoming movements breakdown
        $stats['rotation_personnel']['incoming_breakdown'] = $this->calculateIncomingMovementsBreakdown($positionHistoriques);

        // Add outgoing movements breakdown
        $stats['rotation_personnel']['outgoing_breakdown'] = $this->calculateOutgoingMovementsBreakdown($positionHistoriques);

        // Calculate by cadre category
        $stats['rotation_par_cadre'] = [
            'medical' => $this->calculateStaffRotationRateForCategory($positionHistoriques, $medicalStaffIds),
            'nursing' => $this->calculateStaffRotationRateForCategory($positionHistoriques, $nursingStaffIds),
            'admin' => $this->calculateStaffRotationRateForCategory($positionHistoriques, $adminStaffIds),
        ];

        // 3-4. Taux départ à la retraite
        $stats['retraite'] = $this->calculateRetirementRates($positionHistoriques, $allFonctionnaires);

        // Add retirement trends
        $stats['retraite']['trends'] = $this->calculateRetirementTrends($allFonctionnaires);

        // Calculate by cadre category
        $stats['retraite_par_cadre'] = [
            'medical' => $this->calculateRetirementRatesForCategory($positionHistoriques, $medicalStaffIds),
            'nursing' => $this->calculateRetirementRatesForCategory($positionHistoriques, $nursingStaffIds),
            'admin' => $this->calculateRetirementRatesForCategory($positionHistoriques, $adminStaffIds),
        ];

        // 5. Taux grève
        $stats['greve'] = $this->calculateStrikeRate($positionHistoriques, $allFonctionnaires);

        // Calculate by cadre category
        $stats['greve_par_cadre'] = [
            'medical' => $this->calculateStrikeRateForCategory($positionHistoriques, $medicalStaffIds),
            'nursing' => $this->calculateStrikeRateForCategory($positionHistoriques, $nursingStaffIds),
            'admin' => $this->calculateStrikeRateForCategory($positionHistoriques, $adminStaffIds),
        ];

        // 6. Ratio abandonnement poste
        $stats['abandon_poste'] = $this->calculateAbandonmentRate($positionHistoriques, $allFonctionnaires);

        // Calculate by cadre category
        $stats['abandon_poste_par_cadre'] = [
            'medical' => $this->calculateAbandonmentRateForCategory($positionHistoriques, $medicalStaffIds),
            'nursing' => $this->calculateAbandonmentRateForCategory($positionHistoriques, $nursingStaffIds),
            'admin' => $this->calculateAbandonmentRateForCategory($positionHistoriques, $adminStaffIds),
        ];

        // 7-8. Ratio cause absence médicale
        $stats['absence_medicale'] = $this->calculateMedicalAbsenceRatios($positionHistoriques);

        // Calculate by cadre category
        $stats['absence_medicale_par_cadre'] = [
            'medical' => $this->calculateMedicalAbsenceRatiosForCategory($positionHistoriques, $medicalStaffIds),
            'nursing' => $this->calculateMedicalAbsenceRatiosForCategory($positionHistoriques, $nursingStaffIds),
            'admin' => $this->calculateMedicalAbsenceRatiosForCategory($positionHistoriques, $adminStaffIds),
        ];

        // 9. Nombre jours perdus de travail
        $stats['jours_perdus'] = $this->calculateLostWorkDays($positionHistoriques);

        // Calculate by cadre category
        $stats['jours_perdus_par_cadre'] = [
            'medical' => $this->calculateLostWorkDaysForCategory($positionHistoriques, $medicalStaffIds),
            'nursing' => $this->calculateLostWorkDaysForCategory($positionHistoriques, $nursingStaffIds),
            'admin' => $this->calculateLostWorkDaysForCategory($positionHistoriques, $adminStaffIds),
        ];

        // 10. Taux congé
        $stats['conge'] = $this->calculateLeaveRate($positionHistoriques, $allFonctionnaires, $dateDebut, $dateFin);

        // Add leave type distribution and trends
        $stats['conge']['type_distribution'] = $this->calculateLeaveTypeDistribution($dateDebut, $dateFin);
        $stats['conge']['average_duration'] = $this->calculateLeaveAverageDuration($dateDebut, $dateFin);
        $stats['conge']['monthly_trends'] = $this->calculateLeaveMonthlyTrends($dateDebut, $dateFin);

        // Calculate by cadre category
        $stats['conge_par_cadre'] = [
            'medical' => $this->calculateLeaveRateForCategory($positionHistoriques, $medicalStaffIds, $dateDebut, $dateFin),
            'nursing' => $this->calculateLeaveRateForCategory($positionHistoriques, $nursingStaffIds, $dateDebut, $dateFin),
            'admin' => $this->calculateLeaveRateForCategory($positionHistoriques, $adminStaffIds, $dateDebut, $dateFin),
        ];

        // 11. Taux de mobilité
        $stats['mobilite'] = $this->calculateMobilityRate($positionHistoriques, $allFonctionnaires);

        // Add cadre distribution by center
        $stats['mobilite']['cadre_distribution'] = $this->calculateCadreDistributionByCenter($activeFonctionnaires, $cadres);

        // Calculate by cadre category
        $stats['mobilite_par_cadre'] = [
            'medical' => $this->calculateMobilityRateForCategory($positionHistoriques, $medicalStaffIds),
            'nursing' => $this->calculateMobilityRateForCategory($positionHistoriques, $nursingStaffIds),
            'admin' => $this->calculateMobilityRateForCategory($positionHistoriques, $adminStaffIds),
        ];

        return $stats;
    }

    /**
     * Get staff IDs by cadre IDs
     */
    private function getStaffIdsByCadreIds($fonctionnaires, $cadreIds)
    {
        // Get all grade_cadre_ids that belong to the specified cadres
        $gradeCadreIds = GradeCadre::whereIn('cadre_id', $cadreIds)->pluck('id')->toArray();
        Log::info('Grade cadre IDs for cadre IDs ' . implode(', ', $cadreIds) . ': ' . implode(', ', $gradeCadreIds));

        // Get all specialite_grade_ids that belong to the specified grade_cadres
        $specialiteGradeIds = SpecialiteGrade::whereIn('grade_id', $gradeCadreIds)->pluck('id')->toArray();
        Log::info('Specialite grade IDs: ' . implode(', ', $specialiteGradeIds));

        // Filter fonctionnaires by specialite_grade_id
        $staffIds = $fonctionnaires->whereIn('specialite_grade_id', $specialiteGradeIds)->pluck('id')->toArray();
        Log::info('Staff IDs: ' . implode(', ', $staffIds));

        return $staffIds;
    }

    /**
     * Get fonctionnaire IDs whose latest position (from position_historiques) or original position matches given position IDs.
     */
    private function getFonctionnaireIdsWithLatestPosition(array $positionIds)
    {
        Log::info('getFonctionnaireIdsWithLatestPosition called with positions: ' . implode(', ', $positionIds));
        // First, try to find fonctionnaires whose latest position history matches
        $withHistory = DB::table('fonctionnaires as f')
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

        // Then, find fonctionnaires with no history but whose original column matches
        $withoutHistory = DB::table('fonctionnaires as f')
            ->leftJoin('position_historiques as ph', function($join) {
                $join->on('f.id', '=', 'ph.fonctionnaire_id')
                     ->whereNotNull('ph.nouveaux_position_id')
                     ->whereNotNull('ph.date_prise_en_service');
            })
            ->whereNull('ph.id')
            ->whereIn('f.position_id', $positionIds)
            ->pluck('f.id')
            ->toArray();

        $result = array_unique(array_merge($withHistory, $withoutHistory));
        Log::info('getFonctionnaireIdsWithLatestPosition result count: ' . count($result) . '; ids: ' . implode(', ', $result));
        return $result;
    }

    /**
     * Calculate total absence days
     */
    private function calculateTotalAbsenceDays($positionHistoriques, $dateDebut, $dateFin)
    {
        // Use Certificate model for real data with date filtering
        $totalDays = Certificate::whereBetween('date_debut', [$dateDebut, $dateFin])->sum('jours');
        Log::info('Total absence days (certificates): ' . $totalDays);
        return $totalDays;
    }

    /**
     * Calculate absence rate for a specific staff category
     */
    private function calculateAbsenceRateForStaff($positionHistoriques, $staffIds, $dateDebut, $dateFin)
    {
        $absenceDays = Certificate::whereIn('fonctionnaire_id', $staffIds)
            ->whereBetween('date_debut', [$dateDebut, $dateFin])
            ->sum('jours');
        return [
            'total_days' => $absenceDays,
            'percentage' => count($staffIds) > 0 ? ($absenceDays / (365 * count($staffIds))) * 100 : 0,
        ];
    }

    /**
     * Calculate staff rotation rate
     */
    private function calculateStaffRotationRate($positionHistoriques, $allFonctionnaires)
    {
        // Log the types of position historiques
        $types = $positionHistoriques->pluck('type')->unique()->toArray();
        Log::info('Position historique types: ' . implode(', ', array_filter($types)));

        // Count outgoing staff - any movement from active (position_id = 2) to any other position
        $outgoingHistoriques = $positionHistoriques
            ->where('ancien_position_id', 2) // From active
            ->where('nouveaux_position_id', '!=', 2); // To any non-active position

        $outgoingCount = $outgoingHistoriques->count();
        Log::info('Outgoing staff count: ' . $outgoingCount);

        // Log outgoing historiques details
        foreach ($outgoingHistoriques as $historique) {
            Log::info("Outgoing - ID: {$historique->id}, Type: {$historique->type}, From Position: {$historique->ancien_position_id}, To Position: {$historique->nouveaux_position_id}, Fonctionnaire ID: {$historique->fonctionnaire_id}");
        }

        // Count incoming staff - any movement from non-active to active (position_id = 2)
        $incomingHistoriques = $positionHistoriques
            ->where('ancien_position_id', '!=', 2) // From any non-active position
            ->where('nouveaux_position_id', 2); // To active

        $incomingCount = $incomingHistoriques->count();
        Log::info('Incoming staff count: ' . $incomingCount);

        // Log incoming historiques details
        foreach ($incomingHistoriques as $historique) {
            Log::info("Incoming - ID: {$historique->id}, Type: {$historique->type}, From Position: {$historique->ancien_position_id}, To Position: {$historique->nouveaux_position_id}, Fonctionnaire ID: {$historique->fonctionnaire_id}");
        }

        // Calculate average staff count
        $effectifMoyen = $allFonctionnaires->count();
        Log::info('Average staff count: ' . $effectifMoyen);

        // Use only real data - no fallback generation

        // Calculate rotation rate
        $rotationRate = $effectifMoyen > 0 ? (($outgoingCount + $incomingCount) / 2) / $effectifMoyen * 100 : 0;
        Log::info('Rotation rate: ' . $rotationRate);

        return [
            'outgoing_count' => $outgoingCount,
            'incoming_count' => $incomingCount,
            'average_staff' => $effectifMoyen,
            'rotation_rate' => $rotationRate,
        ];
    }

    /**
     * Calculate staff rotation rate for a specific category
     */
    private function calculateStaffRotationRateForCategory($positionHistoriques, $staffIds)
    {
        // Count outgoing staff - any movement from active (position_id = 2) to any other position
        $outgoingCount = $positionHistoriques
            ->whereIn('fonctionnaire_id', $staffIds)
            ->where('ancien_position_id', 2) // From active
            ->where('nouveaux_position_id', '!=', 2) // To any non-active position
            ->count();

        // Count incoming staff - any movement from non-active to active (position_id = 2)
        $incomingCount = $positionHistoriques
            ->whereIn('fonctionnaire_id', $staffIds)
            ->where('ancien_position_id', '!=', 2) // From any non-active position
            ->where('nouveaux_position_id', 2) // To active
            ->count();

        // Use only real data - no fallback generation

        // Calculate rotation rate
        $rotationRate = count($staffIds) > 0 ? (($outgoingCount + $incomingCount) / 2) / count($staffIds) * 100 : 0;

        return [
            'outgoing_count' => $outgoingCount,
            'incoming_count' => $incomingCount,
            'staff_count' => count($staffIds),
            'rotation_rate' => $rotationRate,
        ];
    }

    /**
     * Calculate retirement rates based on real birth dates and Retraite model
     */
    private function calculateRetirementRates($positionHistoriques, $allFonctionnaires)
    {
        // Count retirement by age limit from Retraite model
        $retirementByAgeCount = Retraite::where('type_retraite', 'limite_age')->count();

        // Count early retirement from Retraite model
        $earlyRetirementCount = Retraite::where('type_retraite', 'anticipee')->count();

        // Calculate fonctionnaires eligible for retirement (62.5 years or older)
        $eligibleForRetirement = $allFonctionnaires->filter(function($fonctionnaire) {
            if (!$fonctionnaire->date_naissance) return false;
            $age = Carbon::parse($fonctionnaire->date_naissance)->age;
            return $age >= 62.5;
        })->count();

        // Calculate fonctionnaires approaching retirement (60-62.4 years)
        $approachingRetirement = $allFonctionnaires->filter(function($fonctionnaire) {
            if (!$fonctionnaire->date_naissance) return false;
            $age = Carbon::parse($fonctionnaire->date_naissance)->age;
            return $age >= 60 && $age < 62.5;
        })->count();

        // Calculate rates
        $retirementByAgeRate = $allFonctionnaires->count() > 0 ? ($retirementByAgeCount / $allFonctionnaires->count()) * 100 : 0;
        $earlyRetirementRate = $allFonctionnaires->count() > 0 ? ($earlyRetirementCount / $allFonctionnaires->count()) * 100 : 0;
        $eligibilityRate = $allFonctionnaires->count() > 0 ? ($eligibleForRetirement / $allFonctionnaires->count()) * 100 : 0;

        Log::info("Retirement calculation - Age limit count: {$retirementByAgeCount}, Early count: {$earlyRetirementCount}, Eligible: {$eligibleForRetirement}, Approaching: {$approachingRetirement}");

        return [
            'retirement_by_age_count' => $retirementByAgeCount,
            'early_retirement_count' => $earlyRetirementCount,
            'retirement_by_age_rate' => $retirementByAgeRate,
            'early_retirement_rate' => $earlyRetirementRate,
            'eligible_for_retirement' => $eligibleForRetirement,
            'approaching_retirement' => $approachingRetirement,
            'eligibility_rate' => $eligibilityRate,
        ];
    }

    /**
     * Calculate retirement rates for a specific category based on real birth dates
     */
    private function calculateRetirementRatesForCategory($positionHistoriques, $staffIds)
    {
        // Count retirement by age limit from Retraite model for this category
        $retirementByAgeCount = Retraite::whereIn('fonctionnaire_id', $staffIds)
            ->where('type_retraite', 'limite_age')
            ->count();

        // Count early retirement from Retraite model for this category
        $earlyRetirementCount = Retraite::whereIn('fonctionnaire_id', $staffIds)
            ->where('type_retraite', 'anticipee')
            ->count();

        // Get fonctionnaires in this category
        $categoryFonctionnaires = Fonctionnaire::whereIn('id', $staffIds)->get();

        // Calculate fonctionnaires eligible for retirement (62.5 years or older) in this category
        $eligibleForRetirement = $categoryFonctionnaires->filter(function($fonctionnaire) {
            if (!$fonctionnaire->date_naissance) return false;
            $age = Carbon::parse($fonctionnaire->date_naissance)->age;
            return $age >= 62.5;
        })->count();

        // Calculate rates
        $retirementByAgeRate = count($staffIds) > 0 ? ($retirementByAgeCount / count($staffIds)) * 100 : 0;
        $earlyRetirementRate = count($staffIds) > 0 ? ($earlyRetirementCount / count($staffIds)) * 100 : 0;
        $eligibilityRate = count($staffIds) > 0 ? ($eligibleForRetirement / count($staffIds)) * 100 : 0;

        return [
            'retirement_by_age_count' => $retirementByAgeCount,
            'early_retirement_count' => $earlyRetirementCount,
            'retirement_by_age_rate' => $retirementByAgeRate,
            'early_retirement_rate' => $earlyRetirementRate,
            'eligible_for_retirement' => $eligibleForRetirement,
            'eligibility_rate' => $eligibilityRate,
        ];
    }

    /**
     * Calculate strike rate
     */
    private function calculateStrikeRate($positionHistoriques, $allFonctionnaires)
    {
        // Use Greve model for real data
        $strikeCount = Greve::count();
        $strikeRate = $allFonctionnaires->count() > 0 ? ($strikeCount / $allFonctionnaires->count()) * 100 : 0;
        $strikeDays = Greve::all()->sum(function($greve) {
            if (!$greve->date_debut) return 0;
            $start = Carbon::parse($greve->date_debut);
            $end = $greve->date_fin ? Carbon::parse($greve->date_fin) : $start;
            return $start->diffInDays($end) + 1;
        });

        // Calculate strike duration distribution
        $durationDistribution = $this->calculateStrikeDurationDistribution();

        // Calculate monthly strike trends
        $monthlyTrends = $this->calculateMonthlyStrikeTrends();

        return [
            'strike_count' => $strikeCount,
            'strike_days' => $strikeDays,
            'strike_rate' => $strikeRate,
            'duration_distribution' => $durationDistribution,
            'monthly_trends' => $monthlyTrends,
        ];
    }

    /**
     * Calculate strike rate for a specific category
     */
    private function calculateStrikeRateForCategory($positionHistoriques, $staffIds)
    {
        // Use Greve model for real data
        $strikeCount = Greve::whereIn('fonctionnaire_id', $staffIds)->count();
        $strikeRate = count($staffIds) > 0 ? ($strikeCount / count($staffIds)) * 100 : 0;
        $strikeDays = Greve::whereIn('fonctionnaire_id', $staffIds)->get()->sum(function($greve) {
            if (!$greve->date_debut) return 0;
            $start = Carbon::parse($greve->date_debut);
            $end = $greve->date_fin ? Carbon::parse($greve->date_fin) : $start;
            return $start->diffInDays($end) + 1;
        });

        // Calculate strike duration distribution for this category
        $durationDistribution = $this->calculateStrikeDurationDistributionForCategory($staffIds);

        // Calculate monthly strike trends for this category
        $monthlyTrends = $this->calculateMonthlyStrikeTrendsForCategory($staffIds);

        return [
            'strike_count' => $strikeCount,
            'strike_days' => $strikeDays,
            'strike_rate' => $strikeRate,
            'duration_distribution' => $durationDistribution,
            'monthly_trends' => $monthlyTrends,
        ];
    }

    /**
     * Calculate abandonment rate
     */
    private function calculateAbandonmentRate($positionHistoriques, $allFonctionnaires)
    {
        // Count abandonments
        $abandonmentCount = $positionHistoriques
            ->where('type', 'abandon_poste')
            ->count();

        // Calculate abandonment rate
        $abandonmentRate = $allFonctionnaires->count() > 0 ? ($abandonmentCount / $allFonctionnaires->count()) * 100 : 0;

        return [
            'abandonment_count' => $abandonmentCount,
            'abandonment_rate' => $abandonmentRate,
        ];
    }

    /**
     * Calculate abandonment rate for a specific category
     */
    private function calculateAbandonmentRateForCategory($positionHistoriques, $staffIds)
    {
        // Count abandonments
        $abandonmentCount = $positionHistoriques
            ->whereIn('fonctionnaire_id', $staffIds)
            ->where('type', 'abandon_poste')
            ->count();

        // Calculate abandonment rate
        $abandonmentRate = count($staffIds) > 0 ? ($abandonmentCount / count($staffIds)) * 100 : 0;

        return [
            'abandonment_count' => $abandonmentCount,
            'abandonment_rate' => $abandonmentRate,
        ];
    }

    /**
     * Calculate medical absence ratios
     */
    private function calculateMedicalAbsenceRatios($positionHistoriques)
    {
        $totalCertificates = Certificate::count();
        $shortTermCertificates = Certificate::whereBetween('jours', [1, 7])->count();
        $longTermCertificates = Certificate::where('jours', '>', 30)->count();
        $shortTermRatio = $totalCertificates > 0 ? ($shortTermCertificates / $totalCertificates) * 100 : 0;
        $longTermRatio = $totalCertificates > 0 ? ($longTermCertificates / $totalCertificates) * 100 : 0;
        return [
            'total_certificates' => $totalCertificates,
            'short_term_certificates' => $shortTermCertificates,
            'long_term_certificates' => $longTermCertificates,
            'short_term_ratio' => $shortTermRatio,
            'long_term_ratio' => $longTermRatio,
        ];
    }

    /**
     * Calculate medical absence ratios for a specific category
     */
    private function calculateMedicalAbsenceRatiosForCategory($positionHistoriques, $staffIds)
    {
        $totalCertificates = Certificate::whereIn('fonctionnaire_id', $staffIds)->count();
        $shortTermCertificates = Certificate::whereIn('fonctionnaire_id', $staffIds)->whereBetween('jours', [1, 7])->count();
        $longTermCertificates = Certificate::whereIn('fonctionnaire_id', $staffIds)->where('jours', '>', 30)->count();
        $shortTermRatio = $totalCertificates > 0 ? ($shortTermCertificates / $totalCertificates) * 100 : 0;
        $longTermRatio = $totalCertificates > 0 ? ($longTermCertificates / $totalCertificates) * 100 : 0;
        return [
            'total_certificates' => $totalCertificates,
            'short_term_certificates' => $shortTermCertificates,
            'long_term_certificates' => $longTermCertificates,
            'short_term_ratio' => $shortTermRatio,
            'long_term_ratio' => $longTermRatio,
        ];
    }

    /**
     * Calculate lost work days
     */
    private function calculateLostWorkDays($positionHistoriques)
    {
        $absenceDays = Certificate::sum('jours');
        $strikeDays = Greve::all()->sum(function($greve) {
            if (!$greve->date_debut) return 0;
            $start = Carbon::parse($greve->date_debut);
            $end = $greve->date_fin ? Carbon::parse($greve->date_fin) : $start;
            return $start->diffInDays($end) + 1;
        });
        $leaveDays = Relicat::sum('nbr_jours_disponibles');
        $totalLostDays = $absenceDays + $strikeDays + $leaveDays;
        return [
            'absence_days' => $absenceDays,
            'strike_days' => $strikeDays,
            'leave_days' => $leaveDays,
            'total_lost_days' => $totalLostDays,
        ];
    }

    /**
     * Calculate lost work days for a specific category
     */
    private function calculateLostWorkDaysForCategory($positionHistoriques, $staffIds)
    {
        $absenceDays = Certificate::whereIn('fonctionnaire_id', $staffIds)->sum('jours');
        $strikeDays = Greve::whereIn('fonctionnaire_id', $staffIds)->get()->sum(function($greve) {
            if (!$greve->date_debut) return 0;
            $start = Carbon::parse($greve->date_debut);
            $end = $greve->date_fin ? Carbon::parse($greve->date_fin) : $start;
            return $start->diffInDays($end) + 1;
        });
        $leaveDays = Relicat::whereIn('fonctionnaire_id', $staffIds)->sum('nbr_jours_disponibles');
        $totalLostDays = $absenceDays + $strikeDays + $leaveDays;
        return [
            'absence_days' => $absenceDays,
            'strike_days' => $strikeDays,
            'leave_days' => $leaveDays,
            'total_lost_days' => $totalLostDays,
        ];
    }

    /**
     * Calculate leave rate using CongeDecision and DemandeConge models
     */
    private function calculateLeaveRate($positionHistoriques, $allFonctionnaires, $dateDebut = null, $dateFin = null)
    {
        // Use CongeDecision for approved leave days
        $congeDecisionQuery = CongeDecision::where('statut', 'approuve');
        if ($dateDebut && $dateFin) {
            $congeDecisionQuery->whereBetween('date_decision', [$dateDebut, $dateFin]);
        }
        $approvedLeaveDays = $congeDecisionQuery->sum('nombre_jours');

        // Use Conge table for approved leaves (linked to DemandeConge)
        $congeQuery = Conge::query();
        if ($dateDebut && $dateFin) {
            $congeQuery->whereHas('demande_conges', function($q) use ($dateDebut, $dateFin) {
                $q->whereBetween('date_demande', [$dateDebut, $dateFin]);
            });
        }
        $approvedCongesDays = $congeQuery->with('demande_conges')->get()->sum(function($conge) {
            return $conge->demande_conges ? $conge->demande_conges->demande : 0;
        });

        // Use Relicat as fallback for legacy data
        $relicatQuery = Relicat::query();
        if ($dateDebut && $dateFin) {
            $relicatQuery->whereBetween('date_conge', [$dateDebut, $dateFin]);
        }
        $relicatDays = $relicatQuery->sum('nbr_jours_disponibles');

        // Total leave days (prioritize approved decisions, then approved conges, then relicat)
        $totalLeaveDays = $approvedLeaveDays > 0 ? $approvedLeaveDays : ($approvedCongesDays > 0 ? $approvedCongesDays : $relicatDays);

        $totalWorkdays = $allFonctionnaires->count() * 365 * 0.75;
        $leaveRate = $totalWorkdays > 0 ? ($totalLeaveDays / $totalWorkdays) * 100 : 0;

        Log::info("Leave calculation - CongeDecision approved: {$approvedLeaveDays}, Conge approved: {$approvedCongesDays}, Relicat: {$relicatDays}, Total: {$totalLeaveDays}");

        return [
            'leave_days' => $totalLeaveDays,
            'approved_decisions' => $approvedLeaveDays,
            'approved_conges' => $approvedCongesDays,
            'relicat_days' => $relicatDays,
            'total_workdays' => $totalWorkdays,
            'leave_rate' => $leaveRate,
        ];
    }

    /**
     * Calculate leave rate for a specific category using CongeDecision and DemandeConge
     */
    private function calculateLeaveRateForCategory($positionHistoriques, $staffIds, $dateDebut = null, $dateFin = null)
    {
        // Use CongeDecision for approved leave days for this category
        $congeDecisionQuery = CongeDecision::whereIn('fonctionnaire_id', $staffIds)->where('statut', 'approuve');
        if ($dateDebut && $dateFin) {
            $congeDecisionQuery->whereBetween('date_decision', [$dateDebut, $dateFin]);
        }
        $approvedLeaveDays = $congeDecisionQuery->sum('nombre_jours');

        // Use Conge table for approved leaves for this category
        $congeQuery = Conge::whereHas('demande_conges', function($q) use ($staffIds) {
            $q->whereIn('fonctionnaire_id', $staffIds);
        });
        if ($dateDebut && $dateFin) {
            $congeQuery->whereHas('demande_conges', function($q) use ($dateDebut, $dateFin) {
                $q->whereBetween('date_demande', [$dateDebut, $dateFin]);
            });
        }
        $approvedCongesDays = $congeQuery->with('demande_conges')->get()->sum(function($conge) {
            return $conge->demande_conges ? $conge->demande_conges->demande : 0;
        });

        // Use Relicat as fallback for legacy data for this category
        $relicatQuery = Relicat::whereIn('fonctionnaire_id', $staffIds);
        if ($dateDebut && $dateFin) {
            $relicatQuery->whereBetween('date_conge', [$dateDebut, $dateFin]);
        }
        $relicatDays = $relicatQuery->sum('nbr_jours_disponibles');

        // Total leave days (prioritize approved decisions, then approved conges, then relicat)
        $totalLeaveDays = $approvedLeaveDays > 0 ? $approvedLeaveDays : ($approvedCongesDays > 0 ? $approvedCongesDays : $relicatDays);

        $totalWorkdays = count($staffIds) * 365 * 0.75;
        $leaveRate = $totalWorkdays > 0 ? ($totalLeaveDays / $totalWorkdays) * 100 : 0;

        return [
            'leave_days' => $totalLeaveDays,
            'approved_decisions' => $approvedLeaveDays,
            'approved_conges' => $approvedCongesDays,
            'relicat_days' => $relicatDays,
            'total_workdays' => $totalWorkdays,
            'leave_rate' => $leaveRate,
        ];
    }

    /**
     * Calculate mobility rate using dedicated mutation models and position changes
     */
    private function calculateMobilityRate($positionHistoriques, $allFonctionnaires)
    {
        // Use HistoriqueMutation for detailed mutation tracking
        $historiqueMutations = HistoriqueMutation::all();

        // Use Mutation for basic mutation tracking
        $mutations = Mutation::all();

        // Use PositionHistorique for other movements
        $positionChanges = $positionHistoriques->filter(function($h) {
            return $h->ancien_position_id && $h->nouveaux_position_id &&
                   $h->ancien_position_id != $h->nouveaux_position_id;
        });

        // Count internal movements (same facility, different service)
        $internalMovements = 0;

        // From HistoriqueMutation - same facility
        $internalMovements += $historiqueMutations->filter(function($m) {
            return $m->formation_sanitaire_origine_id == $m->formation_sanitaire_destination_id &&
                   $m->formation_sanitaire_origine_id && $m->formation_sanitaire_destination_id;
        })->count();

        // From Mutation - service changes
        $internalMovements += $mutations->filter(function($m) {
            return $m->old_service_id != $m->new_service_id &&
                   $m->old_service_id && $m->new_service_id;
        })->count();

        // Count external movements (between facilities)
        $externalMovements = 0;

        // From HistoriqueMutation - different facilities
        $externalMovements += $historiqueMutations->filter(function($m) {
            return $m->formation_sanitaire_origine_id != $m->formation_sanitaire_destination_id &&
                   $m->formation_sanitaire_origine_id && $m->formation_sanitaire_destination_id;
        })->count();

        // Count specific movement types separately
        $detachements = $positionChanges->where('type', 'detachement')->count();
        $misesADisposition = $positionChanges->where('type', 'mise_en_disponibilite')->count();
        $misesADispositionAutres = $positionChanges->where('type', 'mise_a_disposition')->count();

        // Total other movements
        $otherMovements = $detachements + $misesADisposition + $misesADispositionAutres;

        // Count recruitment and departures from PositionHistorique
        $recrutements = $positionChanges->where('type', 'recrutement')->count();
        $departs = $positionChanges->whereIn('type', ['demission', 'retraite', 'deces'])->count();

        // Total movements
        $totalMovements = $internalMovements + $externalMovements + $otherMovements;

        // Calculate mobility rate
        $mobilityRate = $allFonctionnaires->count() > 0 ? ($totalMovements / $allFonctionnaires->count()) * 100 : 0;

        Log::info("Mobility calculation - HistoriqueMutation: {$historiqueMutations->count()}, Mutation: {$mutations->count()}, PositionChanges: {$positionChanges->count()}");
        Log::info("Mobility breakdown - Internal: {$internalMovements}, External: {$externalMovements}, Detachements: {$detachements}, Mises à disposition: {$misesADisposition}, Recrutements: {$recrutements}, Départs: {$departs}");

        return [
            'internal_movements' => $internalMovements,
            'external_movements' => $externalMovements,
            'other_movements' => $otherMovements,
            'detachements' => $detachements,
            'mises_a_disposition' => $misesADisposition + $misesADispositionAutres,
            'recrutements' => $recrutements,
            'departs' => $departs,
            'total_movements' => $totalMovements,
            'mobility_rate' => $mobilityRate,
        ];
    }

    /**
     * Calculate mobility rate for a specific category using dedicated mutation models
     */
    private function calculateMobilityRateForCategory($positionHistoriques, $staffIds)
    {
        // Filter mutations for this category
        $historiqueMutations = HistoriqueMutation::whereIn('fonctionnaire_id', $staffIds)->get();
        $mutations = Mutation::whereIn('fonctionnaire_id', $staffIds)->get();

        // Filter position historiques for this category
        $categoryHistoriques = $positionHistoriques->whereIn('fonctionnaire_id', $staffIds);
        $positionChanges = $categoryHistoriques->filter(function($h) {
            return $h->ancien_position_id && $h->nouveaux_position_id &&
                   $h->ancien_position_id != $h->nouveaux_position_id;
        });

        // Count internal movements (same facility, different service)
        $internalMovements = 0;

        // From HistoriqueMutation - same facility
        $internalMovements += $historiqueMutations->filter(function($m) {
            return $m->formation_sanitaire_origine_id == $m->formation_sanitaire_destination_id &&
                   $m->formation_sanitaire_origine_id && $m->formation_sanitaire_destination_id;
        })->count();

        // From Mutation - service changes
        $internalMovements += $mutations->filter(function($m) {
            return $m->old_service_id != $m->new_service_id &&
                   $m->old_service_id && $m->new_service_id;
        })->count();

        // Count external movements (between facilities)
        $externalMovements = 0;

        // From HistoriqueMutation - different facilities
        $externalMovements += $historiqueMutations->filter(function($m) {
            return $m->formation_sanitaire_origine_id != $m->formation_sanitaire_destination_id &&
                   $m->formation_sanitaire_origine_id && $m->formation_sanitaire_destination_id;
        })->count();

        // Count other movements (detachments, mises en disponibilité, etc.)
        $otherMovements = $positionChanges->whereIn('type', ['mise_en_disponibilite', 'detachement', 'mise_a_disposition'])->count();

        // Total movements
        $totalMovements = $internalMovements + $externalMovements + $otherMovements;

        // Calculate mobility rate
        $mobilityRate = count($staffIds) > 0 ? ($totalMovements / count($staffIds)) * 100 : 0;

        return [
            'internal_movements' => $internalMovements,
            'external_movements' => $externalMovements,
            'other_movements' => $otherMovements,
            'total_movements' => $totalMovements,
            'mobility_rate' => $mobilityRate,
        ];
    }

    /**
     * Calculate strike duration distribution
     */
    private function calculateStrikeDurationDistribution()
    {
        $greves = Greve::all();
        $distribution = [
            '1_day' => 0,
            '2_days' => 0,
            '3_days' => 0,
            '4_days' => 0,
            '5_plus_days' => 0,
        ];

        $durationCounts = [
            '1_day' => 0,
            '2_3_days' => 0,
            '4_plus_days' => 0,
        ];

        foreach ($greves as $greve) {
            if (!$greve->date_debut) continue;

            $start = Carbon::parse($greve->date_debut);
            $end = $greve->date_fin ? Carbon::parse($greve->date_fin) : $start;
            $duration = $start->diffInDays($end) + 1;

            // Detailed distribution
            if ($duration == 1) {
                $distribution['1_day']++;
                $durationCounts['1_day']++;
            } elseif ($duration == 2) {
                $distribution['2_days']++;
                $durationCounts['2_3_days']++;
            } elseif ($duration == 3) {
                $distribution['3_days']++;
                $durationCounts['2_3_days']++;
            } elseif ($duration == 4) {
                $distribution['4_days']++;
                $durationCounts['4_plus_days']++;
            } else {
                $distribution['5_plus_days']++;
                $durationCounts['4_plus_days']++;
            }
        }

        return [
            'detailed' => $distribution,
            'grouped' => $durationCounts,
        ];
    }

    /**
     * Calculate monthly strike trends
     */
    private function calculateMonthlyStrikeTrends()
    {
        $currentYear = Carbon::now()->year;
        $monthlyData = [
            'strikers' => array_fill(0, 12, 0),
            'strike_days' => array_fill(0, 12, 0),
        ];

        $greves = Greve::whereYear('date_debut', $currentYear)->get();

        foreach ($greves as $greve) {
            if (!$greve->date_debut) continue;

            $month = Carbon::parse($greve->date_debut)->month - 1; // 0-indexed for array
            $monthlyData['strikers'][$month]++;

            $start = Carbon::parse($greve->date_debut);
            $end = $greve->date_fin ? Carbon::parse($greve->date_fin) : $start;
            $duration = $start->diffInDays($end) + 1;
            $monthlyData['strike_days'][$month] += $duration;
        }

        return $monthlyData;
    }

    /**
     * Calculate strike duration distribution for a specific category
     */
    private function calculateStrikeDurationDistributionForCategory($staffIds)
    {
        $greves = Greve::whereIn('fonctionnaire_id', $staffIds)->get();
        $distribution = [
            '1_day' => 0,
            '2_days' => 0,
            '3_days' => 0,
            '4_days' => 0,
            '5_plus_days' => 0,
        ];

        $durationCounts = [
            '1_day' => 0,
            '2_3_days' => 0,
            '4_plus_days' => 0,
        ];

        foreach ($greves as $greve) {
            if (!$greve->date_debut) continue;

            $start = Carbon::parse($greve->date_debut);
            $end = $greve->date_fin ? Carbon::parse($greve->date_fin) : $start;
            $duration = $start->diffInDays($end) + 1;

            // Detailed distribution
            if ($duration == 1) {
                $distribution['1_day']++;
                $durationCounts['1_day']++;
            } elseif ($duration == 2) {
                $distribution['2_days']++;
                $durationCounts['2_3_days']++;
            } elseif ($duration == 3) {
                $distribution['3_days']++;
                $durationCounts['2_3_days']++;
            } elseif ($duration == 4) {
                $distribution['4_days']++;
                $durationCounts['4_plus_days']++;
            } else {
                $distribution['5_plus_days']++;
                $durationCounts['4_plus_days']++;
            }
        }

        return [
            'detailed' => $distribution,
            'grouped' => $durationCounts,
        ];
    }

    /**
     * Calculate monthly strike trends for a specific category
     */
    private function calculateMonthlyStrikeTrendsForCategory($staffIds)
    {
        $currentYear = Carbon::now()->year;
        $monthlyData = [
            'strikers' => array_fill(0, 12, 0),
            'strike_days' => array_fill(0, 12, 0),
        ];

        $greves = Greve::whereIn('fonctionnaire_id', $staffIds)
                      ->whereYear('date_debut', $currentYear)
                      ->get();

        foreach ($greves as $greve) {
            if (!$greve->date_debut) continue;

            $month = Carbon::parse($greve->date_debut)->month - 1; // 0-indexed for array
            $monthlyData['strikers'][$month]++;

            $start = Carbon::parse($greve->date_debut);
            $end = $greve->date_fin ? Carbon::parse($greve->date_fin) : $start;
            $duration = $start->diffInDays($end) + 1;
            $monthlyData['strike_days'][$month] += $duration;
        }

        return $monthlyData;
    }

    /**
     * Calculate incoming movements breakdown
     */
    private function calculateIncomingMovementsBreakdown($positionHistoriques)
    {
        // Count different types of incoming movements based on actual data
        $recrutements = $positionHistoriques
            ->where('type', 'recrutement')
            ->where('nouveaux_position_id', 2)
            ->count();

        $mutationsEntrantes = $positionHistoriques
            ->where('type', 'mutation')
            ->where('nouveaux_position_id', 2)
            ->count();

        $misesADispositionEntrantes = $positionHistoriques
            ->where('type', 'mise_a_disposition')
            ->where('nouveaux_position_id', 2)
            ->count();

        $detachementsEntrants = $positionHistoriques
            ->where('type', 'detachement')
            ->where('nouveaux_position_id', 2)
            ->count();

        $formationResidantMedecin = $positionHistoriques
            ->where('type', 'formation')
            ->where('nouveaux_position_id', 2)
            ->count();

        // Use only real data - no fallback generation

        return [
            'recrutements' => $recrutements,
            'mutations_entrantes' => $mutationsEntrantes,
            'mises_a_disposition_entrantes' => $misesADispositionEntrantes,
            'detachements_entrants' => $detachementsEntrants,
            'formation_residant_medecin' => $formationResidantMedecin,
        ];
    }

    /**
     * Calculate outgoing movements breakdown
     */
    private function calculateOutgoingMovementsBreakdown($positionHistoriques)
    {
        // Count different types of outgoing movements based on actual data
        $mutationsSortantes = $positionHistoriques
            ->where('type', 'mutation')
            ->where('ancien_position_id', 2)
            ->where('nouveaux_position_id', '!=', 2)
            ->count();

        $demissions = $positionHistoriques
            ->where('type', 'demission')
            ->where('ancien_position_id', 2)
            ->count();

        $misesADisposition = $positionHistoriques
            ->where('type', 'mise_a_disposition')
            ->where('ancien_position_id', 2)
            ->count();

        $detachements = $positionHistoriques
            ->where('type', 'detachement')
            ->where('ancien_position_id', 2)
            ->count();

        return [
            'mutations_sortantes' => $mutationsSortantes,
            'demissions' => $demissions,
            'mises_a_disposition' => $misesADisposition,
            'detachements' => $detachements,
        ];
    }

    /**
     * Calculate retirement trends by year
     */
    private function calculateRetirementTrends($allFonctionnaires)
    {
        $currentYear = Carbon::now()->year;
        $years = [];
        $retirementByAgeData = [];
        $earlyRetirementData = [];

        // Get data for the last 6 years
        for ($i = 5; $i >= 0; $i--) {
            $year = $currentYear - $i;
            $years[] = $year;

            // Count retirements by age limit for this year
            $retirementByAge = PositionHistorique::where('type', 'retraite')
                ->where('remarque', 'like', '%limite%age%')
                ->whereYear('date_prise_en_service', $year)
                ->count();

            // Count early retirements for this year
            $earlyRetirement = PositionHistorique::where('type', 'retraite')
                ->where('remarque', 'like', '%anticip%')
                ->whereYear('date_prise_en_service', $year)
                ->count();

            // Calculate rates
            $totalStaff = $allFonctionnaires->count();
            $retirementByAgeData[] = $totalStaff > 0 ? ($retirementByAge / $totalStaff) * 100 : 0;
            $earlyRetirementData[] = $totalStaff > 0 ? ($earlyRetirement / $totalStaff) * 100 : 0;
        }

        return [
            'years' => $years,
            'retirement_by_age_data' => $retirementByAgeData,
            'early_retirement_data' => $earlyRetirementData,
        ];
    }

    /**
     * Calculate cadre distribution by center
     */
    private function calculateCadreDistributionByCenter($activeFonctionnaires, $cadres)
    {
        // Get top 5 formations sanitaires by staff count
        $topFormations = $activeFonctionnaires
            ->groupBy('nom_formation_sanitaire_id')
            ->map(function ($group) {
                return $group->count();
            })
            ->sortDesc()
            ->take(5);

        $formationNames = [];
        $medicalData = [];
        $nursingData = [];
        $adminData = [];

        // Get cadre IDs for each category
        $medicalCadreIds = $cadres->whereIn('categorie_cadre_id', [8, 6, 5])->pluck('id')->toArray();
        $nursingCadreIds = $cadres->where('categorie_cadre_id', 4)->pluck('id')->toArray();
        $adminCadreIds = $cadres->where('categorie_cadre_id', 1)->pluck('id')->toArray();

        foreach ($topFormations->keys() as $formationId) {
            // Get formation name
            $formation = NomFormationSanitaire::find($formationId);
            $formationNames[] = $formation ? $formation->nom : "Centre $formationId";

            // Get staff for this formation
            $formationStaff = $activeFonctionnaires->where('nom_formation_sanitaire_id', $formationId);

            // Count by cadre category
            $medicalStaffIds = $this->getStaffIdsByCadreIds($formationStaff, $medicalCadreIds);
            $nursingStaffIds = $this->getStaffIdsByCadreIds($formationStaff, $nursingCadreIds);
            $adminStaffIds = $this->getStaffIdsByCadreIds($formationStaff, $adminCadreIds);

            $totalStaff = $formationStaff->count();
            $medicalData[] = $totalStaff > 0 ? (count($medicalStaffIds) / $totalStaff) * 100 : 0;
            $nursingData[] = $totalStaff > 0 ? (count($nursingStaffIds) / $totalStaff) * 100 : 0;
            $adminData[] = $totalStaff > 0 ? (count($adminStaffIds) / $totalStaff) * 100 : 0;
        }

        return [
            'formation_names' => $formationNames,
            'medical_data' => $medicalData,
            'nursing_data' => $nursingData,
            'admin_data' => $adminData,
        ];
    }

    /**
     * Calculate leave type distribution
     */
    private function calculateLeaveTypeDistribution($dateDebut = null, $dateFin = null)
    {
        // Get all leave types with their usage count
        $typeConges = TypeConge::all();
        $distribution = [];
        $labels = [];
        $data = [];

        foreach ($typeConges as $typeConge) {
            $query = DemandeConge::where('type_conge_id', $typeConge->id);
            if ($dateDebut && $dateFin) {
                $query->whereBetween('date_demande', [$dateDebut, $dateFin]);
            }
            $count = $query->count();
            $distribution[$typeConge->nom] = $count;
            $labels[] = $typeConge->nom;
            $data[] = $count;
        }

        return [
            'labels' => $labels,
            'data' => $data,
            'distribution' => $distribution,
        ];
    }

    /**
     * Calculate average duration by leave type
     */
    private function calculateLeaveAverageDuration($dateDebut = null, $dateFin = null)
    {
        // Get all leave types with their average duration
        $typeConges = TypeConge::all();
        $labels = [];
        $data = [];

        foreach ($typeConges as $typeConge) {
            $labels[] = $typeConge->nom;

            // Calculate average duration from actual leave requests only
            $query = DemandeConge::where('type_conge_id', $typeConge->id);
            if ($dateDebut && $dateFin) {
                $query->whereBetween('date_demande', [$dateDebut, $dateFin]);
            }
            $avgDuration = $query->avg('demande');

            // Use only real data - no fallback to default values
            $data[] = $avgDuration ?: 0;
        }

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }

    /**
     * Calculate monthly leave trends
     */
    private function calculateLeaveMonthlyTrends($dateDebut = null, $dateFin = null)
    {
        $monthlyRequests = array_fill(0, 12, 0);
        $monthlyDays = array_fill(0, 12, 0);

        // Get leave requests for the specified date range
        $query = DemandeConge::query();
        if ($dateDebut && $dateFin) {
            $query->whereBetween('date_demande', [$dateDebut, $dateFin]);
        } else {
            $query->whereYear('date_demande', Carbon::now()->year);
        }
        $demandeConges = $query->get();

        foreach ($demandeConges as $demande) {
            $month = Carbon::parse($demande->date_demande)->month - 1; // 0-indexed
            $monthlyRequests[$month]++;
            $monthlyDays[$month] += $demande->demande;
        }

        return [
            'requests' => $monthlyRequests,
            'days' => $monthlyDays,
        ];
    }

    /**
     * Show AI analyses page
     */
    public function aiAnalyses()
    {
        // Get all HR statistics for AI analysis
        $dateDebut = now()->subYear()->format('Y-m-d');
        $dateFin = now()->format('Y-m-d');

        $activeFonctionnaires = Fonctionnaire::where('position_id', 2)->get();
        $allFonctionnaires = Fonctionnaire::all();
        $positionHistoriques = PositionHistorique::with(['fonctionnaire', 'ancienPosition', 'nouveauxPosition'])
            ->whereBetween('created_at', [$dateDebut, $dateFin])
            ->get();
        $categorieCadres = CategorieCadre::with('cadres')->get();
        $cadres = Cadre::all();

        $hrStats = $this->calculateHrStats(
            $activeFonctionnaires,
            $allFonctionnaires,
            $positionHistoriques,
            $categorieCadres,
            $cadres,
            $dateDebut,
            $dateFin
        );

        // Predefined analysis prompts in French
        $analysisPrompts = [
            'analyse_globale' => 'Analyse globale des ressources humaines',
            'performance_rh' => 'Analyse de la performance RH',
            'mobilite_personnel' => 'Analyse de la mobilité du personnel',
            'gestion_conges' => 'Analyse de la gestion des congés',
            'absenteisme' => 'Analyse de l\'absentéisme',
            'retraites' => 'Analyse des départs en retraite',
            'rotation_personnel' => 'Analyse de la rotation du personnel',
            'greves' => 'Analyse des mouvements de grève',
            'recommandations' => 'Recommandations stratégiques RH'
        ];

        return view('statistics.ai-analyses', compact('hrStats', 'analysisPrompts'));
    }

    /**
     * Generate AI analysis based on user prompt
     */
    public function generateAIAnalysis(Request $request)
    {
        $request->validate([
            'prompt_type' => 'required|string',
            'custom_prompt' => 'nullable|string|max:500'
        ]);

        // Get all HR statistics
        $dateDebut = now()->subYear()->format('Y-m-d');
        $dateFin = now()->format('Y-m-d');

        $activeFonctionnaires = Fonctionnaire::where('position_id', 2)->get();
        $allFonctionnaires = Fonctionnaire::all();
        $positionHistoriques = PositionHistorique::with(['fonctionnaire', 'ancienPosition', 'nouveauxPosition'])
            ->whereBetween('created_at', [$dateDebut, $dateFin])
            ->get();
        $categorieCadres = CategorieCadre::with('cadres')->get();
        $cadres = Cadre::all();

        $hrStats = $this->calculateHrStats(
            $activeFonctionnaires,
            $allFonctionnaires,
            $positionHistoriques,
            $categorieCadres,
            $cadres,
            $dateDebut,
            $dateFin
        );

        // Determine the analysis prompt
        $promptType = $request->prompt_type;
        $customPrompt = $request->custom_prompt;

        // Check if it's a custom prompt and validate context
        if ($promptType === 'custom' && $customPrompt) {
            if (!$this->isHRContextValid($customPrompt)) {
                return response()->json([
                    'error' => 'Veuillez formuler une demande liée aux ressources humaines. Exemples valides: "Analysez l\'absentéisme", "Étudiez la mobilité du personnel", "Recommandations pour améliorer la performance RH", "Tendances des départs en retraite".'
                ], 400);
            }
            $analysisPrompt = $customPrompt;
        } else {
            $analysisPrompt = $this->getAnalysisPrompt($promptType);
        }

        try {
            // Generate AI analysis
            $analysis = $this->generateContentWithAI($hrStats, $analysisPrompt);

            return response()->json([
                'success' => true,
                'analysis' => $analysis,
                'prompt_type' => $promptType
            ]);

        } catch (\Exception $e) {
            Log::error('AI Analysis Error: ' . $e->getMessage());

            return response()->json([
                'error' => 'Erreur lors de la génération de l\'analyse. Veuillez réessayer.'
            ], 500);
        }
    }

    /**
     * Generate AI content using Gemini API
     */
    private function generateContentWithAI($hrStats, $analysisPrompt)
    {
        $client = new Client();

        $apiKey = env('GEMINI_API_KEY', '');
        if (empty($apiKey)) {
            // Return demo analysis for testing
            return $this->getDemoAnalysis($analysisPrompt);
        }

        $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=' . $apiKey;

        // Prepare HR statistics summary for AI
        $statsContext = $this->prepareStatsContext($hrStats);

        $prompt = "En tant qu'expert en ressources humaines, analysez les statistiques RH suivantes et fournissez une analyse détaillée en français.

STATISTIQUES RH:
{$statsContext}

DEMANDE D'ANALYSE:
{$analysisPrompt}

Veuillez fournir une analyse structurée et bien formatée avec:

- *Titre*: Un titre professionnel et accrocheur pour l'analyse (maximum 20 mots)
- *Résumé*: Un résumé exécutif concis et informatif (2-3 phrases, maximum 150 mots)
- *Analyse*: Une analyse détaillée et structurée avec:
  • Des paragraphes bien organisés
  • Des points clés mis en évidence
  • Des insights basés sur les données
  • Des tendances et observations importantes
  • Une structure logique et fluide
  (maximum 1000 mots)
- *Recommandations*: Des recommandations concrètes, actionables et priorisées avec:
  • Des actions spécifiques à court terme
  • Des stratégies à moyen terme
  • Des mesures de suivi suggérées
  (maximum 500 mots)

IMPORTANT: Utilisez un style professionnel, des phrases complètes et une structure claire. Évitez les listes à puces dans le JSON, utilisez plutôt des paragraphes bien rédigés.

Répondez uniquement en format JSON, sans marqueurs de code. Le JSON doit ressembler à ceci:

{
  \"titre\": \"Votre titre professionnel ici\",
  \"resume\": \"Votre résumé exécutif bien rédigé ici\",
  \"analyse\": \"Votre analyse détaillée et structurée en paragraphes ici\",
  \"recommandations\": \"Vos recommandations concrètes et actionables ici\"
}";

        $response = $client->post($url, [
            'json' => [
                'contents' => [
                    [
                        'parts' => [
                            ['text' => $prompt],
                        ],
                    ],
                ],
            ],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
        ]);

        $responseBody = $response->getBody()->getContents();
        $decodedResponse = json_decode($responseBody, true);

        if (!isset($decodedResponse['candidates'][0]['content']['parts'][0]['text'])) {
            throw new \Exception('Réponse API invalide');
        }

        $aiResponse = $decodedResponse['candidates'][0]['content']['parts'][0]['text'];

        // Clean and parse JSON response
        $aiResponse = trim($aiResponse);
        $aiResponse = preg_replace('/^```json\s*/', '', $aiResponse);
        $aiResponse = preg_replace('/\s*```$/', '', $aiResponse);

        $parsedResponse = json_decode($aiResponse, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Erreur de parsing JSON: ' . json_last_error_msg());
        }

        return $parsedResponse;
    }

    /**
     * Prepare HR statistics context for AI analysis
     */
    private function prepareStatsContext($hrStats)
    {
        $context = "DONNÉES STATISTIQUES RH:\n\n";

        // Staff overview
        $totalStaff = Fonctionnaire::count();
        $activeStaff = Fonctionnaire::where('position_id', 2)->count();
        $activityRate = $totalStaff > 0 ? ($activeStaff / $totalStaff) * 100 : 0;

        $context .= "EFFECTIF GLOBAL:\n";
        $context .= "- Total fonctionnaires: " . $totalStaff . "\n";
        $context .= "- Fonctionnaires actifs: " . $activeStaff . "\n";
        $context .= "- Taux d'activité: " . round($activityRate, 2) . "%\n\n";

        // Absences
        $context .= "ABSENTÉISME:\n";
        $context .= "- Total jours d'absence: " . ($hrStats['taux_absence_totale']['total_days'] ?? 0) . "\n";
        $context .= "- Taux d'absentéisme: " . round($hrStats['taux_absence_totale']['percentage'] ?? 0, 2) . "%\n\n";

        // Leave management
        $context .= "GESTION DES CONGÉS:\n";
        $context .= "- Total jours de congé: " . ($hrStats['conge']['leave_days'] ?? 0) . "\n";
        $context .= "- Taux de congé: " . round($hrStats['conge']['leave_rate'] ?? 0, 2) . "%\n\n";

        // Mobility
        $context .= "MOBILITÉ DU PERSONNEL:\n";
        $context .= "- Mouvements internes: " . ($hrStats['mobilite']['internal_movements'] ?? 0) . "\n";
        $context .= "- Mouvements externes: " . ($hrStats['mobilite']['external_movements'] ?? 0) . "\n";
        $context .= "- Taux de mobilité: " . round($hrStats['mobilite']['mobility_rate'] ?? 0, 2) . "%\n\n";

        // Retirement
        $context .= "RETRAITES:\n";
        $context .= "- Retraites par limite d'âge: " . ($hrStats['retraite']['retirement_by_age_count'] ?? 0) . "\n";
        $context .= "- Retraites anticipées: " . ($hrStats['retraite']['early_retirement_count'] ?? 0) . "\n";
        $context .= "- Taux de retraite: " . round($hrStats['retraite']['retirement_by_age_rate'] ?? 0, 2) . "%\n\n";

        // Staff rotation
        $context .= "ROTATION DU PERSONNEL:\n";
        $context .= "- Entrées: " . ($hrStats['rotation_personnel']['incoming_count'] ?? 0) . "\n";
        $context .= "- Sorties: " . ($hrStats['rotation_personnel']['outgoing_count'] ?? 0) . "\n";
        $context .= "- Taux de rotation: " . round($hrStats['rotation_personnel']['rotation_rate'] ?? 0, 2) . "%\n\n";

        // Strikes
        $context .= "MOUVEMENTS DE GRÈVE:\n";
        $context .= "- Nombre de grévistes: " . ($hrStats['greve']['strike_count'] ?? 0) . "\n";
        $context .= "- Taux de grève: " . round($hrStats['greve']['strike_rate'] ?? 0, 2) . "%\n";

        return $context;
    }

    /**
     * Get analysis prompt based on type
     */
    private function getAnalysisPrompt($promptType)
    {
        $prompts = [
            'analyse_globale' => 'Fournissez une analyse globale de la situation des ressources humaines en identifiant les tendances principales, les points forts et les défis.',
            'performance_rh' => 'Analysez la performance RH en évaluant l\'efficacité des processus, la productivité du personnel et les indicateurs clés.',
            'mobilite_personnel' => 'Analysez la mobilité du personnel en examinant les mouvements internes et externes, leurs causes et leurs impacts.',
            'gestion_conges' => 'Analysez la gestion des congés en évaluant les tendances, la planification et l\'impact sur les opérations.',
            'absenteisme' => 'Analysez l\'absentéisme en identifiant les causes, les tendances et les mesures correctives nécessaires.',
            'retraites' => 'Analysez les départs en retraite en évaluant les tendances, la planification de succession et les impacts organisationnels.',
            'rotation_personnel' => 'Analysez la rotation du personnel en examinant les taux d\'entrée et de sortie, leurs causes et leurs conséquences.',
            'greves' => 'Analysez les mouvements de grève en identifiant les causes, les tendances et les stratégies de prévention.',
            'recommandations' => 'Fournissez des recommandations stratégiques pour améliorer la gestion des ressources humaines basées sur les données analysées.'
        ];

        return $prompts[$promptType] ?? $prompts['analyse_globale'];
    }

    /**
     * Validate if prompt is within HR context
     */
    private function isHRContextValid($prompt)
    {
        // If prompt is empty or very short, allow it (will use default analysis)
        if (empty(trim($prompt)) || strlen(trim($prompt)) < 3) {
            return true;
        }

        $hrKeywords = [
            // Core HR terms
            'ressources humaines', 'rh', 'personnel', 'fonctionnaire', 'employé', 'staff', 'agent',
            'cadre', 'effectif', 'équipe', 'collaborateur', 'travailleur',

            // HR processes
            'congé', 'absence', 'absentéisme', 'mobilité', 'mutation', 'retraite', 'départ',
            'grève', 'rotation', 'recrutement', 'formation', 'performance', 'évaluation',
            'promotion', 'carrière', 'compétence', 'qualification',

            // HR metrics and analysis
            'statistique', 'analyse', 'indicateur', 'taux', 'pourcentage', 'données',
            'rapport', 'bilan', 'suivi', 'évolution', 'tendance', 'comparaison',

            // Organizational terms
            'service', 'poste', 'fonction', 'responsabilité', 'hiérarchie', 'organisation',
            'structure', 'département', 'unité', 'centre', 'direction',

            // HR management
            'gestion', 'management', 'administration', 'planification', 'stratégie',
            'politique', 'procédure', 'processus', 'amélioration', 'optimisation',

            // Work-related terms
            'travail', 'emploi', 'activité', 'mission', 'tâche', 'projet',
            'productivité', 'efficacité', 'qualité', 'satisfaction',

            // Time and scheduling
            'horaire', 'planning', 'temps', 'durée', 'période', 'année', 'mois',
            'jour', 'semaine', 'trimestre', 'semestre',

            // Common analysis requests
            'comment', 'pourquoi', 'quoi', 'qui', 'quand', 'où', 'combien',
            'analyser', 'étudier', 'examiner', 'évaluer', 'mesurer', 'calculer',
            'comparer', 'identifier', 'déterminer', 'expliquer', 'recommander'
        ];

        // Non-HR keywords that should be rejected
        $nonHrKeywords = [
            'cuisine', 'recette', 'sport', 'football', 'musique', 'film', 'cinéma',
            'voyage', 'vacances', 'météo', 'politique', 'élection', 'religion',
            'médecine', 'santé', 'maladie', 'traitement', 'médicament',
            'technologie', 'informatique', 'programmation', 'code', 'logiciel',
            'finance', 'bourse', 'investissement', 'crypto', 'bitcoin'
        ];

        $prompt = strtolower(trim($prompt));

        // Check for non-HR keywords first
        foreach ($nonHrKeywords as $keyword) {
            if (strpos($prompt, $keyword) !== false) {
                return false;
            }
        }

        // Check for HR keywords
        foreach ($hrKeywords as $keyword) {
            if (strpos($prompt, $keyword) !== false) {
                return true;
            }
        }

        // If no specific keywords found, check if it's a general analysis request
        $generalAnalysisTerms = [
            'analyse', 'analyser', 'étude', 'étudier', 'rapport', 'bilan',
            'résumé', 'synthèse', 'overview', 'aperçu', 'situation', 'état',
            'recommandation', 'conseil', 'suggestion', 'amélioration', 'optimisation'
        ];

        foreach ($generalAnalysisTerms as $term) {
            if (strpos($prompt, $term) !== false) {
                return true; // Allow general analysis requests
            }
        }

        // If prompt is short and doesn't contain obvious non-HR terms, allow it
        if (strlen($prompt) < 50) {
            return true;
        }

        return false;
    }

    /**
     * Export AI analysis to PDF
     */
    public function exportAnalysisPDF(Request $request)
    {
        $request->validate([
            'titre' => 'required|string',
            'resume' => 'required|string',
            'analyse' => 'required|string',
            'recommandations' => 'required|string',
            'prompt_type' => 'required|string'
        ]);

        $data = [
            'titre' => $request->titre,
            'resume' => $request->resume,
            'analyse' => $request->analyse,
            'recommandations' => $request->recommandations,
            'prompt_type' => $request->prompt_type,
            'date_generation' => now()->format('d/m/Y H:i'),
            'generated_by' => auth()->user()->name ?? 'Utilisateur'
        ];

        $pdf = Pdf::loadView('statistics.ai-analysis-pdf', $data);
        $pdf->setPaper('A4', 'portrait');

        $filename = 'analyse-ia-' . now()->format('Y-m-d-H-i-s') . '.pdf';

        return $pdf->download($filename);
    }

    /**
     * Get demo analysis for testing when API key is not configured
     */
    private function getDemoAnalysis($analysisPrompt)
    {
        $totalStaff = Fonctionnaire::count();
        $activeStaff = Fonctionnaire::where('position_id', 2)->count();
        $absenceRate = Certificate::count() > 0 ? 'significatif' : 'faible';
        $mobilityCount = HistoriqueMutation::count() + Mutation::count();

        return [
            'titre' => 'Analyse Démonstrative des Ressources Humaines - Service GRH-DMSPS Fès',
            'resume' => "Cette analyse démonstrative présente un aperçu de la situation RH actuelle avec {$totalStaff} fonctionnaires au total dont {$activeStaff} en position active. Les données révèlent des tendances importantes concernant l'absentéisme ({$absenceRate}), la mobilité du personnel ({$mobilityCount} mouvements enregistrés) et la gestion des congés. Cette analyse permet d'identifier les axes d'amélioration prioritaires pour optimiser la gestion des ressources humaines.",
            'analyse' => "L'analyse des données RH révèle plusieurs aspects significatifs de la gestion du personnel au sein de l'organisation.\n\nConcernant l'effectif global, nous observons un total de {$totalStaff} fonctionnaires avec {$activeStaff} personnes en position active, ce qui représente un taux d'activité de " . round($totalStaff > 0 ? ($activeStaff / $totalStaff) * 100 : 0, 1) . "%. Cette répartition indique une structure organisationnelle relativement stable.\n\nL'analyse de l'absentéisme montre des patterns intéressants. Les données des certificats médicaux permettent d'identifier les périodes de forte absence et leurs causes principales. Cette information est cruciale pour mettre en place des mesures préventives adaptées.\n\nLa mobilité du personnel, avec {$mobilityCount} mouvements enregistrés, témoigne d'une dynamique organisationnelle active. Les mutations internes et externes contribuent au développement des compétences et à l'adaptation aux besoins opérationnels.\n\nLa gestion des congés apparaît comme un élément clé de l'équilibre travail-vie privée. L'analyse des demandes et des approbations permet d'optimiser la planification et d'assurer la continuité des services.\n\nCes éléments convergent vers une vision globale de la performance RH qui nécessite une approche stratégique et des actions ciblées.",
            'recommandations' => "Basées sur l'analyse des données, plusieurs recommandations stratégiques émergent pour améliorer la gestion des ressources humaines.\n\nÀ court terme, il est recommandé de mettre en place un système de suivi renforcé des indicateurs clés de performance RH. Cela inclut la création de tableaux de bord automatisés et la définition d'alertes pour les situations critiques.\n\nPour la gestion de l'absentéisme, l'implémentation d'un programme de prévention santé et l'amélioration des conditions de travail constituent des priorités. Un suivi personnalisé des agents en situation d'absence récurrente permettrait d'identifier les causes profondes.\n\nConcernant la mobilité, l'élaboration d'un plan de carrière structuré et la mise en place d'un système de formation continue favoriseraient l'évolution professionnelle et la rétention des talents.\n\nL'optimisation de la gestion des congés passe par la digitalisation des processus de demande et d'approbation, ainsi que par l'amélioration de la planification prévisionnelle.\n\nEnfin, la mise en place d'enquêtes de satisfaction régulières et d'entretiens individuels permettrait de maintenir un dialogue constructif avec les équipes et d'anticiper les besoins futurs."
        ];
    }

    /**
     * Export cadres statistics to Excel or PDF
     */
    public function exportCadres(Request $request)
    {
        // Get filtered data using the same logic as detailedStatistics
        $positions = Position::all();
        $categorieCadres = CategorieCadre::all();
        $nomFormationSanitaires = NomFormationSanitaire::all();

        // Fonctionnaires query (default to active position_id = 2 only when no position filter provided)
        $fonctionnairesQuery = Fonctionnaire::with([
            'specialiteGrade.grade.cadre.categorie_cadre',
            'nomFormationSanitaire'
        ]);

        // Apply date filters for service dates
        if ($request->filled('date_debut_service')) {
            $fonctionnairesQuery->where('date_prise_en_service', '>=', $request->date_debut_service);
        }
        if ($request->filled('date_fin_service')) {
            $fonctionnairesQuery->where('date_prise_en_service', '<=', $request->date_fin_service);
        }

        // Apply position filter: treat 'all' or empty value as no position restriction; default to active-only if param absent
        $posParamPresent = $request->get('position_id') !== null;
        $posValue = $request->get('position_id');
        if ($posParamPresent && ($posValue === '' || $posValue === 'all')) {
            // 'Tous' selected -> do not apply position filter
        } elseif ($request->filled('position_id') && $posValue !== 'all') {
            $fonctionnairesQuery->where('position_id', $request->position_id);
        } else {
            // No position param -> default to active fonctionnaires
            $fonctionnairesQuery->where('position_id', 2);
        }

        // Apply category filter
        if ($request->filled('categorie_cadre_id')) {
            $fonctionnairesQuery->whereHas('specialiteGrade.grade.cadre.categorie_cadre', function($query) use ($request) {
                $query->where('id', $request->categorie_cadre_id);
            });
        }

        // Apply formation sanitaire filter
        if ($request->filled('formation_sanitaire_id')) {
            $fonctionnairesQuery->where('nom_formation_sanitaire_id', $request->formation_sanitaire_id);
        }

        $fonctionnaires = $fonctionnairesQuery->get();

        // Calculate statistics using the same method as detailedStatistics
        $regions = Region::with('villes')->get();
        $villes = Ville::with('arrondissementCommunes')->get();
        $arrondissementCommunes = ArrondissementCommune::all();
        $niveauCategorieFormations = NiveauCategorieFormation::all();
        $typeCategorieFormations = TypeCategorieFormation::all();
        $categorieFormations = CategorieFormation::all();
        $cadres = Cadre::all();
        $gradeCadres = GradeCadre::all();
        $specialiteGrades = SpecialiteGrade::all();
        $affectations = Affectation::with([
            'fonctionnaire',
            'formation_arrondissement_commune',
            'categorie_formation',
            'service',
            'fonction'
        ])->get();

        $stats = $this->calculateStats(
            $regions,
            $villes,
            $arrondissementCommunes,
            $nomFormationSanitaires,
            $niveauCategorieFormations,
            $typeCategorieFormations,
            $categorieFormations,
            $categorieCadres,
            $cadres,
            $gradeCadres,
            $specialiteGrades,
            $fonctionnaires,
            $affectations
        );

        // Prepare export data
        $exportData = $this->prepareExportData($stats, $categorieCadres);

        if ($request->export === 'excel') {
            return $this->exportToExcel($exportData);
        } elseif ($request->export === 'pdf') {
            $pdf = DomPDF::loadView('exports.cadres-statistics-pdf', compact('exportData', 'request'));
            return $pdf->download('relations_cadres_' . date('Y-m-d') . '.pdf');
        }

        return redirect()->back()->with('error', 'Format d\'export non spécifié');
    }

    /**
     * Prepare data for export
     */
    private function prepareExportData($stats, $categorieCadres)
    {
        $exportData = [];

        foreach ($categorieCadres as $categorieCadre) {
            $categorieCadreStats = $stats['categorie_cadres'][$categorieCadre->id] ?? null;

            if ($categorieCadreStats) {
                // Add category header row
                $exportData[] = [
                    'categorie_cadre' => $categorieCadre->nom,
                    'cadres_count' => $categorieCadreStats['cadres_count'],
                    'grade_cadres_count' => $categorieCadreStats['grade_cadres_count'],
                    'specialite_grades_count' => $categorieCadreStats['specialite_grades_count'],
                    'cadre_name' => '-',
                    'specialite_grade_name' => '-',
                    'specialite_fonctionnaires_count' => '-',
                    'total_fonctionnaires_count' => $categorieCadreStats['fonctionnaires_count'],
                    'formations_count' => $categorieCadreStats['formations_count'],
                    'formation_names' => implode(', ', $categorieCadreStats['formation_names'] ?? []),
                    'is_category_header' => true
                ];

                // Add each specialite grade as a separate row
                if (!empty($categorieCadreStats['cadres'])) {
                    foreach ($categorieCadreStats['cadres'] as $cadreId => $cadreStats) {
                        if (!empty($cadreStats['grade_cadres'])) {
                            foreach ($cadreStats['grade_cadres'] as $gradeCadreId => $gradeCadreStats) {
                                if (!empty($gradeCadreStats['specialite_grades'])) {
                                    foreach ($gradeCadreStats['specialite_grades'] as $specialiteGradeId => $specialiteGradeStats) {
                                        $exportData[] = [
                                            'categorie_cadre' => '↳ ' . $specialiteGradeStats['name'],
                                            'cadres_count' => '-',
                                            'grade_cadres_count' => '-',
                                            'specialite_grades_count' => '-',
                                            'cadre_name' => $cadreStats['name'],
                                            'specialite_grade_name' => $specialiteGradeStats['name'],
                                            'specialite_fonctionnaires_count' => $specialiteGradeStats['fonctionnaires_count'],
                                            'total_fonctionnaires_count' => '-',
                                            'formations_count' => count($specialiteGradeStats['formations'] ?? []),
                                            'formation_names' => implode(', ', array_column($specialiteGradeStats['formations'] ?? [], 'nom')),
                                            'is_category_header' => false
                                        ];
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return $exportData;
    }

    /**
     * Export data to Excel format using HTML table
     */
    private function exportToExcel($exportData)
    {
        $filename = 'relations_cadres_' . date('Y-m-d') . '.xls';

        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'max-age=0',
        ];

        $callback = function() use ($exportData) {
            echo '<html>';
            echo '<head>';
            echo '<meta charset="UTF-8">';
            echo '<style>';
            echo 'table { border-collapse: collapse; width: 100%; }';
            echo 'th, td { border: 1px solid #000; padding: 8px; text-align: left; }';
            echo 'th { background-color: #FFC107; font-weight: bold; }';
            echo '.center { text-align: center; }';
            echo '.category-header { background-color: #f0f0f0; font-weight: bold; }';
            echo '</style>';
            echo '</head>';
            echo '<body>';
            echo '<table>';

            // Headers
            echo '<tr>';
            echo '<th>Catégorie Cadre / Spécialité-Grade</th>';
            echo '<th>Nb Cadres</th>';
            echo '<th>Nb Grades</th>';
            echo '<th>Nb Spécialités</th>';
            echo '<th>Nom du Cadre</th>';
            echo '<th>Nb Fonctionnaires (Spécialité)</th>';
            echo '<th>Total Fonctionnaires (Catégorie)</th>';
            echo '<th>Formations Sanitaires</th>';
            echo '<th>Noms de formations sanitaires</th>';
            echo '</tr>';

            // Data rows
            foreach ($exportData as $row) {
                $rowClass = $row['is_category_header'] ? 'category-header' : '';
                echo '<tr class="' . $rowClass . '">';
                echo '<td>' . htmlspecialchars($row['categorie_cadre']) . '</td>';
                echo '<td class="center">' . htmlspecialchars($row['cadres_count']) . '</td>';
                echo '<td class="center">' . htmlspecialchars($row['grade_cadres_count']) . '</td>';
                echo '<td class="center">' . htmlspecialchars($row['specialite_grades_count']) . '</td>';
                echo '<td class="center">' . htmlspecialchars($row['cadre_name']) . '</td>';
                echo '<td class="center">' . htmlspecialchars($row['specialite_fonctionnaires_count']) . '</td>';
                echo '<td class="center">' . htmlspecialchars($row['total_fonctionnaires_count']) . '</td>';
                echo '<td class="center">' . htmlspecialchars($row['formations_count']) . '</td>';
                echo '<td>' . htmlspecialchars($row['formation_names']) . '</td>';
                echo '</tr>';
            }

            echo '</table>';
            echo '</body>';
            echo '</html>';
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Export formations statistics to Excel or PDF
     */
    public function exportFormations(Request $request)
    {
        // Get filtered data using the same logic as detailedStatistics
        $positions = Position::all();
        $categorieCadres = CategorieCadre::all();
        $nomFormationSanitaires = NomFormationSanitaire::all();

        // Fonctionnaires query - start with all fonctionnaires; we'll apply default active-only later if no position params
        $fonctionnairesQuery = Fonctionnaire::with([
            'specialiteGrade.grade.cadre.categorie_cadre',
            'nomFormationSanitaire'
        ])->whereNotNull('id');

        // Apply formations-specific date filters for service dates
        if ($request->filled('formations_date_debut_service')) {
            $fonctionnairesQuery->where('date_prise_en_service', '>=', $request->formations_date_debut_service);
        }
        if ($request->filled('formations_date_fin_service')) {
            $fonctionnairesQuery->where('date_prise_en_service', '<=', $request->formations_date_fin_service);
        }

        // Apply formations-specific position filter: treat 'all' or empty string as 'Tous' => no position restriction.
        $formationsPosParamPresent = $request->get('formations_position_id') !== null;
        $formationsPosValue = $request->get('formations_position_id');
        if ($formationsPosParamPresent && ($formationsPosValue === '' || $formationsPosValue === 'all')) {
            // 'Tous' selected: DO NOT apply any position filter (include all positions)
        } elseif ($request->filled('formations_position_id') && $formationsPosValue !== 'all') {
            $positionsFilter = $request->formations_position_id;
            $positionIds = is_array($positionsFilter) ? $positionsFilter : [$positionsFilter];

            // Get fonctionnaire ids based on latest position (history) or original position if no history
            $matchingIds = $this->getFonctionnaireIdsWithLatestPosition($positionIds);

            if (!empty($matchingIds)) {
                $fonctionnairesQuery->whereIn('id', $matchingIds);
            } else {
                // If no matches, ensure empty result
                $fonctionnairesQuery->whereRaw('1 = 0');
            }
        } else {
            // Default: only active fonctionnaires when no formations_position_id parameter provided
            $fonctionnairesQuery->where('position_id', 2);
        }

        // Apply formations-specific category filter
        if ($request->filled('formations_categorie_cadre_id')) {
            $fonctionnairesQuery->whereHas('specialiteGrade.grade.cadre.categorie_cadre', function($query) use ($request) {
                $query->where('id', $request->formations_categorie_cadre_id);
            });
        }

        // Apply formations-specific formation sanitaire filter
        if ($request->filled('formations_formation_sanitaire_id')) {
            $fonctionnairesQuery->where('nom_formation_sanitaire_id', $request->formations_formation_sanitaire_id);
        }

        $fonctionnaires = $fonctionnairesQuery->get();

        // Calculate statistics using the same method as detailedStatistics
        $regions = Region::with('villes')->get();
        $villes = Ville::with('arrondissementCommunes')->get();
        $arrondissementCommunes = ArrondissementCommune::all();
        $niveauCategorieFormations = NiveauCategorieFormation::all();
        $typeCategorieFormations = TypeCategorieFormation::all();
        $categorieFormations = CategorieFormation::all();
        $cadres = Cadre::all();
        $gradeCadres = GradeCadre::all();
        $specialiteGrades = SpecialiteGrade::all();
        $affectations = Affectation::with([
            'fonctionnaire',
            'formation_arrondissement_commune',
            'categorie_formation',
            'service',
            'fonction'
        ])->get();

        $stats = $this->calculateStats(
            $regions,
            $villes,
            $arrondissementCommunes,
            $nomFormationSanitaires,
            $niveauCategorieFormations,
            $typeCategorieFormations,
            $categorieFormations,
            $categorieCadres,
            $cadres,
            $gradeCadres,
            $specialiteGrades,
            $fonctionnaires,
            $affectations
        );

        // Prepare export data for formations
        $exportData = $this->prepareFormationsExportData($stats, $nomFormationSanitaires);

        if ($request->export === 'excel') {
            return $this->exportFormationsToExcel($exportData);
        } elseif ($request->export === 'pdf') {
            $pdf = DomPDF::loadView('exports.formations-statistics-pdf', compact('exportData', 'request'));
            return $pdf->download('formations_sanitaires_' . date('Y-m-d') . '.pdf');
        }

        return redirect()->back()->with('error', 'Format d\'export non spécifié');
    }

    /**
     * Get fonctionnaires for a specific formation
     */
    public function getFormationFonctionnaires(Request $request, $formationId)
    {
        $fonctionnairesQuery = Fonctionnaire::with([
            'specialiteGrade',
            'specialiteGrade.grade.cadre'
        ])->where('nom_formation_sanitaire_id', $formationId);

        // Apply formations-specific date filters for service dates
        if ($request->filled('formations_date_debut_service')) {
            $fonctionnairesQuery->where('date_prise_en_service', '>=', $request->formations_date_debut_service);
        }
        if ($request->filled('formations_date_fin_service')) {
            $fonctionnairesQuery->where('date_prise_en_service', '<=', $request->formations_date_fin_service);
        }

        // Position filter logic: treat 'all' or empty 'formations_position_id' as no position restriction.
        $formationsPosParamPresent = $request->get('formations_position_id') !== null;
        $formationsPosValue = $request->get('formations_position_id');
        if ($formationsPosParamPresent && ($formationsPosValue === '' || $formationsPosValue === 'all')) {
            // 'Tous' selected -> no position filter
        } elseif ($request->filled('formations_position_id') && $formationsPosValue !== 'all') {
            $positionsFilter = $request->formations_position_id;
            $positionIds = is_array($positionsFilter) ? $positionsFilter : [$positionsFilter];
            $matchingIds = $this->getFonctionnaireIdsWithLatestPosition($positionIds);

            if (!empty($matchingIds)) {
                $fonctionnairesQuery->whereIn('id', $matchingIds);
            } else {
                $fonctionnairesQuery->whereRaw('1 = 0');
            }
        } else {
            // No formations_position_id provided -> default to active only
            $fonctionnairesQuery->where('position_id', 2);
        }

        // Apply formations-specific category filter
        if ($request->filled('formations_categorie_cadre_id')) {
            $fonctionnairesQuery->whereHas('specialiteGrade.grade.cadre.categorie_cadre', function($query) use ($request) {
                $query->where('id', $request->formations_categorie_cadre_id);
            });
        }

        $collection = $fonctionnairesQuery->get();

        // Collect latest position ids for all fonctionnaires to avoid N+1 queries
        $latestPositionIds = $collection->map(function($f) {
            return $f->latest_position_id ?? $f->position_id;
        })->filter()->unique()->values()->toArray();

        $positionsMap = [];
        if (!empty($latestPositionIds)) {
            $positionsMap = Position::whereIn('id', $latestPositionIds)->pluck('nom', 'id')->toArray();
        }

        $fonctionnaires = $collection->map(function($fonctionnaire) use ($positionsMap) {
            $latestPosId = $fonctionnaire->latest_position_id ?? $fonctionnaire->position_id;
            $positionName = $latestPosId && isset($positionsMap[$latestPosId]) ? $positionsMap[$latestPosId] : ($fonctionnaire->position ? $fonctionnaire->position->nom : 'N/A');

            return [
                'ppr' => $fonctionnaire->ppr,
                'nom' => $fonctionnaire->nom,
                'prenom' => $fonctionnaire->prenom,
                'specialite_grade' => $fonctionnaire->specialiteGrade ? $fonctionnaire->specialiteGrade->nom : 'N/A',
                'cadre' => $fonctionnaire->specialiteGrade &&
                          $fonctionnaire->specialiteGrade->grade &&
                          $fonctionnaire->specialiteGrade->grade->cadre ?
                          $fonctionnaire->specialiteGrade->grade->cadre->nom : 'N/A',
                'position' => $positionName
            ];
        });

        return response()->json(['fonctionnaires' => $fonctionnaires]);
    }

    /**
     * Prepare formations data for export
     */
    private function prepareFormationsExportData($stats, $nomFormationSanitaires)
    {
        $exportData = [];

        foreach ($nomFormationSanitaires as $formation) {
            $formationStats = $stats['formations'][$formation->id] ?? null;

            if ($formationStats) {
                $row = [
                    'formation_name' => $formation->nom,
                    'formation_name_arabic' => $formation->nom_arabe,
                    'arrondissement' => $formationStats['arrondissement'],
                    'ville' => $formationStats['ville'],
                    'region' => $formationStats['region'],
                    'fonctionnaires_count' => $formationStats['fonctionnaires_count'],
                    'cadres' => implode(', ', $formationStats['cadres'] ?? []),
                    'specialite_grades' => implode(', ', array_map(function($spec) {
                        return $spec['name'] . ' (' . $spec['count'] . ')';
                    }, $formationStats['specialite_grades'] ?? []))
                ];

                $exportData[] = $row;
            }
        }

        return $exportData;
    }

    /**
     * Export formations data to Excel format using HTML table
     */
    private function exportFormationsToExcel($exportData)
    {
        $filename = 'formations_sanitaires_' . date('Y-m-d') . '.xls';

        $headers = [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Cache-Control' => 'max-age=0',
        ];

        $callback = function() use ($exportData) {
            echo '<html>';
            echo '<head>';
            echo '<meta charset="UTF-8">';
            echo '<style>';
            echo 'table { border-collapse: collapse; width: 100%; }';
            echo 'th, td { border: 1px solid #000; padding: 8px; text-align: left; }';
            echo 'th { background-color: #198754; color: white; font-weight: bold; }';
            echo '.center { text-align: center; }';
            echo '</style>';
            echo '</head>';
            echo '<body>';
            echo '<table>';

            // Headers
            echo '<tr>';
            echo '<th>Formation Sanitaire</th>';
            echo '<th>Nom Arabe</th>';
            echo '<th>Arrondissement/Commune</th>';
            echo '<th>Ville</th>';
            echo '<th>Région</th>';
            echo '<th>Fonctionnaires</th>';
            echo '<th>Cadres</th>';
            echo '<th>Spécialité-Grades</th>';
            echo '</tr>';

            // Data rows
            foreach ($exportData as $row) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['formation_name']) . '</td>';
                echo '<td>' . htmlspecialchars($row['formation_name_arabic']) . '</td>';
                echo '<td class="center">' . htmlspecialchars($row['arrondissement']) . '</td>';
                echo '<td class="center">' . htmlspecialchars($row['ville']) . '</td>';
                echo '<td class="center">' . htmlspecialchars($row['region']) . '</td>';
                echo '<td class="center">' . htmlspecialchars($row['fonctionnaires_count']) . '</td>';
                echo '<td>' . htmlspecialchars($row['cadres']) . '</td>';
                echo '<td>' . htmlspecialchars($row['specialite_grades']) . '</td>';
                echo '</tr>';
            }

            echo '</table>';
            echo '</body>';
            echo '</html>';
        };

        return response()->stream($callback, 200, $headers);
    }
}
