<div class="row mb-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h5 class="mb-0">Formations Sanitaires - Statistiques Détaillées</h5>
            </div>
            <div class="card-body">

                <!-- Formations Sanitaires -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="border-bottom pb-2 mb-0">Noms de formations sanitaires</h6>
                    <div class="d-flex gap-2">
                        <button id="exportFormationsExcelBtn" class="btn btn-success fw-bold">
                            <i class="fas fa-file-excel me-2"></i>Export Excel
                        </button>
                        <button id="exportFormationsPdfBtn" class="btn btn-danger fw-bold">
                            <i class="fas fa-file-pdf me-2"></i>Export PDF
                        </button>
                    </div>
                </div>

                <!-- Filtres pour Formations Sanitaires -->
                <div class="card mb-4">
                    <div class="card-header bg-success text-white">
                        <h6 class="mb-0"><i class="fas fa-filter me-2"></i>Filtres de recherche</h6>
                    </div>
                    <div class="card-body">
                        <form id="formationsFilterForm" method="GET">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="formations_date_debut_service" class="form-label fw-bold">
                                        <i class="fas fa-calendar-alt me-1"></i>Date début service
                                    </label>
                                    <input type="date" class="form-control" id="formations_date_debut_service"
                                           name="formations_date_debut_service" value="{{ request('formations_date_debut_service') }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="formations_date_fin_service" class="form-label fw-bold">
                                        <i class="fas fa-calendar-alt me-1"></i>Date fin service
                                    </label>
                                    <input type="date" class="form-control" id="formations_date_fin_service"
                                           name="formations_date_fin_service" value="{{ request('formations_date_fin_service') }}">
                                </div>
                                <div class="col-md-2">
                                    <label for="formations_position_id" class="form-label fw-bold">
                                        <i class="fas fa-user-tag me-1"></i>Position
                                    </label>
                                    <select class="form-select" id="formations_position_id" name="formations_position_id">
                                        <option value="all" {{ (request('formations_position_id') === null || request('formations_position_id') === '' || request('formations_position_id') === 'all') ? 'selected' : '' }}>Tous</option>
                                        @foreach($positions as $position)
                                            <option value="{{ $position->id }}"
                                                {{ request('formations_position_id') == $position->id ? 'selected' : '' }}>
                                                {{ $position->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="formations_categorie_cadre_id" class="form-label fw-bold">
                                        <i class="fas fa-layer-group me-1"></i>Catégorie Cadre
                                    </label>
                                    <select class="form-select" id="formations_categorie_cadre_id" name="formations_categorie_cadre_id">
                                        <option value="">Tous</option>
                                        @foreach($categorieCadres as $categorieCadre)
                                            <option value="{{ $categorieCadre->id }}"
                                                {{ request('formations_categorie_cadre_id') == $categorieCadre->id ? 'selected' : '' }}>
                                                {{ $categorieCadre->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="formations_formation_sanitaire_id" class="form-label fw-bold">
                                        <i class="fas fa-hospital me-1"></i>Formation Sanitaire
                                    </label>
                                    <select class="form-select" id="formations_formation_sanitaire_id" name="formations_formation_sanitaire_id">
                                        <option value="">Tous</option>
                                        @foreach($nomFormationSanitaires as $formation)
                                            <option value="{{ $formation->id }}"
                                                {{ request('formations_formation_sanitaire_id') == $formation->id ? 'selected' : '' }}>
                                                {{ $formation->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success fw-bold me-2">
                                        <i class="fas fa-search me-2"></i>Filtrer
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary fw-bold" id="resetFormationsFilters">
                                        <i class="fas fa-times me-2"></i>Réinitialiser
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="bg-success text-white">
                            <tr>
                                <th class="text-center fw-bold" style="vertical-align: middle;">
                                    <i class="fas fa-hospital me-2"></i>Formation Sanitaire
                                </th>
                                <th class="text-center fw-bold" style="vertical-align: middle;">
                                    <i class="fas fa-map-marker-alt me-2"></i>Arrondissement/Commune
                                </th>
                                <th class="text-center fw-bold" style="vertical-align: middle;">
                                    <i class="fas fa-city me-2"></i>Ville
                                </th>
                                <!-- Region column removed as requested -->
                                <th class="text-center fw-bold" style="vertical-align: middle;">
                                    <i class="fas fa-users me-2"></i>Fonctionnaires
                                </th>
                                <th class="text-center fw-bold" style="vertical-align: middle;">
                                    <i class="fas fa-layer-group me-2"></i>Cadres
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
                            @foreach($nomFormationSanitaires as $formation)
                                @php
                                    $formationStats = $stats['formations'][$formation->id] ?? null;
                                @endphp
                                <tr class="formation-row table-success" data-formation-id="{{ $formation->id }}" style="border-left: 4px solid #198754;">
                                    <td class="fw-bold">
                                        {{ $formation->nom }}
                                        @if($formation->nom_arabe)
                                            <br><small class="text-muted">{{ $formation->nom_arabe }}</small>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $formationStats ? $formationStats['arrondissement'] : 'N/A' }}</td>
                                    <td class="text-center">{{ $formationStats ? $formationStats['ville'] : 'N/A' }}</td>
                                    <!-- Region column removed -->
                                    <td class="text-center">
                                        <span class="badge bg-success px-3 py-2">
                                            {{ $formationStats ? $formationStats['fonctionnaires_count'] : 0 }}
                                        </span>
                                    </td>
                                    <td class="text-start">
                                        @if($formationStats && !empty($formationStats['cadres']))
                                            <div class="d-flex flex-wrap gap-1">
                                                @foreach($formationStats['cadres'] as $cadre)
                                                    <span class="badge bg-warning text-dark">{{ $cadre }}</span>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-muted fst-italic">Aucun cadre</span>
                                        @endif
                                    </td>
                                    <td class="text-start">
                                        @if($formationStats && !empty($formationStats['specialite_grades']))
                                            <div class="d-flex flex-wrap gap-1">
                                                @foreach($formationStats['specialite_grades'] as $specialite)
                                                    <span class="badge bg-success text-white">
                                                        {{ $specialite['name'] }}
                                                        <span class="badge bg-light text-dark ms-1">({{ $specialite['count'] }})</span>
                                                    </span>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-muted fst-italic">Aucune spécialité</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-success toggle-formation-details" data-formation-id="{{ $formation->id }}">
                                            <i class="fas fa-plus-circle"></i> Détails
                                        </button>
                                    </td>
                                </tr>

                                <!-- Ligne de détails des fonctionnaires (initialement cachée) -->
                                <tr class="formation-details formation-{{ $formation->id }}-details" style="display: none; background-color: #f8f9fa;">
                                    <td colspan="7">
                                        <div class="p-4">
                                            <h6 class="text-success fw-bold mb-3">
                                                <i class="fas fa-users me-2"></i>Fonctionnaires de {{ $formation->nom }}
                                            </h6>
                                            <div class="table-responsive">
                                                <table class="table table-sm table-striped">
                                                    <thead class="bg-success text-white">
                                                        <tr>
                                                            <th>PPR</th>
                                                            <th>Nom</th>
                                                            <th>Prénom</th>
                                                            <th>Spécialité-Grade</th>
                                                            <th>Cadre</th>
                                                            <th>Type Positions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fonctionnaires-list" data-formation-id="{{ $formation->id }}">
                                                        <!-- Les données seront chargées via AJAX -->
                                                        <tr>
                                                            <td colspan="6" class="text-center">
                                                                <div class="spinner-border text-success" role="status">
                                                                    <span class="visually-hidden">Chargement...</span>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-primary text-white">
                            <tr style="height: 60px;">
                                <th class="fw-bold fs-3" style="padding: 20px; font-size: 1.5rem !important;">
                                    <i class="fas fa-calculator me-3 fs-2"></i>TOTAUX GÉNÉRAUX
                                </th>
                                <!-- Arrondissement/Commune: no total -->
                                <th class="text-center" style="padding: 20px;">&nbsp;</th>
                                <!-- Ville: no total -->
                                <th class="text-center" style="padding: 20px;">&nbsp;</th>
                                <!-- Fonctionnaires total -->
                                <th class="text-center" style="padding: 20px;">
                                    <span class="badge bg-light text-primary px-5 py-4 fs-2 fw-bold" style="font-size: 1.5rem !important;">
                                        <i class="fas fa-users me-3"></i>{{ $fonctionnaires->count() }}
                                    </span>
                                </th>
                                <!-- Cadres total (filtered) -->
                                @php
                                    $totalCadresFiltered = collect($stats['formations'] ?? [])->pluck('cadres')->flatten()->unique()->filter()->count();
                                @endphp
                                <th class="text-center" style="padding: 20px;">
                                    <span class="badge bg-light text-primary px-4 py-3 fs-3 fw-bold" style="font-size: 1.3rem !important;">
                                        <i class="fas fa-layer-group me-2"></i>{{ $totalCadresFiltered }}
                                    </span>
                                </th>
                                <!-- Spécialité-Grades total (filtered) -->
                                @php
                                    // Sum the counts of specialities across filtered formations (sum of 'count' values)
                                    $totalSpecialitesFiltered = collect($stats['formations'] ?? [])->pluck('specialite_grades')
                                        ->flatten(1)
                                        ->pluck('count')
                                        ->map(function($v) { return is_numeric($v) ? (int) $v : 0; })
                                        ->sum();
                                @endphp
                                <th class="text-center" style="padding: 20px;">
                                    <span class="badge bg-light text-primary px-4 py-3 fs-3 fw-bold" style="font-size: 1.3rem !important;">
                                        <i class="fas fa-graduation-cap me-2"></i>{{ $totalSpecialitesFiltered }}
                                    </span>
                                </th>
                                <!-- Actions: no total -->
                                <th class="text-center" style="padding: 20px;">&nbsp;</th>
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

        // Toggle formation details (fonctionnaires)
        document.querySelectorAll('.toggle-formation-details').forEach(function(button) {
            button.addEventListener('click', function() {
                const formationId = this.getAttribute('data-formation-id');
                const detailRow = document.querySelector(`.formation-${formationId}-details`);
                const fonctionnairesList = document.querySelector(`.fonctionnaires-list[data-formation-id="${formationId}"]`);

                if (detailRow.style.display === 'none') {
                    detailRow.style.display = 'table-row';
                    button.innerHTML = '<i class="fas fa-eye-slash me-2"></i>Masquer Fonctionnaires';

                    // Load fonctionnaires data via AJAX, include current filters
                    loadFonctionnaires(formationId, fonctionnairesList);
                } else {
                    detailRow.style.display = 'none';
                    button.innerHTML = '<i class="fas fa-eye me-2"></i>Voir Fonctionnaires';
                }
            });
        });

        // Export buttons
                    document.getElementById('exportFormationsExcelBtn').addEventListener('click', function() {
            const form = document.getElementById('formationsFilterForm');
            const formData = new FormData(form);
            // Normalize 'formations_position_id' -> send 'all' when empty
            const pos = formData.get('formations_position_id');
            if (!pos || pos === '') formData.set('formations_position_id', 'all');

            const params = new URLSearchParams(formData);
            params.set('export', 'excel');

            const exportUrl = '/statistics/export-formations?' + params.toString();
            window.open(exportUrl, '_blank');
        });

        document.getElementById('exportFormationsPdfBtn').addEventListener('click', function() {
            const form = document.getElementById('formationsFilterForm');
            const formData = new FormData(form);
            const pos = formData.get('formations_position_id');
            if (!pos || pos === '') formData.set('formations_position_id', 'all');

            const params = new URLSearchParams(formData);
            params.set('export', 'pdf');

            const exportUrl = '/statistics/export-formations?' + params.toString();
            window.open(exportUrl, '_blank');
        });

        // Reset filters button
        document.getElementById('resetFormationsFilters').addEventListener('click', function() {
            document.getElementById('formationsFilterForm').reset();
            // Redirect to page without filters
            window.location.href = window.location.pathname;
        });
    });

    // Function to load fonctionnaires data
    function loadFonctionnaires(formationId, container) {
        // Build query params from the formations filter form
        const form = document.getElementById('formationsFilterForm');
        const fd = new FormData(form);
        const pos = fd.get('formations_position_id');
        if (!pos || pos === '') fd.set('formations_position_id', 'all');
        const params = new URLSearchParams(fd);
        const url = `/statistics/formation-fonctionnaires/${formationId}?` + params.toString();

        fetch(url)
            .then(response => response.json())
            .then(data => {
                let html = '';
                if (data.fonctionnaires && data.fonctionnaires.length > 0) {
                    data.fonctionnaires.forEach(function(fonctionnaire) {
                        html += `
                            <tr>
                                <td class="fw-bold text-primary">${fonctionnaire.ppr || 'N/A'}</td>
                                <td class="fw-bold">${fonctionnaire.nom || 'N/A'}</td>
                                <td class="fw-bold">${fonctionnaire.prenom || 'N/A'}</td>
                                <td><span class="badge bg-success">${fonctionnaire.specialite_grade || 'N/A'}</span></td>
                                <td><span class="badge bg-warning text-dark">${fonctionnaire.cadre || 'N/A'}</span></td>
                                <td><span class="badge bg-secondary text-white">${fonctionnaire.position || 'N/A'}</span></td>
                            </tr>
                        `;
                    });
                } else {
                    html = '<tr><td colspan="5" class="text-center text-muted">Aucun fonctionnaire trouvé</td></tr>';
                }
                container.innerHTML = html;
            })
            .catch(error => {
                console.error('Erreur:', error);
                container.innerHTML = '<tr><td colspan="5" class="text-center text-danger">Erreur lors du chargement</td></tr>';
            });
    }
</script>
