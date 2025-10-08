<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0">Relations Cadres - Statistiques Détaillées</h5>
            </div>
            <div class="card-body">
                <!-- Filtres -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title mb-3">
                                    <i class="fas fa-filter me-2"></i>Filtres
                                </h6>
                                <form id="cadreFiltersForm" method="GET">
                                    <div class="row">
                                        <!-- Dates de prise de service -->
                                        <div class="col-md-2">
                                            <label for="date_debut_service" class="form-label">Date début service</label>
                                            <input type="date" class="form-control" id="date_debut_service" name="date_debut_service"
                                                   value="{{ request('date_debut_service') }}">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="date_fin_service" class="form-label">Date fin service</label>
                                            <input type="date" class="form-control" id="date_fin_service" name="date_fin_service"
                                                   value="{{ request('date_fin_service') }}">
                                        </div>

                                        <!-- Filtre par Position -->
                                        <div class="col-md-2">
                                            <label for="position_filter" class="form-label">Position</label>
                                            <select class="form-select" id="position_filter" name="position_id">
                                                <option value="all" {{ (request('position_id') === null || request('position_id') === '' || request('position_id') === 'all') ? 'selected' : '' }}>Tous</option>
                                                @foreach($positions as $position)
                                                    <option value="{{ $position->id }}"
                                                            {{ request('position_id') == $position->id ? 'selected' : '' }}>
                                                        {{ $position->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Filtre par Catégorie Cadre -->
                                        <div class="col-md-3">
                                            <label for="categorie_cadre_filter" class="form-label">Catégorie Cadre</label>
                                            <select class="form-select" id="categorie_cadre_filter" name="categorie_cadre_id">
                                                <option value="">Tous</option>
                                                @foreach($categorieCadres as $categorieCadre)
                                                    <option value="{{ $categorieCadre->id }}"
                                                            {{ request('categorie_cadre_id') == $categorieCadre->id ? 'selected' : '' }}>
                                                        {{ $categorieCadre->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <!-- Filtre par Formation Sanitaire -->
                                        <div class="col-md-3">
                                            <label for="formation_sanitaire_filter" class="form-label">Formation Sanitaire</label>
                                            <select class="form-select" id="formation_sanitaire_filter" name="formation_sanitaire_id">
                                                <option value="">Tous</option>
                                                @foreach($nomFormationSanitaires as $formation)
                                                    <option value="{{ $formation->id }}"
                                                            {{ request('formation_sanitaire_id') == $formation->id ? 'selected' : '' }}>
                                                        {{ $formation->nom }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-3">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary me-2">
                                                <i class="fas fa-search me-1"></i>Filtrer
                                            </button>
                                            <a href="{{ route('statistics.detailed') }}#cadre" class="btn btn-secondary me-2">
                                                <i class="fas fa-times me-1"></i>Réinitialiser
                                            </a>

                                            <!-- Boutons d'export -->
                                            <div class="btn-group ms-3" role="group">
                                                <button type="button" class="btn btn-success" id="exportExcelBtn">
                                                    <i class="fas fa-file-excel me-1"></i>Export Excel
                                                </button>
                                                <button type="button" class="btn btn-danger" id="exportPdfBtn">
                                                    <i class="fas fa-file-pdf me-1"></i>Export PDF
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-warning text-dark">
                            <tr>
                                <th class="text-center fw-bold" style="vertical-align: middle;">
                                    <i class="fas fa-layer-group me-2"></i>Catégorie Cadre
                                </th>
                                <th class="text-center fw-bold" style="vertical-align: middle;">
                                    <i class="fas fa-users me-2"></i>Fonctionnaires
                                </th>
                                <th class="text-center fw-bold" style="vertical-align: middle;">
                                    <i class="fas fa-list me-2"></i>Noms de formations sanitaires
                                </th>
                                <th class="text-center fw-bold" style="vertical-align: middle;">
                                    <i class="fas fa-graduation-cap me-2"></i>Spécialité-Grades
                                </th>
                                <th class="text-center fw-bold" style="vertical-align: middle;">
                                    <i class="fas fa-cogs me-2"></i>Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorieCadres as $categorieCadre)
                                @php
                                    $categorieCadreStats = $stats['categorie_cadres'][$categorieCadre->id] ?? null;
                                @endphp
                                <tr class="categorie-cadre-row table-warning" data-categorie-cadre-id="{{ $categorieCadre->id }}" style="border-left: 4px solid #ffc107;">
                                    <td class="fw-bold text-dark" style="font-size: 1.1em;">
                                        <i class="fas fa-layer-group me-2 text-warning"></i>{{ $categorieCadre->nom }}
                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-warning px-3 py-2 text-dark">
                                            {{ $categorieCadreStats ? $categorieCadreStats['fonctionnaires_count'] : 0 }}
                                        </span>
                                    </td>
                                    <td class="text-start">
                                        @if($categorieCadreStats && !empty($categorieCadreStats['formation_names']))
                                            <div class="d-flex flex-wrap gap-1">
                                                @foreach($categorieCadreStats['formation_names'] as $formationName)
                                                    <span class="badge bg-light text-dark border border-primary">{{ $formationName }}</span>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-muted fst-italic">Aucune formation</span>
                                        @endif
                                    </td>
                                    <td class="text-start">
                                        @if($categorieCadreStats && !empty($categorieCadreStats['cadres']))
                                            <div class="d-flex flex-wrap gap-1">
                                                @foreach($categorieCadreStats['cadres'] as $cadreId => $cadreStats)
                                                    @if(!empty($cadreStats['grade_cadres']))
                                                        @foreach($cadreStats['grade_cadres'] as $gradeCadreId => $gradeCadreStats)
                                                            @if(!empty($gradeCadreStats['specialite_grades']))
                                                                @foreach($gradeCadreStats['specialite_grades'] as $specialiteGradeId => $specialiteGradeStats)
                                                                    @if(!empty($specialiteGradeStats['fonctionnaires_count']) && $specialiteGradeStats['fonctionnaires_count'] > 0)
                                                                        <span class="badge bg-success text-white">
                                                                            {{ $specialiteGradeStats['name'] }}
                                                                            <span class="badge bg-light text-dark ms-1">({{ $specialiteGradeStats['fonctionnaires_count'] }})</span>
                                                                        </span>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-muted fst-italic">Aucune spécialité</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-warning fw-bold toggle-categorie-cadre" data-categorie-cadre-id="{{ $categorieCadre->id }}">
                                            <i class="fas fa-plus-circle me-1"></i>Détails
                                        </button>
                                    </td>
                                </tr>

                                <!-- Cadres for this categorie (initially hidden) -->
                                @if($categorieCadreStats && !empty($categorieCadreStats['cadres']))
                                    @foreach($categorieCadreStats['cadres'] as $cadreId => $cadreStats)
                                        <tr class="cadre-row categorie-cadre-{{ $categorieCadre->id }}-detail table-info" style="display: none; border-left: 3px solid #0dcaf0;">
                                            <td class="ps-4 fw-bold text-info">
                                                <i class="fas fa-arrow-right me-2"></i>{{ $cadreStats['name'] }}
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-info px-3 py-2">
                                                    {{ $cadreStats['fonctionnaires_count'] }}
                                                </span>
                                            </td>
                                            <td class="text-start">
                                                @if(!empty($cadreStats['formation_names']))
                                                    <div class="d-flex flex-wrap gap-1">
                                                        @foreach($cadreStats['formation_names'] as $formationName)
                                                            <span class="badge bg-light text-info border border-info">{{ $formationName }}</span>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <span class="text-muted fst-italic">Aucune formation</span>
                                                @endif
                                            </td>
                                            <td class="text-start">
                                                @if(!empty($cadreStats['grade_cadres']))
                                                    <div class="d-flex flex-wrap gap-1">
                                                        @foreach($cadreStats['grade_cadres'] as $gradeCadreId => $gradeCadreStats)
                                                            @if(!empty($gradeCadreStats['specialite_grades']))
                                                                @foreach($gradeCadreStats['specialite_grades'] as $specialiteGradeId => $specialiteGradeStats)
                                                                    @if(!empty($specialiteGradeStats['fonctionnaires_count']) && $specialiteGradeStats['fonctionnaires_count'] > 0)
                                                                        <span class="badge bg-success text-white">
                                                                            {{ $specialiteGradeStats['name'] }}
                                                                            <span class="badge bg-light text-dark ms-1">({{ $specialiteGradeStats['fonctionnaires_count'] }})</span>
                                                                        </span>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <span class="text-muted fst-italic">Aucune spécialité</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-info fw-bold toggle-cadre" data-cadre-id="{{ $cadreId }}" data-categorie-cadre-id="{{ $categorieCadre->id }}">
                                                    <i class="fas fa-plus-circle me-1"></i>Grades
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Grade Cadres for this cadre (initially hidden) -->
                                        @if(!empty($cadreStats['grade_cadres']))
                                            @foreach($cadreStats['grade_cadres'] as $gradeCadreId => $gradeCadreStats)
                                                <tr class="grade-cadre-row cadre-{{ $cadreId }}-detail table-secondary" style="display: none; border-left: 2px solid #6c757d;">
                                                    <td class="ps-5 fw-bold text-secondary">
                                                        <i class="fas fa-arrow-right me-2"></i>{{ $gradeCadreStats['name'] }}
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge bg-secondary px-3 py-2">
                                                            {{ $gradeCadreStats['fonctionnaires_count'] }}
                                                        </span>
                                                    </td>
                                                    <td class="text-start">
                                                        @if(!empty($gradeCadreStats['formation_names']))
                                                            <div class="d-flex flex-wrap gap-1">
                                                                @foreach($gradeCadreStats['formation_names'] as $formationName)
                                                                    <span class="badge bg-light text-secondary border border-secondary">{{ $formationName }}</span>
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <span class="text-muted fst-italic">Aucune formation</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-start">
                                                        @if(!empty($gradeCadreStats['specialite_grades']))
                                                            <div class="d-flex flex-wrap gap-1">
                                                                @foreach($gradeCadreStats['specialite_grades'] as $specialiteGradeId => $specialiteGradeStats)
                                                                    @if(!empty($specialiteGradeStats['fonctionnaires_count']) && $specialiteGradeStats['fonctionnaires_count'] > 0)
                                                                        <span class="badge bg-success text-white">
                                                                            {{ $specialiteGradeStats['name'] }}
                                                                            <span class="badge bg-light text-dark ms-1">({{ $specialiteGradeStats['fonctionnaires_count'] }})</span>
                                                                        </span>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <span class="text-muted fst-italic">Aucune spécialité</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-sm btn-secondary fw-bold toggle-grade-cadre" data-grade-cadre-id="{{ $gradeCadreId }}" data-cadre-id="{{ $cadreId }}">
                                                            <i class="fas fa-plus-circle me-1"></i>Spécialités
                                                        </button>
                                                    </td>
                                                </tr>

                                                <!-- Specialite Grades for this grade cadre (initially hidden) -->
                                                @if(!empty($gradeCadreStats['specialite_grades']))
                                                    @foreach($gradeCadreStats['specialite_grades'] as $specialiteGradeId => $specialiteGradeStats)
                                                        @if(!empty($specialiteGradeStats['fonctionnaires_count']) && $specialiteGradeStats['fonctionnaires_count'] > 0)
                                                            <tr class="specialite-grade-row grade-cadre-{{ $gradeCadreId }}-detail table-success" style="display: none; border-left: 1px solid #198754;">
                                                                <td class="ps-6 fw-bold text-success">
                                                                    <i class="fas fa-graduation-cap me-2"></i>{{ $specialiteGradeStats['name'] }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <span class="badge bg-success px-3 py-2">
                                                                        {{ $specialiteGradeStats['fonctionnaires_count'] }}
                                                                    </span>
                                                                </td>
                                                                <td class="text-center">
                                                                    @if(!empty($specialiteGradeStats['formations']))
                                                                        <span class="badge bg-success px-2 py-1">
                                                                            <i class="fas fa-hospital me-1"></i>{{ count($specialiteGradeStats['formations']) }}
                                                                        </span>
                                                                    @else
                                                                        <span class="badge bg-light text-dark px-2 py-1 border">0</span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-start">
                                                                    @if(!empty($specialiteGradeStats['formations']))
                                                                        <div class="d-flex flex-column gap-2">
                                                                            @foreach($specialiteGradeStats['formations'] as $formation)
                                                                                <div class="border border-success rounded p-2 bg-light">
                                                                                    <div class="fw-bold text-success">{{ $formation['nom'] }}</div>
                                                                                    <small class="text-muted">
                                                                                        <i class="fas fa-map-marker-alt me-1"></i>{{ $formation['arrondissement'] }} - {{ $formation['ville'] }} - {{ $formation['region'] }}
                                                                                    </small>
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @else
                                                                        <span class="text-muted fst-italic">Aucune formation</span>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="bg-success text-white rounded p-2">
                                                                        <div class="fw-bold">{{ $specialiteGradeStats['name'] }}</div>
                                                                        <span class="badge bg-light text-success">{{ $specialiteGradeStats['fonctionnaires_count'] }} fonctionnaires</span>
                                                                    </div>
                                                                </td>
                                                                <td class="text-center">
                                                                    <button class="btn btn-sm btn-outline-success" disabled>
                                                                        <i class="fas fa-check-circle me-1"></i>Détail
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot class="bg-primary text-white">
                            <tr style="height: 60px;">
                                <th class="fw-bold fs-3" style="padding: 20px; font-size: 1.5rem !important;">
                                    <i class="fas fa-calculator me-3 fs-2"></i>TOTAUX GÉNÉRAUX
                                </th>
                                <th class="text-center" style="padding: 20px;">
                                    <span class="badge bg-light text-primary px-5 py-4 fs-2 fw-bold" style="font-size: 1.5rem !important;">
                                        <i class="fas fa-users me-3"></i>{{ $fonctionnaires->count() }}
                                    </span>
                                </th>
                                <!-- Noms de formations sanitaires: no total displayed -->
                                <th class="text-center" style="padding: 20px;">
                                    &nbsp;
                                </th>
                                <!-- Spécialité-Grades: total displayed (sum of fonctionnaires_count across specialite_grades) -->
                                @php
                                    $totalSpecialites = 0;
                                    if (!empty($stats['categorie_cadres'])) {
                                        foreach ($stats['categorie_cadres'] as $catStats) {
                                            if (!empty($catStats['cadres'])) {
                                                foreach ($catStats['cadres'] as $cadreStats) {
                                                    if (!empty($cadreStats['grade_cadres'])) {
                                                        foreach ($cadreStats['grade_cadres'] as $gradeStats) {
                                                            if (!empty($gradeStats['specialite_grades'])) {
                                                                foreach ($gradeStats['specialite_grades'] as $sp) {
                                                                    $count = isset($sp['fonctionnaires_count']) ? (int)$sp['fonctionnaires_count'] : 0;
                                                                    $totalSpecialites += $count;
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                @endphp
                                <th class="text-center" style="padding: 20px;">
                                    <span class="badge bg-light text-primary px-4 py-3 fs-3 fw-bold" style="font-size: 1.3rem !important;">
                                        <i class="fas fa-graduation-cap me-2"></i>{{ $totalSpecialites }}
                                    </span>
                                </th>
                                <!-- Actions column: no total -->
                                <th class="text-center" style="padding: 20px;">
                                    &nbsp;
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle categorie cadre details
        document.querySelectorAll('.toggle-categorie-cadre').forEach(function(button) {
            button.addEventListener('click', function() {
                const categorieCadreId = this.getAttribute('data-categorie-cadre-id');
                const detailRows = document.querySelectorAll(`.categorie-cadre-${categorieCadreId}-detail`);

                detailRows.forEach(function(row) {
                    if (row.style.display === 'none') {
                        row.style.display = 'table-row';
                        button.innerHTML = '<i class="fas fa-minus-circle"></i> Masquer';
                    } else {
                        row.style.display = 'none';
                        button.innerHTML = '<i class="fas fa-plus-circle"></i> Détails';

                        // Close all nested details
                        const cadreId = row.getAttribute('data-cadre-id');
                        if (cadreId) {
                            document.querySelectorAll(`.cadre-${cadreId}-detail`).forEach(function(cadreRow) {
                                cadreRow.style.display = 'none';

                                // Also reset the button text
                                const cadreButtons = document.querySelectorAll(`.toggle-cadre[data-cadre-id="${cadreId}"]`);
                                cadreButtons.forEach(function(cadreButton) {
                                    cadreButton.innerHTML = '<i class="fas fa-plus-circle"></i> Grades';
                                });
                            });
                        }
                    }
                });
            });
        });

        // Toggle cadre details
        document.querySelectorAll('.toggle-cadre').forEach(function(button) {
            button.addEventListener('click', function() {
                const cadreId = this.getAttribute('data-cadre-id');
                const detailRows = document.querySelectorAll(`.cadre-${cadreId}-detail`);

                detailRows.forEach(function(row) {
                    if (row.style.display === 'none') {
                        row.style.display = 'table-row';
                        button.innerHTML = '<i class="fas fa-minus-circle"></i> Masquer Grades';
                    } else {
                        row.style.display = 'none';
                        button.innerHTML = '<i class="fas fa-plus-circle"></i> Grades';

                        // Close any grade-cadre details
                        const gradeCadreId = row.getAttribute('data-grade-cadre-id');
                        if (gradeCadreId) {
                            document.querySelectorAll(`.grade-cadre-${gradeCadreId}-detail`).forEach(function(gradeCadreRow) {
                                gradeCadreRow.style.display = 'none';

                                // Also reset the button text
                                const gradeCadreButtons = document.querySelectorAll(`.toggle-grade-cadre[data-grade-cadre-id="${gradeCadreId}"]`);
                                gradeCadreButtons.forEach(function(gradeCadreButton) {
                                    gradeCadreButton.innerHTML = '<i class="fas fa-plus-circle"></i> Spécialités';
                                });
                            });
                        }
                    }
                });
            });
        });

        // Toggle grade cadre details
        document.querySelectorAll('.toggle-grade-cadre').forEach(function(button) {
            button.addEventListener('click', function() {
                const gradeCadreId = this.getAttribute('data-grade-cadre-id');
                const detailRows = document.querySelectorAll(`.grade-cadre-${gradeCadreId}-detail`);

                detailRows.forEach(function(row) {
                    if (row.style.display === 'none') {
                        row.style.display = 'table-row';
                        button.innerHTML = '<i class="fas fa-minus-circle"></i> Masquer Spécialités';
                    } else {
                        row.style.display = 'none';
                        button.innerHTML = '<i class="fas fa-plus-circle"></i> Spécialités';
                    }
                });
            });
        });

        // Handle filters form submission
        document.getElementById('cadreFiltersForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get current URL and add filters as hash parameters
            const formData = new FormData(this);
            const params = new URLSearchParams();

            for (let [key, value] of formData.entries()) {
                if (value) {
                    params.append(key, value);
                }
            }

            // Redirect to the same page with filters and cadre tab active
            const baseUrl = window.location.pathname;
            const queryString = params.toString();
            const newUrl = baseUrl + (queryString ? '?' + queryString : '') + '#cadre';

            window.location.href = newUrl;
        });

        // Auto-activate cadre tab if there are filter parameters
        const urlParams = new URLSearchParams(window.location.search);
        const hasFilters = urlParams.has('date_debut_service') ||
                          urlParams.has('date_fin_service') ||
                          urlParams.has('position_id') ||
                          urlParams.has('categorie_cadre_id') ||
                          urlParams.has('formation_sanitaire_id');

        if (hasFilters) {
            // Activate cadre tab
            const cadreTab = document.getElementById('cadre-tab');
            const cadrePane = document.getElementById('cadre');

            if (cadreTab && cadrePane) {
                // Remove active from other tabs
                document.querySelectorAll('#statisticsTabs .nav-link').forEach(tab => {
                    tab.classList.remove('active');
                    tab.setAttribute('aria-selected', 'false');
                });
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                });

                // Activate cadre tab
                cadreTab.classList.add('active');
                cadreTab.setAttribute('aria-selected', 'true');
                cadrePane.classList.add('show', 'active');
            }
        }

        // Handle Excel export
        document.getElementById('exportExcelBtn').addEventListener('click', function() {
            const form = document.getElementById('cadreFiltersForm');
            const fd = new FormData(form);
            const pos = fd.get('position_id');
            if (!pos || pos === '') fd.set('position_id', 'all');

            const params = new URLSearchParams(fd);

            // Add export format parameter
            params.append('export', 'excel');

            // Create download link
            const exportUrl = '{{ route("statistics.export-cadres") }}?' + params.toString();
            window.open(exportUrl, '_blank');
        });

        // Handle PDF export
        document.getElementById('exportPdfBtn').addEventListener('click', function() {
            const form = document.getElementById('cadreFiltersForm');
            const fd = new FormData(form);
            const pos = fd.get('position_id');
            if (!pos || pos === '') fd.set('position_id', 'all');

            const params = new URLSearchParams(fd);

            // Add export format parameter
            params.append('export', 'pdf');

            // Create download link
            const exportUrl = '{{ route("statistics.export-cadres") }}?' + params.toString();
            window.open(exportUrl, '_blank');
        });
    });
</script>
