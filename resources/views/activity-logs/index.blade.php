<x-head titre="Journal d'activité" />
<x-header />
<x-sidebar />

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="add-item d-flex">
                <div class="page-title">
                    <h4>Journal d'activité</h4>
                    <h6>Suivi des actions utilisateurs</h6>
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
                            <label class="form-label">Type de log</label>
                            <select id="logNameFilter" class="form-control">
                                <option value="">Tous</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-label">Événement</label>
                            <select id="eventFilter" class="form-control">
                                <option value="">Tous</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-label">Utilisateur</label>
                            <select id="userFilter" class="form-control">
                                <option value="">Tous</option>
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
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label class="form-label">&nbsp;</label>
                            <div>
                                <button type="button" id="applyFilters" class="btn btn-primary">
                                    <i data-feather="filter" class="me-1"></i> Filtrer
                                </button>
                                <button type="button" id="clearFilters" class="btn btn-secondary">
                                    <i data-feather="x" class="me-1"></i> Effacer
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Logs Table -->
        <div class="card table-list-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="activityLogsTable" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date/Heure</th>
                                <th>Type</th>
                                <th>Événement</th>
                                <th>Auteur</th>
                                <th>Sujet</th>
                                <th>Description</th>
                                <th>Détails</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Activity Details Modal -->
<div class="modal fade" id="activityDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détails de l'activité</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="activityDetailsContent">
                    <!-- Content will be loaded here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>



<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize DataTable
    var activityTable = new DataTable('#activityLogsTable', {
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('activity-logs.data') }}",
            data: function(d) {
                d.log_name = $('#logNameFilter').val();
                d.event = $('#eventFilter').val();
                d.causer_id = $('#userFilter').val();
                d.date_from = $('#dateFromFilter').val();
                d.date_to = $('#dateToFilter').val();
            }
        },
        columns: [
            { data: 'created_at_formatted', name: 'created_at' },
            { data: 'log_name_badge', name: 'log_name', orderable: false },
            { data: 'event_badge', name: 'event', orderable: false },
            { data: 'causer_name', name: 'causer_name', orderable: false },
            { data: 'subject_name', name: 'subject_name', orderable: false },
            { data: 'description_formatted', name: 'description' },
            { data: 'properties_formatted', name: 'properties', orderable: false, searchable: false }
        ],
        order: [[0, 'desc']],
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

    // Load filter options
    loadFilterOptions();

    // Apply filters
    $('#applyFilters').on('click', function() {
        activityTable.ajax.reload();
    });

    // Clear filters
    $('#clearFilters').on('click', function() {
        $('#logNameFilter, #eventFilter, #userFilter, #dateFromFilter, #dateToFilter').val('');
        activityTable.ajax.reload();
    });
});

function loadFilterOptions() {
    // Load log names
    $.get("{{ route('activity-logs.log-names') }}", function(data) {
        var select = $('#logNameFilter');
        data.forEach(function(item) {
            select.append('<option value="' + item + '">' + item + '</option>');
        });
    });

    // Load events
    $.get("{{ route('activity-logs.events') }}", function(data) {
        var select = $('#eventFilter');
        data.forEach(function(item) {
            select.append('<option value="' + item + '">' + item + '</option>');
        });
    });

    // Load users
    $.get("{{ route('activity-logs.users') }}", function(data) {
        var select = $('#userFilter');
        data.forEach(function(user) {
            select.append('<option value="' + user.id + '">' + user.name + '</option>');
        });
    });
}

function refreshTable() {
    $('#activityLogsTable').DataTable().ajax.reload();
}

function showProperties(id) {
    $.ajax({
        url: "/activity-logs/" + id,
        method: 'GET',
        success: function(activity) {
            var content = '<div class="row">';
            content += '<div class="col-md-6"><strong>ID:</strong> ' + activity.id + '</div>';
            content += '<div class="col-md-6"><strong>Type de log:</strong> ' + activity.log_name + '</div>';
            content += '<div class="col-md-6"><strong>Événement:</strong> ' + activity.event + '</div>';
            content += '<div class="col-md-6"><strong>Description:</strong> ' + activity.description + '</div>';

            if (activity.causer) {
                content += '<div class="col-md-6"><strong>Auteur:</strong> ' + activity.causer.name + '</div>';
                content += '<div class="col-md-6"><strong>Type d\'auteur:</strong> ' + activity.causer.type.split('\\').pop() + '</div>';
            }

            if (activity.subject) {
                content += '<div class="col-md-6"><strong>Sujet:</strong> ' + activity.subject.name + '</div>';
                content += '<div class="col-md-6"><strong>Type de sujet:</strong> ' + activity.subject.type.split('\\').pop() + '</div>';
            }

            content += '<div class="col-md-6"><strong>Date de création:</strong> ' + activity.created_at + '</div>';
            content += '<div class="col-md-6"><strong>Date de modification:</strong> ' + activity.updated_at + '</div>';
            content += '</div>';

            if (activity.properties && Object.keys(activity.properties).length > 0) {
                content += '<hr><h6>Propriétés:</h6>';
                content += '<pre class="bg-light p-3">' + JSON.stringify(activity.properties, null, 2) + '</pre>';
            }

            $('#activityDetailsContent').html(content);
            $('#activityDetailsModal').modal('show');
        },
        error: function(xhr) {
            showAlert('error', 'Erreur lors du chargement des détails');
        }
    });
}

function showAlert(type, message) {
    // You can implement your alert system here
    alert(message);
}
</script>

<x-foot />
