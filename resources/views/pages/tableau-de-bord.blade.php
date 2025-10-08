<x-head titre="Tableau de bord" />
<x-header />
<x-sidebar />

<!-- Block Principal -->

<div class="page-wrapper">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        .formation-card {
            transition: all 0.3s ease;
        }
        .formation-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .btn-details {
            transition: all 0.3s ease;
        }
        .btn-details:hover {
            transform: scale(1.05);
        }
        .stats-badge {
            font-weight: bold;
            font-size: 14px;
        }
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }
        /* Dashboard table styling */
        .db-table thead th {
            background-color: #1f2937; /* gray-800 */
            color: #fff;
            padding: 12px;
            font-weight: 700;
        }
        .db-table tbody td {
            padding: 12px;
            border-top: 1px solid #e5e7eb; /* gray-200 */
            vertical-align: middle;
        }
        .db-table tbody tr:nth-child(odd) { background-color: #ffffff; }
        .db-table tbody tr:nth-child(even) { background-color: #f8fafc; }
        .summary-badge { display:inline-block; padding:6px 10px; background:#f1f5f9; border-radius:999px; margin-right:6px; }
        .position-list .summary-badge { background:#eef2ff; }
    </style>

    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Tableau de bord</h4>
                    <h6 class="text-capitalize text-muted">Tableau de bord</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <form action="{{ route('tableau-de-bord.page') }}" method="get" class="d-flex align-items-center gap-2">
                        <div class="form-group">
                            <label for="date-range" class="form-label text-sm text-muted">Période:</label>
                            <input type="text" id="date-range" name="date_range" class="form-control"
                                placeholder="Sélectionner une période" style="width: 300px;" value="{{ request()->query('date_range') }}" />
                        </div>
                        <div class="form-group">
                            <label for="formation-select" class="form-label text-sm text-muted">Formation Sanitaire:</label>
                            <select name="nom_formation_sanitaire_id" id="formation-select" class="form-select" style="width: 350px;">
                                <option value="">🏥 Toutes les formations sanitaires</option>
                                @foreach (\App\Models\NomFormationSanitaire::with('arrondissement_commune.ville')->orderBy('nom')->get() as $nom_formation_sanitaire)
                                    @php $villeName = optional(optional($nom_formation_sanitaire->arrondissement_commune)->ville)->nom ?? 'N/A'; @endphp
                                    <option {{ request()->query('nom_formation_sanitaire_id') == $nom_formation_sanitaire->id ? 'selected' : '' }}
                                            value="{{ $nom_formation_sanitaire->id }}">
                                        {{ $nom_formation_sanitaire->nom }} - {{ $villeName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search me-2"></i>Filtrer
                        </button>
                        @if(request()->query('date_range') || request()->query('nom_formation_sanitaire_id'))
                            <a href="{{ route('tableau-de-bord.page') }}" class="btn btn-secondary">
                                <i class="fas fa-times me-2"></i>Réinitialiser
                            </a>
                        @endif
                    </form>
                </li>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        flatpickr("#date-range", {
                            mode: "range",
                            dateFormat: "Y-m-d"
                        });
                    });
                </script>
            </ul>

        </div>


   <!-- /product list -->
<div class="card table-list-card">
    <div class="card-body">
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div style="display: flex;gap: 20px;width: 100%;">
                    @php
                        // Get date range from URL parameters if it exists
                        $date_range = request()->query('date_range');
                        $start_date = null;
                        $end_date = null;

                        if ($date_range) {
                            $dates = explode(' to ', $date_range);
                            if (count($dates) == 2) {
                                $start_date = $dates[0];
                                $end_date = $dates[1];
                            }
                        }
                    @endphp
@if(!request()->query('nom_formation_sanitaire_id'))
<!-- Affichage de toutes les formations sanitaires -->
@php
    $totalFormations = \App\Models\NomFormationSanitaire::count();
@endphp
<div class="mb-8 shadow-lg rounded-lg overflow-hidden formation-card" style="width: 100%;">
    <div class="bg-green-600 px-6 py-2 text-white d-flex justify-content-between align-items-center">
        <h2 class="text-xl font-bold" style="font-size: 20px;margin: 10px;text-transform: uppercase;">
            <i class="fas fa-hospital me-2"></i>TOUTES LES FORMATIONS SANITAIRES
        </h2>
        <div class="text-right">
            <span class="badge bg-light text-dark stats-badge">{{ $totalFormations }} formations</span>
            @if($start_date && $end_date)
                <br><small>📅 Période: {{ $start_date }} au {{ $end_date }}</small>
            @endif
        </div>
    </div>

    <div class="p-4 bg-white">
    <table class="w-full border-collapse db-table">
                    <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-800 text-white text-left" style="font-weight: bold;font-size: 16px;">Formation Sanitaire</th>
                    <th class="px-4 py-2 bg-gray-800 text-white text-center" style="font-weight: bold;font-size: 16px;">Ville</th>
                    <th class="px-4 py-2 bg-gray-800 text-white text-center" style="font-weight: bold;font-size: 16px;">Type</th>
                    <th class="px-4 py-2 bg-gray-800 text-white text-center" style="font-weight: bold;font-size: 16px;">Effectif Total</th>
                    <th class="px-4 py-2 bg-gray-800 text-white text-center" style="font-weight: bold;font-size: 16px;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach (\App\Models\NomFormationSanitaire::with(['arrondissement_commune.ville', 'niveaucategorieformation.type_categorie_formation'])->orderBy('nom')->get() as $index => $formation)
                        <tr>
                    <td class="px-4 py-2 border-t border-gray-300 font-semibold">
                        {{ $formation->nom }}
                    </td>
                    <td class="px-4 py-2 text-center">
                        {{ optional(optional($formation->arrondissement_commune)->ville)->nom ?? 'N/A' }}
                    </td>
                    <td class="px-4 py-2 text-center">
                        <span class="px-2 py-1 rounded bg-blue-100 text-blue-800 text-sm">
                            {{ $formation->niveaucategorieformation->type_categorie_formation->nom ?? 'N/A' }}
                        </span>
                    </td>
                    <td class="px-4 py-2 text-center">
                        @php
                            // Build base query for fonctionnaires of this formation
                            $baseQuery = \App\Models\Fonctionnaire::where('nom_formation_sanitaire_id', $formation->id);
                            // Apply date filter if present
                            if ($start_date && $end_date) {
                                $baseQuery->whereBetween('date_prise_en_service', [$start_date, $end_date]);
                            }

                            // Get collection once and compute totals and breakdown by position
                            $formationFonctionnaires = $baseQuery->get();
                            $totalStaff = $formationFonctionnaires->count();

                            // Group by position_id and count
                            $positionCounts = $formationFonctionnaires->groupBy('position_id')->map(function($group) { return $group->count(); });
                            $positionNames = [];
                            if ($positionCounts->isNotEmpty()) {
                                $positionNames = \App\Models\Position::whereIn('id', $positionCounts->keys()->toArray())->pluck('nom', 'id');
                            }
                        @endphp

                        <div style="display:flex;flex-direction:column;align-items:center;gap:6px;">
                            <div>
                                <span class="summary-badge" style="font-weight:700;">Total: {{ $totalStaff }}</span>
                            </div>
                            @if($positionCounts->isNotEmpty())
                                <div class="position-list" style="text-align:left;">
                                    @foreach($positionCounts as $posId => $cnt)
                                        <span class="summary-badge">{{ $positionNames[$posId] ?? 'Pos #' . $posId }}: {{ $cnt }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </td>
                    <td class="px-4 py-2 text-center border-t border-gray-300">
                        <a href="{{ route('tableau-de-bord.page', ['nom_formation_sanitaire_id' => $formation->id, 'date_range' => request()->query('date_range')]) }}"
                           class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm btn-details">
                            <i class="fas fa-eye me-1"></i>Voir Détails
                        </a>
                    </td>
                </tr>
                @endforeach

                <!-- Total général -->
                @php
                    $grandTotalAll = 0;
                    foreach (\App\Models\NomFormationSanitaire::all() as $formation) {
                        $query = \App\Models\Fonctionnaire::where('nom_formation_sanitaire_id', $formation->id)
                            ->where('position_id', 2);

                        if ($start_date && $end_date) {
                            $query->whereBetween('date_prise_en_service', [$start_date, $end_date]);
                        }

                        $grandTotalAll += $query->count();
                    }
                @endphp
                <tr class="bg-green-600 text-white">
                    <td class="px-4 py-2 font-bold text-right" colspan="3">
                        <strong>TOTAL GÉNÉRAL TOUTES FORMATIONS:</strong>
                    </td>
                    <td class="px-4 py-2 font-bold text-center">
                        <strong>{{ $grandTotalAll }}</strong>
                    </td>
                    <td class="px-4 py-2"></td>
                </tr>
            </tbody>
        </table>
        <!-- Résumé par ville et position -->
        @php
            // Build query for fonctionnaires with same filters
            $fnQuery = \App\Models\Fonctionnaire::query();
            if ($start_date && $end_date) {
                $fnQuery->whereBetween('date_prise_en_service', [$start_date, $end_date]);
            }

            // If filtering by formation is not set, we include all formations
            // otherwise restriction is already handled in the other branch
            $fnQuery->with(['nomFormationSanitaire.arrondissement_commune.ville', 'position']);
            $allFonctionnaires = $fnQuery->get();

            $villeSummary = []; // ['Ville Name' => ['total' => int, 'positions' => ['Position Name'=>int]]]
                foreach ($allFonctionnaires as $f) {
                $villeName = optional(optional(optional($f->nomFormationSanitaire)->arrondissement_commune)->ville)->nom ?? 'Sans ville';
                $posName = $f->position?->nom ?? 'Inconnu';

                if (!isset($villeSummary[$villeName])) {
                    $villeSummary[$villeName] = ['total' => 0, 'positions' => []];
                }
                $villeSummary[$villeName]['total']++;
                if (!isset($villeSummary[$villeName]['positions'][$posName])) {
                    $villeSummary[$villeName]['positions'][$posName] = 0;
                }
                $villeSummary[$villeName]['positions'][$posName]++;
            }
        @endphp

        <div class="mt-6 p-4 bg-gray-50 rounded">
            <h4 class="mb-3" style="font-weight:700">Résumé par ville</h4>
            <div class="table-responsive">
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 bg-gray-800 text-white text-left">Ville</th>
                            <th class="px-4 py-2 bg-gray-800 text-white text-center">Total</th>
                            <th class="px-4 py-2 bg-gray-800 text-white text-left">Répartition par position</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($villeSummary as $ville => $data)
                            <tr class="{{ $loop->index % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}">
                                <td class="px-4 py-2">{{ $ville }}</td>
                                <td class="px-4 py-2 text-center font-bold">{{ $data['total'] }}</td>
                                <td class="px-4 py-2">
                                    @foreach($data['positions'] as $pos => $cnt)
                                        <span class="badge bg-light text-dark me-2">{{ $pos }}: {{ $cnt }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@elseif(request()->query('nom_formation_sanitaire_id'))
@php
$nom_formation_sanitaire = \App\Models\NomFormationSanitaire::find(request()->query('nom_formation_sanitaire_id'));
@endphp

<!-- Bouton retour -->
<div class="mb-4">
    <a href="{{ route('tableau-de-bord.page', ['date_range' => request()->query('date_range')]) }}"
       class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 btn-details">
        <i class="fas fa-arrow-left me-2"></i>Retour à toutes les formations
    </a>
</div>

    @if($nom_formation_sanitaire)
    <div class="mb-8 shadow-lg rounded-lg overflow-hidden" style="width: 50%;">
    <div class="bg-blue-600 px-6 py-2 text-white d-flex justify-content-between align-items-center">
        <h2 class="text-xl font-bold" style="font-size: 20px;margin: 10px;text-align: center;text-transform: uppercase;">{{ $nom_formation_sanitaire->nom }}</h2>
        <div class="text-sm">
            <span class="badge bg-light text-dark">{{ optional(optional($nom_formation_sanitaire->arrondissement_commune)->ville)->nom ?? 'N/A' }}</span>
        </div>
    </div>
    @else
    <div class="alert alert-warning">Formation sanitaire introuvable. Vérifiez la sélection.</div>
    @endif

    <div class="p-4 bg-white">
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-800 text-white text-left" style="font-weight: bold;font-size: 18px;"
                        colspan="2">Catégorie / Cadre</th>
                    <th class="px-4 py-2 bg-gray-800 text-white text-center" style="font-weight: bold;font-size: 18px;">Effectif
                    </th>
                </tr>
            </thead>
            <tbody>
                @php $lastCategory = null; @endphp

                @foreach (\App\Models\CategorieCadre::all() as $categorie_cadre)
                    @php
                        $cadres = \App\Models\Cadre::where(
                            'categorie_cadre_id',
                            $categorie_cadre->id,
                        )->get();
                        $cadreCount = count($cadres);
                    @endphp

                    @foreach ($cadres as $index => $cadre)
                        <tr class="{{ $index % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                            @if ($index === 0)
                                <td class="px-4 py-2 font-bold border-t border-gray-300"
                                    rowspan="{{ $cadreCount }}" style="background-color: #eaeaea;color: #000;font-weight: bold;">
                                    {{ $categorie_cadre->nom }}
                                </td>
                            @endif

                            <td class="px-4 py-2 border-t border-gray-300">
                                {{ $cadre->nom }}</td>

                            <td class="px-4 py-2 text-center border-t border-gray-300">
                                @php
                                    // Get grade cadres for this cadre
                                    $grade_cadres = \App\Models\GradeCadre::where(
                                        'cadre_id',
                                        $cadre->id,
                                    )->get();

                                    // Get specialite grades related to these grade cadres
                                    $specialite_grades = \App\Models\SpecialiteGrade::whereIn(
                                        'grade_id',
                                        $grade_cadres->pluck('id'),
                                    )->get();

                                    // Start building the query for fonctionnaires
                                    $query = \App\Models\Fonctionnaire::whereIn(
                                        'specialite_grade_id',
                                        $specialite_grades->pluck('id'),
                                    )
                                    ->where(
                                        'nom_formation_sanitaire_id',
                                        $nom_formation_sanitaire->id,
                                    )
                                    ->where('position_id', 2); // Add the position_id filter

                                    // Add date range filter if provided
                                    if ($start_date && $end_date) {
                                        $query->whereBetween('date_prise_en_service', [$start_date, $end_date]);
                                    }

                                    // Execute the query
                                    $fonctionnaires = $query->get();
                                    $count = $fonctionnaires->count();
                                @endphp

                                <span
                                    class="px-2 py-1 rounded {{ $count > 0 ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                    {{ $count }}
                                </span>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Add category total row -->
                    @php
                        $categoryTotal = 0;
                        foreach ($cadres as $cadre) {
                            $grade_cadres = \App\Models\GradeCadre::where(
                                'cadre_id',
                                $cadre->id,
                            )->get();

                            $specialite_grades = \App\Models\SpecialiteGrade::whereIn(
                                'grade_id',
                                $grade_cadres->pluck('id'),
                            )->get();

                            // Start building the query for fonctionnaires
                            $query = \App\Models\Fonctionnaire::whereIn(
                                'specialite_grade_id',
                                $specialite_grades->pluck('id'),
                            )
                            ->where(
                                'nom_formation_sanitaire_id',
                                $nom_formation_sanitaire->id,
                            )
                            ->where('position_id', 2); // Add the position_id filter

                            // Add date range filter if provided
                            if ($start_date && $end_date) {
                                $query->whereBetween('date_prise_en_service', [$start_date, $end_date]);
                            }

                            // Execute the query
                            $fonctionnaires = $query->get();
                            $categoryTotal += $fonctionnaires->count();
                        }
                    @endphp

                    <tr class="bg-gray-200">
                        <td class="px-4 py-2 font-bold text-right border-t border-gray-400" style="background-color: dodgerblue;color: white;"
                            colspan="2">
                           <strong> Total {{ $categorie_cadre->nom }}:</strong>
                        </td>
                        <td
                            class="px-4 py-2 font-bold text-center border-t border-gray-400" style="background-color: dodgerblue;color: white;">
                            <strong> {{ $categoryTotal }}</strong>
                        </td>
                    </tr>
                @endforeach

                <!-- Add grand total row -->
                @php
                    $grandTotal = 0;
                    foreach (\App\Models\CategorieCadre::all() as $categorie_cadre) {
                        $cadres = \App\Models\Cadre::where(
                            'categorie_cadre_id',
                            $categorie_cadre->id,
                        )->get();

                        foreach ($cadres as $cadre) {
                            $grade_cadres = \App\Models\GradeCadre::where(
                                'cadre_id',
                                $cadre->id,
                            )->get();

                            $specialite_grades = \App\Models\SpecialiteGrade::whereIn(
                                'grade_id',
                                $grade_cadres->pluck('id'),
                            )->get();

                            // Start building the query for fonctionnaires
                            $query = \App\Models\Fonctionnaire::whereIn(
                                'specialite_grade_id',
                                $specialite_grades->pluck('id'),
                            )
                            ->where(
                                'nom_formation_sanitaire_id',
                                $nom_formation_sanitaire->id,
                            )
                            ->where('position_id', 2); // Add the position_id filter

                            // Add date range filter if provided
                            if ($start_date && $end_date) {
                                $query->whereBetween('date_prise_en_service', [$start_date, $end_date]);
                            }

                            // Execute the query
                            $fonctionnaires = $query->get();
                            $grandTotal += $fonctionnaires->count();
                        }
                    }
                @endphp

                <tr class="bg-blue-600 text-white">
                    <td class="px-4 py-2 font-bold text-right" colspan="2">
                       <strong> TOTAL GÉNÉRAL:</strong>
                    </td>
                    <td class="px-4 py-2 font-bold text-center">
                        <strong> {{ $grandTotal }}</strong>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endif
                </div>
            </div>
        </section>
    </div>
</div>
        <!-- /product list -->
    </div>
</div>
<!-- Block Principal -->




{{-- datatable --}}


<x-foot />
