<x-head titre="Impression en Lot" />

<div class="main-wrapper">
    <x-header />
    <x-sidebar />

    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Impression en Lot</h4>
                    <h6>Gestion des impressions et décisions en lot</h6>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="batchPrintTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="attestations-tab" data-bs-toggle="tab"
                                data-bs-target="#attestations" type="button" role="tab">
                                <i class="fas fa-certificate me-2"></i>Attestations de Travail
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="conge-decisions-tab" data-bs-toggle="tab"
                                data-bs-target="#conge-decisions" type="button" role="tab">
                                <i class="fas fa-calendar-alt me-2"></i>Décisions de Congé
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="greves-list-tab" data-bs-toggle="tab"
                                data-bs-target="#greves-list" type="button" role="tab">
                                <i class="fas fa-exclamation-triangle me-2"></i>Liste des grèves
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="certificates-list-tab" data-bs-toggle="tab"
                                data-bs-target="#certificates-list" type="button" role="tab">
                                <i class="fas fa-file-medical-alt me-2"></i>Listes des certificats
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="batchPrintTabsContent">
                        <!-- Attestations Tab -->
                        <div class="tab-pane fade show active" id="attestations" role="tabpanel">
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title">Sélection des Fonctionnaires pour Attestations</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('batch-print.attestations') }}" method="POST" id="attestationsForm">
                                                @csrf

                                                <!-- Search and Filter -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <input type="text" class="form-control" id="searchFonctionnaires"
                                                            placeholder="Rechercher par nom, prénom ou PPR...">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-primary" id="selectAll">
                                                            <i class="fas fa-check-square me-2"></i>Tout sélectionner
                                                        </button>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <button type="button" class="btn btn-secondary" id="deselectAll">
                                                            <i class="fas fa-square me-2"></i>Tout désélectionner
                                                        </button>
                                                    </div>
                                                </div>

                                                <!-- Fonctionnaires List -->
                                                <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
                                                    <table class="table table-striped">
                                                        <thead class="sticky-top bg-light">
                                                            <tr>
                                                                <th width="50">
                                                                    <input type="checkbox" id="masterCheckbox" class="form-check-input">
                                                                </th>
                                                                <th>PPR</th>
                                                                <th>Nom & Prénom</th>
                                                                <th>Formation Sanitaire</th>
                                                                <th>Service</th>
                                                                <th>Cadre</th>
                                                                <th>Spécialité Grade</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="fonctionnairesTableBody">
                                                            @foreach($fonctionnaires as $fonctionnaire)
                                                            <tr class="fonctionnaire-row" data-search="{{ strtolower($fonctionnaire->nom . ' ' . $fonctionnaire->prenom . ' ' . $fonctionnaire->ppr) }}">
                                                                <td>
                                                                    <input type="checkbox" name="fonctionnaire_ids[]"
                                                                        value="{{ $fonctionnaire->id }}"
                                                                        class="form-check-input fonctionnaire-checkbox">
                                                                </td>
                                                                <td>{{ $fonctionnaire->ppr }}</td>
                                                                <td>{{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }}</td>
                                                                <td>{{ optional($fonctionnaire->nomFormationSanitaire)->nom ?? 'N/A' }}</td>
                                                                <td>{{ optional($fonctionnaire->service)->nom ?? 'N/A' }}</td>
                                                                <td>{{ optional(optional(optional($fonctionnaire->specialiteGrade)->grade)->cadre)->nom ?? 'N/A' }}</td>
                                                                <td>{{ optional($fonctionnaire->specialiteGrade)->nom ?? 'N/A' }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <div class="alert alert-info">
                                                            <i class="fas fa-info-circle me-2"></i>
                                                            <span id="selectedCount">0</span> fonctionnaire(s) sélectionné(s)
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-success btn-lg" id="generateAttestations" disabled>
                                                            <i class="fas fa-file-pdf me-2"></i>Générer les Attestations PDF
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Greves List Tab -->
                        <div class="tab-pane fade" id="greves-list" role="tabpanel">
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Liste des grèves</h5>
                                            <div>
                                                <form id="grevesExportExcelForm" method="POST" action="{{ route('documents.export-greves') }}" target="_blank" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="date_debut" id="grevesExportDateDebut">
                                                    <input type="hidden" name="date_fin" id="grevesExportDateFin">
                                                    <button type="button" id="grevesExportExcelBtn" class="btn btn-success btn-sm me-2"><i class="fas fa-file-excel me-1"></i> Export Excel</button>
                                                </form>
                                                <form id="grevesExportPdfForm" method="POST" action="{{ route('documents.export-greves-pdf') }}" target="_blank" class="d-inline">
                                                    @csrf
                                                    <input type="hidden" name="date_debut" id="grevesExportPdfDateDebut">
                                                    <input type="hidden" name="date_fin" id="grevesExportPdfDateFin">
                                                    <button type="button" id="grevesExportPdfBtn" class="btn btn-secondary btn-sm"><i class="fas fa-file-pdf me-1"></i> Export PDF</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form id="grevesSearchForm" onsubmit="return false;">
                                                <div class="row mb-3">
                                                    <div class="col-md-4">
                                                        <label class="form-label">Date début</label>
                                                        <input type="date" id="grevesDateDebut" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Date fin</label>
                                                        <input type="date" id="grevesDateFin" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-4 d-flex align-items-end">
                                                        <button type="button" id="searchGrevesBtn" class="btn btn-primary me-2">Rechercher</button>
                                                        <button type="button" id="resetGrevesBtn" class="btn btn-outline-secondary">Réinitialiser</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <div id="grevesResultsArea" style="display:none;">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>PPR</th>
                                                                <th>Nom</th>
                                                                <th>Prénom</th>
                                                                <th>Formation</th>
                                                                <th>Position</th>
                                                                <th>Date début</th>
                                                                <th>Date fin</th>
                                                                <th>Durée (jours)</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="grevesResultsTbody"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="grevesNoResults" class="alert alert-info" style="display:none;">Aucune grève trouvée pour la plage sélectionnée.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Certificates List Tab -->
                        <div class="tab-pane fade" id="certificates-list" role="tabpanel">
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Listes des certificats</h5>
                                            <div>
                                                <form id="certificatesExportExcelForm" method="GET" action="{{ route('batch-print.export-certificates-excel') }}" target="_blank" class="d-inline">
                                                    <input type="hidden" name="date_debut" id="certificatesExportDateDebut">
                                                    <input type="hidden" name="date_fin" id="certificatesExportDateFin">
                                                    <button type="button" id="certificatesExportExcelBtn" class="btn btn-success btn-sm me-2"><i class="fas fa-file-excel me-1"></i> Export Excel</button>
                                                </form>
                                                <form id="certificatesExportPdfForm" method="GET" action="{{ route('batch-print.export-certificates-pdf') }}" target="_blank" class="d-inline">
                                                    <input type="hidden" name="date_debut" id="certificatesExportPdfDateDebut">
                                                    <input type="hidden" name="date_fin" id="certificatesExportPdfDateFin">
                                                    <button type="button" id="certificatesExportPdfBtn" class="btn btn-secondary btn-sm"><i class="fas fa-file-pdf me-1"></i> Export PDF</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <form id="certificatesSearchForm" onsubmit="return false;">
                                                <div class="row mb-3">
                                                    <div class="col-md-4">
                                                        <label class="form-label">Date début</label>
                                                        <input type="date" id="certificatesDateDebut" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="form-label">Date fin</label>
                                                        <input type="date" id="certificatesDateFin" class="form-control" required>
                                                    </div>
                                                    <div class="col-md-4 d-flex align-items-end">
                                                        <button type="button" id="searchCertificatesBtn" class="btn btn-primary me-2">Rechercher</button>
                                                        <button type="button" id="resetCertificatesBtn" class="btn btn-outline-secondary">Réinitialiser</button>
                                                    </div>
                                                </div>
                                            </form>

                                            <div id="certificatesResultsArea" style="display:none;">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>PPR</th>
                                                                <th>Nom</th>
                                                                <th>Prénom</th>
                                                                <th>Type de certificat</th>
                                                                <th>Date Dépôt</th>
                                                                <th>Date Début</th>
                                                                <th>Nombre Jours</th>
                                                                <th>Fichier</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="certificatesResultsTbody"></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div id="certificatesNoResults" class="alert alert-info" style="display:none;">Aucun certificat trouvé pour la plage sélectionnée.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const searchBtn = document.getElementById('searchCertificatesBtn');
                            const resetBtn = document.getElementById('resetCertificatesBtn');
                            const dateDebut = document.getElementById('certificatesDateDebut');
                            const dateFin = document.getElementById('certificatesDateFin');
                            const resultsArea = document.getElementById('certificatesResultsArea');
                            const noResults = document.getElementById('certificatesNoResults');
                            const tbody = document.getElementById('certificatesResultsTbody');
                            const exportExcelDateDebut = document.getElementById('certificatesExportDateDebut');
                            const exportExcelDateFin = document.getElementById('certificatesExportDateFin');
                            const exportPdfDateDebut = document.getElementById('certificatesExportPdfDateDebut');
                            const exportPdfDateFin = document.getElementById('certificatesExportPdfDateFin');
                            const exportExcelBtn = document.getElementById('certificatesExportExcelBtn');
                            const exportPdfBtn = document.getElementById('certificatesExportPdfBtn');

                            function renderCertificates(data) {
                                tbody.innerHTML = '';
                                if (!data || data.length === 0) {
                                    resultsArea.style.display = 'none';
                                    noResults.style.display = 'block';
                                    return;
                                }

                                noResults.style.display = 'none';
                                resultsArea.style.display = 'block';

                                data.forEach(c => {
                                    const tr = document.createElement('tr');
                                    tr.innerHTML = `
                                        <td>${c.ppr}</td>
                                        <td>${c.nom}</td>
                                        <td>${c.prenom}</td>
                                        <td>${c.type}</td>
                                        <td>${c.date_depot}</td>
                                        <td>${c.date_debut}</td>
                                        <td>${c.jours}</td>
                                        <td>${c.url ? `<a href="${c.url}" target="_blank" class="btn btn-sm btn-info">Télécharger</a>` : '<span class="badge bg-secondary">Aucun fichier</span>'}</td>
                                    `;
                                    tbody.appendChild(tr);
                                });
                            }

                            searchBtn.addEventListener('click', function() {
                                if (!dateDebut.value || !dateFin.value) {
                                    alert('Veuillez sélectionner une plage de dates.');
                                    return;
                                }

                                fetch(`{{ url('/impression-lot/certificates') }}?date_debut=${dateDebut.value}&date_fin=${dateFin.value}`, {
                                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                                })
                                .then(async r => {
                                    const text = await r.text();
                                    try {
                                        const json = JSON.parse(text);
                                        if (json.success) {
                                            renderCertificates(json.data);
                                        } else {
                                            alert(json.message || 'Erreur lors de la récupération des certificats');
                                        }
                                    } catch (e) {
                                        console.error('Response not JSON', text);
                                        alert('Erreur serveur: voir console pour détails');
                                    }
                                }).catch(err => { console.error(err); alert('Erreur réseau'); });
                            });

                            resetBtn.addEventListener('click', function() {
                                dateDebut.value = '';
                                dateFin.value = '';
                                tbody.innerHTML = '';
                                resultsArea.style.display = 'none';
                                noResults.style.display = 'none';
                            });

                            exportExcelBtn.addEventListener('click', function() {
                                if (!dateDebut.value || !dateFin.value) { alert('Sélectionnez une plage de dates'); return; }
                                exportExcelDateDebut.value = dateDebut.value;
                                exportExcelDateFin.value = dateFin.value;
                                // submit the form
                                document.getElementById('certificatesExportExcelForm').submit();
                            });

                            exportPdfBtn.addEventListener('click', function() {
                                if (!dateDebut.value || !dateFin.value) { alert('Sélectionnez une plage de dates'); return; }
                                exportPdfDateDebut.value = dateDebut.value;
                                exportPdfDateFin.value = dateFin.value;
                                document.getElementById('certificatesExportPdfForm').submit();
                            });
                        });
                        </script>
                        <!-- Congé Decisions Tab -->
                        <div class="tab-pane fade" id="conge-decisions" role="tabpanel">
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h5 class="card-title">Gestion des Décisions de Congé</h5>
                                            <div>
                                                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addDecisionModal">
                                                    <i class="fas fa-plus me-2"></i>Nouvelle Décision
                                                </button>
                                                <a href="{{ route('batch-print.conge-decisions') }}" class="btn btn-info">
                                                    <i class="fas fa-list me-2"></i>Voir toutes les décisions
                                                </a>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <!-- Export Form -->
                                            <form action="{{ route('batch-print.export-conge-decisions') }}" method="GET" class="mb-4">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label class="form-label">Type de Congé</label>
                                                        <select name="type_conge_id" class="form-select">
                                                            <option value="">Tous les types</option>
                                                            @foreach($typeConges as $type)
                                                                <option value="{{ $type->id }}">{{ $type->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Date début</label>
                                                        <input type="date" name="date_debut" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">PPR</label>
                                                        <input type="text" name="ppr" class="form-control" placeholder="Rechercher par PPR...">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Date fin</label>
                                                        <input type="date" name="date_fin" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">&nbsp;</label>
                                                        <input type="hidden" name="include_relicats" value="1">
                                                        <button type="submit" class="btn btn-success d-block">
                                                            <i class="fas fa-file-excel me-2"></i>Exporter Excel
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="alert alert-info">
                                                <i class="fas fa-info-circle me-2"></i>
                                                Utilisez cette section pour créer des décisions de congé et les exporter en Excel avec toutes les informations détaillées.
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
</div>

<!-- Add Decision Modal -->
<div class="modal fade" id="addDecisionModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nouvelle Décision de Congé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('batch-print.store-conge-decision') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Fonctionnaire</label>
                                <select name="fonctionnaire_id" class="form-select" required>
                                    <option value="">Sélectionner un fonctionnaire</option>
                                    @foreach($fonctionnaires as $fonctionnaire)
                                        <option value="{{ $fonctionnaire->id }}">
                                            {{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }} ({{ $fonctionnaire->ppr }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Type de Congé</label>
                                <select name="type_conge_id" class="form-select" required>
                                    <option value="">Sélectionner un type</option>
                                    @foreach($typeConges as $type)
                                        <option value="{{ $type->id }}">{{ $type->nom }} ({{ $type->jours }} jours)</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Nombre de jours</label>
                                <input type="number" name="nombre_jours" class="form-control" min="1" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Date début</label>
                                <input type="date" name="date_debut" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Date fin</label>
                                <input type="date" name="date_fin" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Date de décision</label>
                                <input type="date" name="date_decision" class="form-control" value="{{ date('Y-m-d') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Numéro de décision</label>
                                <input type="text" name="numero_decision" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Remarques</label>
                                <textarea name="remarques" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">Créer la décision</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchFonctionnaires');
    const masterCheckbox = document.getElementById('masterCheckbox');
    const selectAllBtn = document.getElementById('selectAll');
    const deselectAllBtn = document.getElementById('deselectAll');
    const generateBtn = document.getElementById('generateAttestations');
    const selectedCountSpan = document.getElementById('selectedCount');
    const fonctionnaireCheckboxes = document.querySelectorAll('.fonctionnaire-checkbox');
    const fonctionnaireRows = document.querySelectorAll('.fonctionnaire-row');

    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        fonctionnaireRows.forEach(row => {
            const searchData = row.getAttribute('data-search');
            if (searchData.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Select all functionality
    selectAllBtn.addEventListener('click', function() {
        fonctionnaireCheckboxes.forEach(checkbox => {
            if (checkbox.closest('tr').style.display !== 'none') {
                checkbox.checked = true;
            }
        });
        updateSelectedCount();
        updateGenerateButton();
    });

    // Deselect all functionality
    deselectAllBtn.addEventListener('click', function() {
        fonctionnaireCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
        masterCheckbox.checked = false;
        updateSelectedCount();
        updateGenerateButton();
    });

    // Master checkbox functionality
    masterCheckbox.addEventListener('change', function() {
        fonctionnaireCheckboxes.forEach(checkbox => {
            if (checkbox.closest('tr').style.display !== 'none') {
                checkbox.checked = this.checked;
            }
        });
        updateSelectedCount();
        updateGenerateButton();
    });

    // Individual checkbox functionality
    fonctionnaireCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateSelectedCount();
            updateGenerateButton();
            updateMasterCheckbox();
        });
    });

    function updateSelectedCount() {
        const checkedCount = document.querySelectorAll('.fonctionnaire-checkbox:checked').length;
        selectedCountSpan.textContent = checkedCount;
    }

    function updateGenerateButton() {
        const checkedCount = document.querySelectorAll('.fonctionnaire-checkbox:checked').length;
        generateBtn.disabled = checkedCount === 0;
    }

    function updateMasterCheckbox() {
        const visibleCheckboxes = Array.from(fonctionnaireCheckboxes).filter(cb =>
            cb.closest('tr').style.display !== 'none'
        );
        const checkedVisibleCheckboxes = visibleCheckboxes.filter(cb => cb.checked);

        if (checkedVisibleCheckboxes.length === 0) {
            masterCheckbox.indeterminate = false;
            masterCheckbox.checked = false;
        } else if (checkedVisibleCheckboxes.length === visibleCheckboxes.length) {
            masterCheckbox.indeterminate = false;
            masterCheckbox.checked = true;
        } else {
            masterCheckbox.indeterminate = true;
        }
    }

    // Initialize
    updateSelectedCount();
    updateGenerateButton();
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchBtn = document.getElementById('searchGrevesBtn');
    const resetBtn = document.getElementById('resetGrevesBtn');
    const dateDebut = document.getElementById('grevesDateDebut');
    const dateFin = document.getElementById('grevesDateFin');
    const resultsArea = document.getElementById('grevesResultsArea');
    const noResults = document.getElementById('grevesNoResults');
    const tbody = document.getElementById('grevesResultsTbody');
    const exportExcelDateDebut = document.getElementById('grevesExportDateDebut');
    const exportExcelDateFin = document.getElementById('grevesExportDateFin');
    const exportPdfDateDebut = document.getElementById('grevesExportPdfDateDebut');
    const exportPdfDateFin = document.getElementById('grevesExportPdfDateFin');
    const exportExcelBtn = document.getElementById('grevesExportExcelBtn');
    const exportPdfBtnEl = document.getElementById('grevesExportPdfBtn');
    const exportPdfBtn = document.getElementById('grevesExportPdfBtn');

    let lastGreves = [];

    function renderGreves(data) {
        tbody.innerHTML = '';
        if (!data || data.length === 0) {
            resultsArea.style.display = 'none';
            noResults.style.display = 'block';
            return;
        }

        noResults.style.display = 'none';
        resultsArea.style.display = 'block';

        data.forEach(g => {
            const tr = document.createElement('tr');
            // determine formation name robustly — handle objects, arrays, different key names
            function extractFormationName(obj) {
                if (!obj) return '';
                // if it's a string already
                if (typeof obj === 'string') return obj;
                // if it's an object with 'nom'
                if (typeof obj === 'object') {
                    if (obj.nom) return obj.nom;
                    if (obj.name) return obj.name;
                    // if it's an array-like object, try first element
                    if (Array.isArray(obj) && obj.length > 0) {
                        const first = obj[0];
                        if (typeof first === 'string') return first;
                        if (first && typeof first === 'object' && (first.nom || first.name)) return first.nom || first.name;
                    }
                    // try to stringify a likely field
                    // find first string property
                    for (const k in obj) {
                        if (typeof obj[k] === 'string' && obj[k].trim() !== '') return obj[k];
                    }
                }
                return '';
            }

            let formationName = '';
            if (g.fonctionnaire) {
                formationName = extractFormationName(g.fonctionnaire.nomFormationSanitaire) || extractFormationName(g.fonctionnaire.nom_formation_sanitaire) || '';
            }

            const positionName = (g.fonctionnaire && g.fonctionnaire.position && g.fonctionnaire.position.nom) ? g.fonctionnaire.position.nom : (g.position || '');

            tr.innerHTML = `
                <td>${g.fonctionnaire && g.fonctionnaire.ppr ? g.fonctionnaire.ppr : ''}</td>
                <td>${g.fonctionnaire && g.fonctionnaire.nom ? g.fonctionnaire.nom : ''}</td>
                <td>${g.fonctionnaire && g.fonctionnaire.prenom ? g.fonctionnaire.prenom : ''}</td>
                <td>${formationName}</td>
                <td>${positionName}</td>
                <td>${g.date_debut || ''}</td>
                <td>${g.date_fin || ''}</td>
                <td>${g.nombre_jours || 0}</td>
            `;
            tbody.appendChild(tr);
        });
    }

    searchBtn.addEventListener('click', function() {
        const d1 = dateDebut.value;
        const d2 = dateFin.value;
        if (!d1 || !d2) {
            alert('Veuillez choisir une plage de dates valide.');
            return;
        }

        fetch('{{ route('documents.search-greves') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ date_debut: d1, date_fin: d2 })
        })
        .then(r => r.json())
        .then(resp => {
            if (resp.success) {
                lastGreves = resp.greves || [];
                renderGreves(lastGreves);

                // set export inputs (Excel uses dates; PDF will now use date range server-side)
                exportExcelDateDebut.value = d1;
                exportExcelDateFin.value = d2;
                exportPdfDateDebut.value = d1;
                exportPdfDateFin.value = d2;
            } else {
                alert(resp.message || 'Erreur lors de la recherche');
            }
        })
        .catch(err => {
            console.error('Erreur recherche greves:', err);
            alert('Erreur lors de la recherche des grèves');
        });
    });

    resetBtn.addEventListener('click', function() {
        dateDebut.value = '';
        dateFin.value = '';
        tbody.innerHTML = '';
        resultsArea.style.display = 'none';
        noResults.style.display = 'none';
        exportExcelDateDebut.value = '';
        exportExcelDateFin.value = '';
        // clear the PDF export hidden date fields as well
        exportPdfDateDebut.value = '';
        exportPdfDateFin.value = '';
        lastGreves = [];
    });

    // Excel export button - validate dates then submit
    exportExcelBtn.addEventListener('click', function() {
        const d1 = document.getElementById('grevesDateDebut').value;
        const d2 = document.getElementById('grevesDateFin').value;
        if (!d1 || !d2) {
            alert('Veuillez sélectionner une plage de dates avant d\'exporter en Excel.');
            return;
        }
        document.getElementById('grevesExportDateDebut').value = d1;
        document.getElementById('grevesExportDateFin').value = d2;
        document.getElementById('grevesExportExcelForm').submit();
    });

    // PDF export button - validate dates then submit
    exportPdfBtnEl.addEventListener('click', function() {
        const d1 = document.getElementById('grevesDateDebut').value;
        const d2 = document.getElementById('grevesDateFin').value;
        if (!d1 || !d2) {
            alert('Veuillez sélectionner une plage de dates avant d\'exporter en PDF.');
            return;
        }
        document.getElementById('grevesExportPdfDateDebut').value = d1;
        document.getElementById('grevesExportPdfDateFin').value = d2;
        document.getElementById('grevesExportPdfForm').submit();
    });

    // Extra safety: prevent form submit if dates are missing (in case JS bindings fail elsewhere)
    const grevesExportExcelForm = document.getElementById('grevesExportExcelForm');
    const grevesExportPdfForm = document.getElementById('grevesExportPdfForm');

    if (grevesExportExcelForm) {
        grevesExportExcelForm.addEventListener('submit', function(e) {
            const d1 = document.getElementById('grevesExportDateDebut').value;
            const d2 = document.getElementById('grevesExportDateFin').value;
            if (!d1 || !d2) {
                e.preventDefault();
                alert('Veuillez sélectionner une plage de dates avant d\'exporter en Excel.');
                return false;
            }
            return true;
        });
    }

    if (grevesExportPdfForm) {
        grevesExportPdfForm.addEventListener('submit', function(e) {
            const d1 = document.getElementById('grevesExportPdfDateDebut').value;
            const d2 = document.getElementById('grevesExportPdfDateFin').value;
            if (!d1 || !d2) {
                e.preventDefault();
                alert('Veuillez sélectionner une plage de dates avant d\'exporter en PDF.');
                return false;
            }
            return true;
        });
    }
});
</script>

<x-foot />
