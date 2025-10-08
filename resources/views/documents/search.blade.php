@include('components.head', ['titre' => 'Recherche Globale de Documents'])

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

        @include('components.header')

        @include('components.sidebar')

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content">
                <div class="page-header">
                    <div class="add-item d-flex">
                        <div class="page-title">
                            <h4>Recherche Globale de Documents</h4>
                            <h6>Rechercher dans tous les documents des fonctionnaires</h6>
                        </div>
                    </div>
                </div>

                <!-- Search Form -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <form id="searchForm">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <label>Terme de recherche</label>
                                                <input type="text" id="searchQuery" name="query"
                                                       placeholder="Nom, prénom, matricule..."
                                                       class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <label>Type de document</label>
                                                <select id="documentType" name="document_type" class="form-control">
                                                    <option value="all">Tous les documents</option>
                                                    <option value="conge">Congés</option>
                                                    <option value="greve">Listes de grève</option>
                                                    <option value="certificate">Certificats</option>
                                                    <option value="attestation">Attestations</option>
                                                    <option value="mutation">Mutations</option>
                                                    <option value="position">Positions</option>
                                                    <option value="fonctionnaire">Fonctionnaires</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <label>&nbsp;</label>
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    <i class="fa fa-search"></i> Rechercher
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <label>&nbsp;</label>
                                                <a href="{{ route('documents.export-conges-form') }}"
                                                   class="btn btn-success btn-block">
                                                    <i class="fa fa-download"></i> Export Congés
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-sm-6 col-12">
                                            <div class="input-blocks">
                                                <label>&nbsp;</label>
                                                <button type="button" id="openGreveListBtn" class="btn btn-warning btn-block" data-bs-toggle="modal" data-bs-target="#greveListModal">
                                                    <i class="fa fa-list"></i> Listes grève
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Loading Indicator -->
                <div id="loadingIndicator" class="text-center" style="display: none;">
                    <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Recherche en cours...</span>
                    </div>
                    <p class="mt-2">Recherche en cours...</p>
                </div>

                <!-- Search Results -->
                <div id="searchResults" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title mb-0">
                                    <i class="fa fa-file-text"></i> Résultats de la recherche
                                    <span id="resultsCount" class="badge badge-primary ml-2">0</span>
                                </h5>
                                <button id="printResultsBtn" class="btn btn-success btn-sm" style="display: none;" onclick="printSearchResults()">
                                    <i class="fa fa-print"></i> Imprimer les résultats
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="resultsContainer">
                                <!-- Results will be populated here -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- No Results Message -->
                <div id="noResults" class="card" style="display: none;">
                    <div class="card-body text-center">
                        <i class="fa fa-search fa-3x text-muted mb-3"></i>
                        <h5>Aucun résultat trouvé</h5>
                        <p class="text-muted">Essayez avec d'autres termes de recherche ou changez le type de document.</p>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">
                                    <i class="fa fa-bolt"></i> Actions Rapides
                                </h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                        <div class="quick-action-card">
                                            <div class="card border-left-primary">
                                                <div class="card-body">
                                                    <h6><i class="fa fa-calendar text-primary"></i> Congés</h6>
                                                    <p class="text-muted small">Rechercher les décisions de congé</p>
                                                    <button class="btn btn-sm btn-outline-primary"
                                                            onclick="setDocumentType('conge')">
                                                        Rechercher
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                        <div class="quick-action-card">
                                            <div class="card border-left-success">
                                                <div class="card-body">
                                                    <h6><i class="fa fa-certificate text-success"></i> Certificats</h6>
                                                    <p class="text-muted small">Rechercher les certificats</p>
                                                    <button class="btn btn-sm btn-outline-success"
                                                            onclick="setDocumentType('certificate')">
                                                        Rechercher
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                        <div class="quick-action-card">
                                            <div class="card border-left-info">
                                                <div class="card-body">
                                                    <h6><i class="fa fa-file-text text-info"></i> Attestations</h6>
                                                    <p class="text-muted small">Générer attestations de travail</p>
                                                    <button class="btn btn-sm btn-outline-info"
                                                            onclick="setDocumentType('attestation')">
                                                        Rechercher
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 mb-3">
                                        <div class="quick-action-card">
                                            <div class="card border-left-warning">
                                                <div class="card-body">
                                                    <h6><i class="fa fa-exchange text-warning"></i> Mutations</h6>
                                                    <p class="text-muted small">Consulter notes de mutation</p>
                                                    <button class="btn btn-sm btn-outline-warning"
                                                            onclick="setDocumentType('mutation')">
                                                        Rechercher
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->

    <!-- Form Modal for Congé Decision -->
    <div class="modal fade" id="congeDecisionModal" tabindex="-1" aria-labelledby="congeDecisionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="congeDecisionModalLabel">Sélectionner les ampliations</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="congeDecisionForm" method="POST" target="_blank">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Veuillez sélectionner les ampliations à inclure dans le document :</label>
                            <div class="checkbox-group">
                                <div class="form-check">
                                    <input type="checkbox" name="ampliations[]" value="M. Medecin Chef du SRES de Fes" class="form-check-input" id="amp1">
                                    <label class="form-check-label" for="amp1">M. Medecin Chef du SRES de Fes</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="ampliations[]" value="M. directeur CHR alghassani Fes" class="form-check-input" id="amp2">
                                    <label class="form-check-label" for="amp2">M. directeur CHR alghassani Fes</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="ampliations[]" value="M. directeur Hopital ibn khatib" class="form-check-input" id="amp3">
                                    <label class="form-check-label" for="amp3">M. directeur Hopital ibn khatib</label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="ampliations[]" value="M. directeur Hopital ibn baytar" class="form-check-input" id="amp4">
                                    <label class="form-check-label" for="amp4">M. directeur Hopital ibn baytar</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Générer PDF</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal for Note de Service -->
    <div class="modal fade" id="noteServiceModal" tabindex="-1" aria-labelledby="noteServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="noteServiceModalLabel">Générer Note de Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="noteServiceForm" method="POST" target="_blank">
                    @csrf
                    <input type="hidden" name="fonctionnaire_id" id="noteServiceFonctionnaireId">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Fonctionnaire :</label>
                            <input type="text" id="noteServiceFonctionnaireName" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Sélectionner l'ampliation (destination) :</label>
                            <select name="ampliation_destination" class="form-control" required>
                                <option value="">Choisir la destination...</option>
                                <option value="M. Medecin Chef du SRES de Fes">M. Medecin Chef du SRES de Fes</option>
                                <option value="M. directeur CHR alghassani Fes">M. directeur CHR alghassani Fes</option>
                                <option value="M. directeur Hopital ibn khatib">M. directeur Hopital ibn khatib</option>
                                <option value="M. directeur Hopital ibn baytar">M. directeur Hopital ibn baytar</option>
                                <option value="M. directeur CDTMR Bendebab">M. directeur CDTMR Bendebab</option>
                                <option value="M. directeur Centre de Santé Urbain">M. directeur Centre de Santé Urbain</option>
                                <option value="M. directeur Centre de Santé Rural">M. directeur Centre de Santé Rural</option>
                            </select>
                            <div class="form-text">
                                Cette destination sera mentionnée dans la note : "l'intéressé doit se présenter à [destination choisie]"
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-warning">Générer Note de Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('components.foot')

    <!-- Modal pour la recherche de grèves -->
    <div class="modal fade" id="greveListModal" tabindex="-1" aria-labelledby="greveListModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="greveListModalLabel">
                        <i class="fa fa-list"></i> Listes des grèves
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire de recherche -->
                    <form id="greveSearchForm">
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="date_debut_greve" class="form-label">Date début</label>
                                <input type="date" id="date_debut_greve" name="date_debut" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="date_fin_greve" class="form-label">Date fin</label>
                                <input type="date" id="date_fin_greve" name="date_fin" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label>&nbsp;</label>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i> Rechercher
                                    </button>
                                            <button type="button" id="exportGreveBtn" class="btn btn-success" style="display: none;">
                                                <i class="fa fa-download"></i> Export Excel
                                            </button>
                                            <button type="button" id="exportGrevePdfBtn" class="btn btn-secondary" style="display: none;">
                                                <i class="fa fa-file-pdf-o"></i> Export PDF
                                            </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Loading indicator -->
                    <div id="greveLoadingIndicator" class="text-center" style="display: none;">
                        <div class="spinner-border text-primary" role="status">
                            <span class="sr-only">Recherche en cours...</span>
                        </div>
                        <p class="mt-2">Recherche des grèves en cours...</p>
                    </div>

                    <!-- Résultats -->
                    <div id="greveResults" style="display: none;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="mb-0">
                                Résultats: <span id="greveResultsCount" class="badge bg-primary">0</span> grève(s) trouvée(s)
                            </h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="greveTable">
                                <thead class="table-dark">
                                    <tr>
                                        <th>PPR</th>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Position</th>
                                        <th>Date début</th>
                                        <th>Date fin</th>
                                        <th>Nombre jours</th>
                                        <th>Formation sanitaire</th>
                                        <th>Remarque</th>
                                    </tr>
                                </thead>
                                <tbody id="greveTableBody">
                                    <!-- Les résultats seront insérés ici -->
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Message si aucun résultat -->
                    <div id="greveNoResults" class="alert alert-info" style="display: none;">
                        <i class="fa fa-info-circle"></i> Aucune grève trouvée pour la période sélectionnée.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Search form submission
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();
                performSearch();
            });

            // Real-time search on input change (with debounce)
            let searchTimeout;
            $('#searchQuery').on('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(function() {
                    if ($('#searchQuery').val().length >= 2) {
                        performSearch();
                    }
                }, 500);
            });

            // Fallback: ensure the greve modal opens when button clicked (in case data-bs attributes fail)
            $('#openGreveListBtn').on('click', function() {
                const modalEl = document.getElementById('greveListModal');
                if (modalEl) {
                    const modal = new bootstrap.Modal(modalEl);
                    modal.show();
                }
            });
        });

        function performSearch() {
            const query = $('#searchQuery').val();
            const documentType = $('#documentType').val();

            if (query.length < 2) {
                $('#searchResults, #noResults').hide();
                return;
            }

            // Show loading
            $('#loadingIndicator').show();
            $('#searchResults, #noResults').hide();

            // Perform AJAX search
            $.ajax({
                url: '{{ route("documents.search.post") }}',
                method: 'POST',
                data: {
                    query: query,
                    document_type: documentType,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    $('#loadingIndicator').hide();

                    if (response.success && response.results.length > 0) {
                        displayResults(response.results);
                        $('#searchResults').show();
                        $('#noResults').hide();
                        $('#printResultsBtn').show();
                        // Store results globally for printing
                        window.searchResults = response.results;
                        window.searchQuery = query;
                        window.searchDocumentType = documentType;
                    } else {
                        $('#searchResults').hide();
                        $('#noResults').show();
                        $('#printResultsBtn').hide();
                    }
                },
                error: function(xhr, status, error) {
                    $('#loadingIndicator').hide();
                    alert('Erreur lors de la recherche. Veuillez réessayer.');
                }
            });
        }

        function displayResults(results) {
            const container = $('#resultsContainer');
            container.empty();
            $('#resultsCount').text(results.length);

            results.forEach(function(result) {
                const resultHtml = `
                    <div class="result-item border-bottom pb-3 mb-3">
                        <div class="row">
                            <div class="col-md-8">
                                <h6 class="mb-1">
                                    <span class="badge badge-${getTypeBadgeColor(result.type)} mr-2">${result.type}</span>
                                    ${result.title}
                                </h6>
                                <p class="text-muted mb-1">${result.description}</p>
                                <small class="text-muted">
                                    <i class="fa fa-user"></i> ${result.fonctionnaire}
                                    <i class="fa fa-id-card ml-2"></i> ${result.matricule}
                                    <i class="fa fa-calendar ml-2"></i> ${result.date}
                                </small>
                            </div>
                            <div class="col-md-4 text-right">
                                ${getActionButton(result)}
                                <button class="btn btn-warning btn-sm ml-1" onclick="showNoteServiceModal('${result.fonctionnaire_id || result.matricule}', '${result.fonctionnaire}')">
                                    <i class="fa fa-file-text-o"></i> Note de service
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                container.append(resultHtml);
            });
        }

        function getTypeBadgeColor(type) {
            const colors = {
                'Congé': 'primary',
                'Certificat': 'success',
                'Attestation': 'info',
                'Mutation': 'warning',
                'Position': 'secondary',
                'Grève': 'danger'
            };
            return colors[type] || 'secondary';
        }

        function getActionButton(result) {
            if (result.requires_form && result.form_type === 'conge_decision') {
                return `<button class="btn btn-primary btn-sm" onclick="showCongeDecisionModal('${result.url}')">
                            <i class="fa fa-file-pdf-o"></i> Générer PDF
                        </button>`;
            } else {
                return `<a href="${result.url}" target="_blank" class="btn btn-primary btn-sm">
                            <i class="fa fa-eye"></i> Voir
                        </a>`;
            }
        }

        function showCongeDecisionModal(url) {
            $('#congeDecisionForm').attr('action', url);
            const modal = new bootstrap.Modal(document.getElementById('congeDecisionModal'));
            modal.show();
        }

        function setDocumentType(type) {
            $('#documentType').val(type);
            if ($('#searchQuery').val().length >= 2) {
                performSearch();
            }
        }

        function printSearchResults() {
            if (!window.searchResults || window.searchResults.length === 0) {
                alert('Aucun résultat à imprimer');
                return;
            }

            // Open print route in new window
            const printUrl = '{{ route("documents.search.print") }}';
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = printUrl;
            form.target = '_blank';

            // Add CSRF token
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}';
            form.appendChild(csrfInput);

            // Add search parameters
            const queryInput = document.createElement('input');
            queryInput.type = 'hidden';
            queryInput.name = 'query';
            queryInput.value = window.searchQuery;
            form.appendChild(queryInput);

            const typeInput = document.createElement('input');
            typeInput.type = 'hidden';
            typeInput.name = 'document_type';
            typeInput.value = window.searchDocumentType;
            form.appendChild(typeInput);

            // Add results data
            const resultsInput = document.createElement('input');
            resultsInput.type = 'hidden';
            resultsInput.name = 'results';
            resultsInput.value = JSON.stringify(window.searchResults);
            form.appendChild(resultsInput);

            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }

        function showNoteServiceModal(fonctionnaireId, fonctionnaireName) {
            $('#noteServiceFonctionnaireId').val(fonctionnaireId);
            $('#noteServiceFonctionnaireName').val(fonctionnaireName);
            $('#noteServiceForm').attr('action', '{{ route("documents.note-service") }}');
            const modal = new bootstrap.Modal(document.getElementById('noteServiceModal'));
            modal.show();
        }

        // Gestion des grèves
        let greveSearchResults = [];

        $('#greveSearchForm').on('submit', function(e) {
            e.preventDefault();
            searchGreves();
        });

        $('#exportGreveBtn').on('click', function() {
            exportGrevesToExcel();
        });

        function searchGreves() {
            const dateDebut = $('#date_debut_greve').val();
            const dateFin = $('#date_fin_greve').val();

            if (!dateDebut || !dateFin) {
                alert('Veuillez sélectionner les deux dates');
                return;
            }

            // Show loading
            $('#greveLoadingIndicator').show();
            $('#greveResults').hide();
            $('#greveNoResults').hide();
            $('#exportGreveBtn').hide();

            // AJAX request
            $.ajax({
                url: '{{ route("documents.search-greves") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    date_debut: dateDebut,
                    date_fin: dateFin
                },
                success: function(response) {
                    $('#greveLoadingIndicator').hide();

                    if (response.success && response.greves.length > 0) {
                        greveSearchResults = response.greves;
                        displayGreveResults(response.greves);
                        $('#exportGreveBtn').show();
                    } else {
                        $('#greveNoResults').show();
                    }
                },
                error: function(xhr, status, error) {
                    $('#greveLoadingIndicator').hide();
                    alert('Erreur lors de la recherche: ' + error);
                }
            });
        }

        function displayGreveResults(greves) {
            const tbody = $('#greveTableBody');
            tbody.empty();

            greves.forEach(function(greve) {
                const row = `
                    <tr>
                        <td>${greve.fonctionnaire.ppr || '-'}</td>
                        <td>${greve.fonctionnaire.nom || '-'}</td>
                        <td>${greve.fonctionnaire.prenom || '-'}</td>
                        <td>${(greve.fonctionnaire.position && greve.fonctionnaire.position.nom) ? greve.fonctionnaire.position.nom : (greve.position || '-')}</td>
                        <td>${greve.date_debut || '-'}</td>
                        <td>${greve.date_fin || '-'}</td>
                        <td><span class="badge bg-info">${greve.nombre_jours || 0} jours</span></td>
                        <td>${greve.fonctionnaire.nom_formation_sanitaire ? greve.fonctionnaire.nom_formation_sanitaire.nom : '-'}</td>
                        <td>${greve.remarque || '-'}</td>
                    </tr>
                `;
                tbody.append(row);
            });

            $('#greveResultsCount').text(greves.length);
            $('#greveResults').show();
            $('#exportGreveBtn').show();
            $('#exportGrevePdfBtn').show();
        }

        function exportGrevesToExcel() {
            if (greveSearchResults.length === 0) {
                alert('Aucune donnée à exporter');
                return;
            }

            // Create form for export
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("documents.export-greves") }}';
            form.style.display = 'none';

            // Add CSRF token
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}';
            form.appendChild(csrfInput);

            // Add dates
            const dateDebutInput = document.createElement('input');
            dateDebutInput.type = 'hidden';
            dateDebutInput.name = 'date_debut';
            dateDebutInput.value = $('#date_debut_greve').val();
            form.appendChild(dateDebutInput);

            const dateFinInput = document.createElement('input');
            dateFinInput.type = 'hidden';
            dateFinInput.name = 'date_fin';
            dateFinInput.value = $('#date_fin_greve').val();
            form.appendChild(dateFinInput);

            // Add results data
            const resultsInput = document.createElement('input');
            resultsInput.type = 'hidden';
            resultsInput.name = 'greves';
            resultsInput.value = JSON.stringify(greveSearchResults);
            form.appendChild(resultsInput);

            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }

        $('#exportGrevePdfBtn').on('click', function() {
            exportGrevesToPDF();
        });

        function exportGrevesToPDF() {
            if (greveSearchResults.length === 0) {
                alert('Aucune donnée à exporter');
                return;
            }

            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("documents.export-greves-pdf") }}';
            form.target = '_blank';
            form.style.display = 'none';

            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}';
            form.appendChild(csrfInput);

            const grevesInput = document.createElement('input');
            grevesInput.type = 'hidden';
            grevesInput.name = 'greves';
            grevesInput.value = JSON.stringify(greveSearchResults);
            form.appendChild(grevesInput);

            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }
    </script>

    <style>
        .border-left-primary { border-left: 4px solid #007bff !important; }
        .border-left-success { border-left: 4px solid #28a745 !important; }
        .border-left-info { border-left: 4px solid #17a2b8 !important; }
        .border-left-warning { border-left: 4px solid #ffc107 !important; }

        .quick-action-card .card {
            transition: transform 0.2s;
        }

        .quick-action-card .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .result-item:last-child {
            border-bottom: none !important;
            margin-bottom: 0 !important;
            padding-bottom: 0 !important;
        }
    </style>
</body>
</html>
