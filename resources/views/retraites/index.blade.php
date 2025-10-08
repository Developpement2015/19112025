<x-head titre="Gestion des retraites" />
<x-header />
<x-sidebar />

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Gestion des retraites</h4>
                    <h6>Retraite limite d'âge (62.5 ans) et retraite anticipée</h6>
                </div>
            </div>
            <ul class="table-top-head">
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Actualiser" class="refresh-btn"
                        href="javascript:void(0);" onclick="refreshTable()"><i data-feather="rotate-ccw"
                            class="feather-rotate-ccw"></i></a>
                </li>
                <li>
                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="Réduire" id="collapse-header"><i
                            data-feather="chevron-up" class="feather-chevron-up"></i></a>
                </li>
            </ul>
            <div class="page-btn">
                <a href="javascript:void(0)" class="btn btn-secondary ms-2" data-bs-toggle="modal" data-bs-target="#settingsModal">
                    <i data-feather="settings" class="me-2"></i> Paramètres</a>
                <a href="javascript:void(0)" class="btn btn-added" data-bs-toggle="modal"
                    data-bs-target="#addRetraiteModal"><i data-feather="plus-circle" class="me-2"></i> Ajouter Retraite</a>
                <a href="javascript:void(0)" class="btn btn-secondary ms-2" onclick="createAutoRetirements()">
                    <i data-feather="clock" class="me-2"></i> Détecter Retraites Auto</a>
                <a href="javascript:void(0)" class="btn btn-info ms-2" onclick="showEligibleFonctionnaires()">
                    <i data-feather="users" class="me-2"></i> Fonctionnaires Éligibles</a>
            </div>
        </div>

        <!-- Filters -->
        <div class="card table-list-card">
            <div class="card-header">
                <h5>Filtres</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-label">Type de retraite</label>
                            <select id="typeRetraiteFilter" class="form-control">
                                <option value="">Tous</option>
                                <option value="limite_age">Limite d'âge</option>
                                <option value="anticipee">Anticipée</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-label">Statut</label>
                            <select id="statutFilter" class="form-control">
                                <option value="">Tous</option>
                                <option value="propose">Proposé</option>
                                <option value="valide">Validé</option>
                                <option value="rejete">Rejeté</option>
                                <option value="effectue">Effectué</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-label">Date de</label>
                            <input type="date" id="dateFromFilter" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-label">Date à</label>
                            <input type="date" id="dateToFilter" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">&nbsp;</label>
                            <div>
                                <button type="button" id="applyFilters" class="btn btn-primary">
                                    <i data-feather="filter" class="me-1"></i> Filtrer
                                </button>
                                <button type="button" id="clearFilters" class="btn btn-secondary">
                                    <i data-feather="x" class="me-1"></i> Effacer
                                </button>
                                <input type="text" id="searchInput" placeholder="Rechercher..." class="form-control d-inline-block ms-2" style="width: 200px; border: 2px solid #6571ff;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Retraites Table -->
        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="retraitesTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Fonctionnaire</th>
                                <th>Type</th>
                                <th>Date Retraite</th>
                                <th>Âge</th>
                                <th>Années Service</th>
                                <th>Statut</th>
                                <th class="no-sort">Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Retraite Modal -->
<div class="modal fade" id="addRetraiteModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un dossier de retraite</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addRetraiteForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Fonctionnaire</label>
                                <select name="fonctionnaire_id" id="fonctionnaireSelect" class="form-control" required>
                                    <option value="">Sélectionner un fonctionnaire</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Type de retraite</label>
                                <select name="type_retraite" id="typeRetraiteSelect" class="form-control" required>
                                    <option value="">Sélectionner le type</option>
                                    <option value="limite_age" id="limiteAgeOption">Retraite limite d'âge</option>
                                    <option value="anticipee">Retraite anticipée</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Date de retraite</label>
                                <input type="date" name="date_retraite" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12" id="motifContainer" style="display: none;">
                            <div class="mb-3">
                                <label class="form-label">Motif (obligatoire pour retraite anticipée)</label>
                                <textarea name="motif" class="form-control" rows="3" placeholder="Préciser le motif de la retraite anticipée"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Remarques</label>
                                <textarea name="remarques" class="form-control" rows="3" placeholder="Remarques additionnelles"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-submit">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Retraite Modal -->
<div class="modal fade" id="editRetraiteModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier le dossier de retraite</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editRetraiteForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="editRetraiteId" name="retraite_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Date de retraite</label>
                                <input type="date" name="date_retraite" id="editDateRetraite" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Type de retraite</label>
                                <input type="text" id="editTypeRetraite" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-12" id="editMotifContainer">
                            <div class="mb-3">
                                <label class="form-label">Motif</label>
                                <textarea name="motif" id="editMotif" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Remarques</label>
                                <textarea name="remarques" id="editRemarques" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-submit">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Retraite Modal -->
<div class="modal fade" id="viewRetraiteModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détails du dossier de retraite</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="retraiteDetailsContent">
                    <!-- Content will be loaded here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Eligible Fonctionnaires Modal -->
<div class="modal fade" id="eligibleFonctionnairesModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eligibleModalTitle">Fonctionnaires éligibles à la retraite</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="eligibleTable">
                        <thead>
                            <tr>
                                <th>PPR</th>
                                <th>Nom Prénom</th>
                                <th>Âge</th>
                                <th>Années de Service</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="eligibleTableBody">
                            <!-- Content will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

<!-- Settings Modal -->
<div class="modal fade" id="settingsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Paramètres de Retraite</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="settingsForm">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Âge limite de retraite (en années)</label>
                        <input type="number" name="retirement_age_limit" id="retirementAgeLimit"
                               class="form-control" step="0.1" min="50" max="70" required>
                        <div class="form-text">
                            Cet âge détermine l'éligibilité automatique à la retraite.
                            Actuellement défini à <span id="currentAgeDisplay">62.5</span> ans.
                        </div>
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Note :</strong> La modification de cet âge affectera :
                        <ul class="mb-0 mt-2">
                            <li>La détection automatique des fonctionnaires éligibles</li>
                            <li>La création automatique des dossiers de retraite</li>
                            <li>Les calculs d'éligibilité futurs</li>
                        </ul>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel me-2" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-submit">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize DataTable
    var retraitesTable = new DataTable('#retraitesTable', {
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('retraites.data') }}",
            data: function(d) {
                d.type_retraite = $('#typeRetraiteFilter').val();
                d.statut = $('#statutFilter').val();
                d.date_from = $('#dateFromFilter').val();
                d.date_to = $('#dateToFilter').val();
            }
        },
        columns: [
            { data: 'fonctionnaire_info', name: 'fonctionnaire_info', orderable: false },
            { data: 'type_badge', name: 'type_retraite', orderable: false },
            { data: 'date_retraite_formatted', name: 'date_retraite' },
            { data: 'age_info', name: 'age_retraite', orderable: false },
            { data: 'service_info', name: 'annees_service', orderable: false },
            { data: 'statut_badge', name: 'statut', orderable: false },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ],
        order: [[2, 'desc']],
        language: {
            search: ' ',
            sLengthMenu: '_MENU_',
            searchPlaceholder: "Rechercher",
            info: "_START_ - _END_ sur _TOTAL_ éléments",
            paginate: {
                next: ' <i class="fa fa-angle-right"></i>',
                previous: '<i class="fa fa-angle-left"></i> '
            }
        }
    });

    // Search functionality
    $('#searchInput').on('keyup', function() {
        retraitesTable.search(this.value).draw();
    });

    // Apply filters
    $('#applyFilters').on('click', function() {
        retraitesTable.ajax.reload();
    });

    // Clear filters
    $('#clearFilters').on('click', function() {
        $('#typeRetraiteFilter, #statutFilter, #dateFromFilter, #dateToFilter').val('');
        retraitesTable.ajax.reload();
    });

    // Load fonctionnaires for dropdown
    loadFonctionnaires();

    // Load retirement settings
    loadRetirementSettings();

    // Show/hide motif field based on type selection
    $('#typeRetraiteSelect').on('change', function() {
        if ($(this).val() === 'anticipee') {
            $('#motifContainer').show();
            $('textarea[name="motif"]').attr('required', true);
        } else {
            $('#motifContainer').hide();
            $('textarea[name="motif"]').attr('required', false);
        }
    });

    // Add Retraite Form
    $('#addRetraiteForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('retraites.store') }}",
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#addRetraiteModal').modal('hide');
                retraitesTable.ajax.reload();
                showAlert('success', response.message);
                $('#addRetraiteForm')[0].reset();
                $('#motifContainer').hide();
            },
            error: function(xhr) {
                var response = xhr.responseJSON;
                showAlert('error', response.message || 'Erreur lors de la création du dossier');
            }
        });
    });

    // Edit Retraite Form
    $('#editRetraiteForm').on('submit', function(e) {
        e.preventDefault();
        var retraiteId = $('#editRetraiteId').val();
        $.ajax({
            url: "/retraites/" + retraiteId,
            method: 'PUT',
            data: $(this).serialize(),
            success: function(response) {
                $('#editRetraiteModal').modal('hide');
                retraitesTable.ajax.reload();
                showAlert('success', response.message);
            },
            error: function(xhr) {
                var response = xhr.responseJSON;
                showAlert('error', response.message || 'Erreur lors de la mise à jour');
            }
        });
    });

    // Settings Form
    $('#settingsForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('retraites.settings.update') }}",
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#settingsModal').modal('hide');
                showAlert('success', response.message);
                loadRetirementSettings(); // Reload settings
                // Update the page subtitle with new age
                updatePageSubtitle();
            },
            error: function(xhr) {
                var response = xhr.responseJSON;
                showAlert('error', response.message || 'Erreur lors de la mise à jour des paramètres');
            }
        });
    });
});

function loadRetirementSettings() {
    $.get("{{ route('retraites.settings') }}", function(data) {
        $('#retirementAgeLimit').val(data.retirement_age_limit);
        $('#currentAgeDisplay').text(data.retirement_age_limit);
        // Update the select option text
        $('#limiteAgeOption').text('Retraite limite d\'âge (' + data.retirement_age_limit + ' ans)');
    });
}

function updatePageSubtitle() {
    $.get("{{ route('retraites.settings') }}", function(data) {
        $('h6').text('Retraite limite d\'âge (' + data.retirement_age_limit + ' ans) et retraite anticipée');
        // Update the select option text
        $('#limiteAgeOption').text('Retraite limite d\'âge (' + data.retirement_age_limit + ' ans)');
    });
}

function loadFonctionnaires() {
    $.get("{{ route('retraites.fonctionnaires') }}", function(data) {
        var select = $('#fonctionnaireSelect');
        select.empty().append('<option value="">Sélectionner un fonctionnaire</option>');
        data.forEach(function(fonctionnaire) {
            select.append('<option value="' + fonctionnaire.id + '">' + fonctionnaire.text + '</option>');
        });
    });
}

function refreshTable() {
    $('#retraitesTable').DataTable().ajax.reload();
}

function viewRetraite(id) {
    $.ajax({
        url: "/retraites/" + id,
        method: 'GET',
        success: function(retraite) {
            var content = '<div class="row">';
            content += '<div class="col-md-6"><strong>Fonctionnaire:</strong> ' + (retraite.fonctionnaire ? retraite.fonctionnaire.ppr + ' - ' + retraite.fonctionnaire.nom + ' ' + retraite.fonctionnaire.prenom : 'N/A') + '</div>';
            content += '<div class="col-md-6"><strong>Type:</strong> ' + retraite.type_retraite_libelle + '</div>';
            content += '<div class="col-md-6"><strong>Date de retraite:</strong> ' + (retraite.date_retraite || 'N/A') + '</div>';
            content += '<div class="col-md-6"><strong>Âge:</strong> ' + (retraite.age_retraite ? retraite.age_retraite + ' ans' : 'N/A') + '</div>';
            content += '<div class="col-md-6"><strong>Années de service:</strong> ' + (retraite.annees_service ? retraite.annees_service + ' ans' : 'N/A') + '</div>';
            content += '<div class="col-md-6"><strong>Statut:</strong> ' + retraite.statut_libelle + '</div>';

            if (retraite.motif) {
                content += '<div class="col-md-12 mt-3"><strong>Motif:</strong><br>' + retraite.motif + '</div>';
            }

            if (retraite.remarques) {
                content += '<div class="col-md-12 mt-3"><strong>Remarques:</strong><br>' + retraite.remarques + '</div>';
            }

            if (retraite.created_by) {
                content += '<div class="col-md-6 mt-3"><strong>Créé par:</strong> ' + (retraite.created_by.name || 'N/A') + '</div>';
            }

            if (retraite.validated_by) {
                content += '<div class="col-md-6 mt-3"><strong>Validé par:</strong> ' + (retraite.validated_by.name || 'N/A') + '</div>';
                content += '<div class="col-md-6 mt-3"><strong>Date de validation:</strong> ' + (retraite.validated_at || 'N/A') + '</div>';
            }

            content += '</div>';

            $('#retraiteDetailsContent').html(content);
            $('#viewRetraiteModal').modal('show');
        },
        error: function(xhr) {
            showAlert('error', 'Erreur lors du chargement des détails');
        }
    });
}

function editRetraite(id) {
    $.ajax({
        url: "/retraites/" + id,
        method: 'GET',
        success: function(retraite) {
            $('#editRetraiteId').val(retraite.id);
            $('#editDateRetraite').val(retraite.date_retraite);
            $('#editTypeRetraite').val(retraite.type_retraite_libelle);
            $('#editMotif').val(retraite.motif || '');
            $('#editRemarques').val(retraite.remarques || '');

            $('#editRetraiteModal').modal('show');
        },
        error: function(xhr) {
            showAlert('error', 'Erreur lors du chargement des données');
        }
    });
}

function validateRetraite(id) {
    if (confirm('Êtes-vous sûr de vouloir valider ce dossier de retraite ?')) {
        $.ajax({
            url: "/retraites/" + id + "/validate",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                $('#retraitesTable').DataTable().ajax.reload();
                showAlert('success', response.message);
            },
            error: function(xhr) {
                var response = xhr.responseJSON;
                showAlert('error', response.message || 'Erreur lors de la validation');
            }
        });
    }
}

function deleteRetraite(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce dossier de retraite ?')) {
        $.ajax({
            url: "/retraites/" + id,
            method: 'DELETE',
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                $('#retraitesTable').DataTable().ajax.reload();
                showAlert('success', response.message);
            },
            error: function(xhr) {
                var response = xhr.responseJSON;
                showAlert('error', response.message || 'Erreur lors de la suppression');
            }
        });
    }
}

function createAutoRetirements() {
    console.log('createAutoRetirements called');

    // Function to create auto retirements
    function doCreateAutoRetirements(ageLimit) {
        if (confirm('Créer automatiquement les dossiers de retraite pour tous les fonctionnaires de ' + ageLimit + ' ans et plus ?')) {
            $.ajax({
                url: "{{ route('retraites.auto-create') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    $('#retraitesTable').DataTable().ajax.reload();
                    showAlert('success', response.message);
                },
                error: function(xhr) {
                    console.error('Error creating auto retirements:', xhr);
                    showAlert('error', 'Erreur lors de la création automatique');
                }
            });
        }
    }

    // Try to get retirement settings, fallback to default if fails
    $.get("{{ route('retraites.settings') }}", function(data) {
        console.log('Settings for auto retirement:', data);
        doCreateAutoRetirements(data.retirement_age_limit);
    }).fail(function(xhr) {
        console.error('Error loading settings for auto retirement, using default age limit:', xhr);
        // Use default age limit if settings fail
        doCreateAutoRetirements(62.5);
    });
}

function showEligibleFonctionnaires() {
    console.log('showEligibleFonctionnaires called');

    // Function to load eligible fonctionnaires
    function loadEligibleData(ageLimit) {
        $('#eligibleModalTitle').text('Fonctionnaires éligibles à la retraite (' + ageLimit + ' ans et plus)');

        $.ajax({
            url: "{{ route('retraites.eligible') }}",
            method: 'GET',
            success: function(data) {
                console.log('Eligible data received:', data);
                var tbody = $('#eligibleTableBody');
                tbody.empty();

                if (data.length === 0) {
                    tbody.append('<tr><td colspan="5" class="text-center">Aucun fonctionnaire éligible trouvé</td></tr>');
                } else {
                    data.forEach(function(fonctionnaire) {
                        var row = '<tr>';
                        row += '<td>' + fonctionnaire.ppr + '</td>';
                        row += '<td>' + fonctionnaire.nom + ' ' + fonctionnaire.prenom + '</td>';
                        row += '<td>' + fonctionnaire.age + ' ans</td>';
                        row += '<td>' + fonctionnaire.annees_service + ' ans</td>';
                        row += '<td><button class="btn btn-sm btn-primary" onclick="createSingleRetirement(' + fonctionnaire.id + ')">Créer Retraite</button></td>';
                        row += '</tr>';
                        tbody.append(row);
                    });
                }

                $('#eligibleFonctionnairesModal').modal('show');
            },
            error: function(xhr) {
                console.error('Error loading eligible fonctionnaires:', xhr);
                showAlert('error', 'Erreur lors du chargement des fonctionnaires éligibles');
            }
        });
    }

    // Try to get retirement settings, fallback to default if fails
    $.get("{{ route('retraites.settings') }}", function(settings) {
        console.log('Settings received:', settings);
        loadEligibleData(settings.retirement_age_limit);
    }).fail(function(xhr) {
        console.error('Error loading settings, using default age limit:', xhr);
        // Use default age limit if settings fail
        loadEligibleData(62.5);
    });
}

function createSingleRetirement(fonctionnaireId) {
    $('#fonctionnaireSelect').val(fonctionnaireId);
    $('#typeRetraiteSelect').val('limite_age');
    $('#eligibleFonctionnairesModal').modal('hide');
    $('#addRetraiteModal').modal('show');
}

function showAlert(type, message) {
    // You can implement your alert system here
    alert(message);
}
</script>

<x-foot />
