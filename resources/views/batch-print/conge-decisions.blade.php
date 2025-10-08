<x-head titre="Décisions de Congé" />

<div class="main-wrapper">
    <x-header />
    <x-sidebar />

    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Décisions de Congé</h4>
                    <h6>Gestion et impression des décisions de congé</h6>
                </div>
                <div class="page-btn">
                    <a href="{{ route('batch-print.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-2"></i>Retour
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDecisionModal">
                        <i class="fas fa-plus me-2"></i>Nouvelle Décision
                    </button>
                </div>
            </div>

            <!-- Filters and Export -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Filtres et Export</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('batch-print.export-conge-decisions') }}" method="GET" id="exportForm">
                        <div class="row">
                            <div class="col-md-2">
                                <label class="form-label">Type de Congé</label>
                                <select name="type_conge_id" class="form-select" id="filterTypeConge">
                                    <option value="">Tous les types</option>
                                    @foreach($typeConges as $type)
                                        <option value="{{ $type->id }}" {{ request('type_conge_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">PPR</label>
                                <input type="text" name="ppr" class="form-control" placeholder="Rechercher par PPR..." value="{{ request('ppr') }}" id="filterPPR">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Date début</label>
                                <input type="date" name="date_debut" class="form-control" value="{{ request('date_debut') }}" id="filterDateDebut">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Date fin</label>
                                <input type="date" name="date_fin" class="form-control" value="{{ request('date_fin') }}" id="filterDateFin">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">&nbsp;</label>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-file-excel me-2"></i>Exporter Excel
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">&nbsp;</label>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-info" onclick="filterDecisions()">
                                        <i class="fas fa-filter me-2"></i>Filtrer
                                    </button>
                                    <button type="button" class="btn btn-secondary" onclick="clearFilters()">
                                        <i class="fas fa-times me-2"></i>Effacer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Decisions List -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Liste des Décisions</h5>
                    <div>
                        <button type="button" class="btn btn-warning" id="printSelectedBtn" disabled onclick="printSelectedWithIndividualAmpliations()">
                            <i class="fas fa-print me-2"></i>Imprimer Sélectionnées (Ampliations Individuelles)
                        </button>
                        <span class="badge bg-info ms-2" id="selectedDecisionsCount">0 sélectionnée(s)</span>
                    </div>
                </div>
                <div class="card-body">
                    <form id="batchPrintForm" action="{{ route('batch-print.print-decisions') }}" method="POST">
                        @csrf
                        <div class="table-responsive">
                            <table class="table table-striped" id="decisionsTable">
                                <thead>
                                    <tr>
                                        <th width="50">
                                            <input type="checkbox" id="masterCheckbox" class="form-check-input">
                                        </th>
                                        <th>PPR</th>
                                        <th>Nom & Prénom</th>
                                        <th>Formation Sanitaire</th>
                                        <th>Service</th>
                                        <th>Type Congé</th>
                                        <th>Jours</th>
                                        <th>Date Début</th>
                                        <th>Date Fin</th>
                                        <th>Date Décision</th>
                                        <th>N° Décision</th>
                                        <th>Statut</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($decisions as $decision)
                                    <tr class="decision-row"
                                        data-type-conge="{{ $decision->type_conge_id }}"
                                        data-date-decision="{{ optional($decision->date_decision)->format('Y-m-d') }}"
                                        data-ppr="{{ $decision->fonctionnaire->ppr ?? '' }}">
                                        <td>
                                            <input type="checkbox" name="decision_ids[]"
                                                value="{{ $decision->id }}"
                                                class="form-check-input decision-checkbox">
                                        </td>
                                        <td>{{ $decision->fonctionnaire->ppr ?? '' }}</td>
                                        <td>{{ $decision->fonctionnaire->nom ?? '' }} {{ $decision->fonctionnaire->prenom ?? '' }}</td>
                                        <td>{{ $decision->fonctionnaire->nomFormationSanitaire->nom ?? 'N/A' }}</td>
                                        <td>{{ $decision->fonctionnaire->service->nom ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge bg-primary">{{ optional($decision->typeConge)->nom ?? 'N/A' }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-info">{{ $decision->nombre_jours }} jour(s)</span>
                                        </td>
                                        <td>{{ optional($decision->date_debut)->format('d/m/Y') }}</td>
                                        <td>{{ optional($decision->date_fin)->format('d/m/Y') }}</td>
                                        <td>{{ optional($decision->date_decision)->format('d/m/Y') }}</td>
                                        <td>{{ $decision->numero_decision }}</td>
                                        <td>
                                            <span class="badge {{ $decision->status_badge_class }}">
                                                {{ $decision->status_label }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-success"
                                                        onclick="showAmpliationsModal({{ $decision->id }}, '{{ $decision->numero_decision }}', {{ json_encode($decision->ampliations ?? []) }})"
                                                        title="Générer PDF avec Ampliations">
                                                    <i class="fas fa-file-pdf"></i>
                                                </button>
                                                <a href="{{ route('batch-print.print-single-decision', $decision->id) }}"
                                                   class="btn btn-sm btn-outline-primary" title="Imprimer Simple">
                                                    <i class="fas fa-print"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-outline-warning"
                                                        onclick="showEditAmpliationsModal({{ $decision->id }}, '{{ $decision->numero_decision }}', {{ json_encode($decision->ampliations ?? []) }})"
                                                        title="Modifier Ampliations">
                                                    <i class="fas fa-tags"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-info"
                                                        data-bs-toggle="modal" data-bs-target="#editDecisionModal{{ $decision->id }}"
                                                        title="Modifier">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-outline-danger"
                                                        onclick="confirmDelete({{ $decision->id }}, '{{ route('batch-print.delete-decision', $decision->id) }}', '{{ $decision->numero_decision }}', 'Êtes-vous sûr de vouloir supprimer cette décision?')"
                                                        title="Supprimer">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="13" class="text-center">
                                            <div class="alert alert-info">
                                                <i class="fas fa-info-circle me-2"></i>
                                                Aucune décision de congé trouvée.
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </form>

                    <!-- Pagination -->
                    @if($decisions->hasPages())
                    <div class="d-flex justify-content-center mt-3">
                        {{ $decisions->links() }}
                    </div>
                    @endif
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

<!-- Modal pour Ampliations Individuelles -->
<div class="modal fade" id="ampliationsModal" tabindex="-1" aria-labelledby="ampliationsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ampliationsModalLabel">Sélectionner les ampliations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="ampliationsForm" method="POST" target="_blank">
                @csrf
                <div class="modal-body">
                    <p>Décision N° <span id="decisionNumber"></span></p>
                    <div class="mb-3">
                        <label class="form-label">Veuillez sélectionner les ampliations à inclure dans le document :</label>
                        <div class="checkbox-group">
                            <div class="form-check">
                                <input type="checkbox" name="ampliations[]" value="M. Medecin Chef du SRES de Fes" class="form-check-input" id="amp_single_1">
                                <label class="form-check-label" for="amp_single_1">M. Medecin Chef du SRES de Fes</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="ampliations[]" value="M. directeur CHR alghassani Fes" class="form-check-input" id="amp_single_2">
                                <label class="form-check-label" for="amp_single_2">M. directeur CHR alghassani Fes</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="ampliations[]" value="M. directeur Hopital ibn khatib" class="form-check-input" id="amp_single_3">
                                <label class="form-check-label" for="amp_single_3">M. directeur Hopital ibn khatib</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="ampliations[]" value="M. directeur Hopital ibn baytar" class="form-check-input" id="amp_single_4">
                                <label class="form-check-label" for="amp_single_4">M. directeur Hopital ibn baytar</label>
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

<!-- Modal pour Modifier Ampliations -->
<div class="modal fade" id="editAmpliationsModal" tabindex="-1" aria-labelledby="editAmpliationsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAmpliationsModalLabel">Modifier les ampliations</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editAmpliationsForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <p>Décision N° <span id="editDecisionNumber"></span></p>
                    <div class="mb-3">
                        <label class="form-label">Ampliations par défaut pour cette décision :</label>
                        <div class="checkbox-group">
                            <div class="form-check">
                                <input type="checkbox" name="ampliations[]" value="M. Medecin Chef du SRES de Fes" class="form-check-input" id="edit_amp_1">
                                <label class="form-check-label" for="edit_amp_1">M. Medecin Chef du SRES de Fes</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="ampliations[]" value="M. directeur CHR alghassani Fes" class="form-check-input" id="edit_amp_2">
                                <label class="form-check-label" for="edit_amp_2">M. directeur CHR alghassani Fes</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="ampliations[]" value="M. directeur Hopital ibn khatib" class="form-check-input" id="edit_amp_3">
                                <label class="form-check-label" for="edit_amp_3">M. directeur Hopital ibn khatib</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="ampliations[]" value="M. directeur Hopital ibn baytar" class="form-check-input" id="edit_amp_4">
                                <label class="form-check-label" for="edit_amp_4">M. directeur Hopital ibn baytar</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Sauvegarder</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
    const masterCheckbox = document.getElementById('masterCheckbox');
    const printSelectedBtn = document.getElementById('printSelectedBtn');
    const selectedCountSpan = document.getElementById('selectedDecisionsCount');
    const decisionCheckboxes = document.querySelectorAll('.decision-checkbox');

    // Master checkbox functionality
    masterCheckbox.addEventListener('change', function() {
        decisionCheckboxes.forEach(checkbox => {
            if (checkbox.closest('tr').style.display !== 'none') {
                checkbox.checked = this.checked;
            }
        });
        updateSelectedCount();
        updatePrintButton();
    });

    // Individual checkbox functionality
    decisionCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateSelectedCount();
            updatePrintButton();
            updateMasterCheckbox();
        });
    });

    function updateSelectedCount() {
        const checkedCount = document.querySelectorAll('.decision-checkbox:checked').length;
        selectedCountSpan.textContent = checkedCount + ' sélectionnée(s)';
    }

    function updatePrintButton() {
        const checkedCount = document.querySelectorAll('.decision-checkbox:checked').length;
        printSelectedBtn.disabled = checkedCount === 0;
    }

    function updateMasterCheckbox() {
        const visibleCheckboxes = Array.from(decisionCheckboxes).filter(cb =>
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

    // Print selected decisions - now handled by showBatchAmpliationsModal() function

    // Auto-filter when dropdown changes
    document.getElementById('filterTypeConge').addEventListener('change', function() {
        filterDecisions();
    });

    document.getElementById('filterPPR').addEventListener('input', function() {
        filterDecisions();
    });

    document.getElementById('filterDateDebut').addEventListener('change', function() {
        filterDecisions();
    });

    document.getElementById('filterDateFin').addEventListener('change', function() {
        filterDecisions();
    });

    // Initialize
    updateSelectedCount();
    updatePrintButton();
});

// Show ampliations modal for single decision
function showAmpliationsModal(decisionId, decisionNumber, currentAmpliations = []) {
    document.getElementById('decisionNumber').textContent = decisionNumber;
    document.getElementById('ampliationsForm').action = `/impression-lot/print-decision-with-ampliations/${decisionId}`;

    // Reset checkboxes
    document.querySelectorAll('#ampliationsModal input[type="checkbox"]').forEach(checkbox => {
        checkbox.checked = currentAmpliations.includes(checkbox.value);
    });

    const modal = new bootstrap.Modal(document.getElementById('ampliationsModal'));
    modal.show();
}

// Show edit ampliations modal
function showEditAmpliationsModal(decisionId, decisionNumber, currentAmpliations = []) {
    document.getElementById('editDecisionNumber').textContent = decisionNumber;
    document.getElementById('editAmpliationsForm').action = `/impression-lot/update-ampliations/${decisionId}`;

    // Reset checkboxes
    document.querySelectorAll('#editAmpliationsModal input[type="checkbox"]').forEach(checkbox => {
        checkbox.checked = currentAmpliations.includes(checkbox.value);
    });

    const modal = new bootstrap.Modal(document.getElementById('editAmpliationsModal'));
    modal.show();
}

// Print selected decisions with their individual ampliations
function printSelectedWithIndividualAmpliations() {
    const selectedCheckboxes = document.querySelectorAll('.decision-checkbox:checked');
    if (selectedCheckboxes.length === 0) {
        alert('Veuillez sélectionner au moins une décision à imprimer.');
        return;
    }

    // Create form and submit
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '{{ route("batch-print.print-decisions-with-individual-ampliations") }}';
    form.target = '_blank';

    // Add CSRF token
    const csrfInput = document.createElement('input');
    csrfInput.type = 'hidden';
    csrfInput.name = '_token';
    csrfInput.value = '{{ csrf_token() }}';
    form.appendChild(csrfInput);

    // Add selected IDs
    selectedCheckboxes.forEach(checkbox => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'decision_ids[]';
        input.value = checkbox.value;
        form.appendChild(input);
    });

    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form);
}

// Handle edit ampliations form submission
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('editAmpliationsForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                bootstrap.Modal.getInstance(document.getElementById('editAmpliationsModal')).hide();
                location.reload(); // Reload to show updated ampliations
            } else {
                alert('Erreur lors de la sauvegarde des ampliations.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Erreur lors de la sauvegarde des ampliations.');
        });
    });
});

function filterDecisions() {
    const typeConge = document.getElementById('filterTypeConge').value;
    const ppr = document.getElementById('filterPPR').value.toLowerCase();
    const dateDebut = document.getElementById('filterDateDebut').value;
    const dateFin = document.getElementById('filterDateFin').value;

    const rows = document.querySelectorAll('.decision-row');

    rows.forEach(row => {
        let show = true;

        // Si typeConge est vide (option "Tous les types"), afficher toutes les lignes
        // Sinon, filtrer par type de congé
        if (typeConge && typeConge !== '' && row.dataset.typeConge !== typeConge) {
            show = false;
        }

        // Filtrer par PPR (recherche partielle, insensible à la casse)
        if (ppr && ppr !== '' && !row.dataset.ppr.toLowerCase().includes(ppr)) {
            show = false;
        }

        if (dateDebut && row.dataset.dateDecision < dateDebut) {
            show = false;
        }

        if (dateFin && row.dataset.dateDecision > dateFin) {
            show = false;
        }

        row.style.display = show ? '' : 'none';
    });

    // Mettre à jour les compteurs après filtrage
    updateSelectedCount();
    updatePrintButton();
    updateMasterCheckbox();
}

// Fonction pour effacer tous les filtres
function clearFilters() {
    document.getElementById('filterTypeConge').value = '';
    document.getElementById('filterPPR').value = '';
    document.getElementById('filterDateDebut').value = '';
    document.getElementById('filterDateFin').value = '';

    // Appliquer le filtrage (qui affichera toutes les lignes)
    filterDecisions();
}

function confirmDelete(id, url, name, message) {
    if (confirm(message)) {
        // Create a form and submit it
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = url;

        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = '{{ csrf_token() }}';

        const methodField = document.createElement('input');
        methodField.type = 'hidden';
        methodField.name = '_method';
        methodField.value = 'DELETE';

        form.appendChild(csrfToken);
        form.appendChild(methodField);
        document.body.appendChild(form);
        form.submit();
    }
}
</script>

<x-foot />
