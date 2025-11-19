<x-head titre="Gestion des utilisateurs" />
<x-header />
<x-sidebar />

<div class="page-wrapper">
    <style>
        .form-control .form-control-sm{
            display: none;
        }

        /* Styles pour les badges de permissions */
        .badge {
            font-size: 0.75em;
            margin-bottom: 2px;
        }

        /* Styles pour les actions */
        .action-table-data .edit-delete-action a {
            transition: all 0.3s ease;
        }

        .action-table-data .edit-delete-action a:hover {
            transform: scale(1.1);
        }

        /* Styles pour les modals */
        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }

        .form-control-plaintext {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 0.375rem;
            padding: 0.375rem 0.75rem;
        }

        /* Amélioration des permissions dans le modal de visualisation */
        #viewUserPermissions .badge {
            font-size: 0.7em;
        }

        #viewUserPermissions h6 {
            color: #495057;
            font-weight: 600;
        }

        /* Indicateur de rôle Super Admin */
        .badge.bg-danger {
            background-color: #dc3545 !important;
        }

        .badge.bg-warning {
            background-color: #ffc107 !important;
            color: #212529;
        }

        /* Styles pour les boutons d'actions */
        .action-table-data {
            white-space: nowrap;
        }

        .action-table-data .btn {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            margin-bottom: 2px;
        }

        /* Responsive pour les actions */
        @media (max-width: 768px) {
            .action-table-data .btn {
                font-size: 0.7rem;
                padding: 0.2rem 0.4rem;
            }
        }
    </style>
    <div class="content">
            <div class="page-header">
                <div class="add-item d-flex">
                    <div class="page-title">
                        <h4>Gestion des utilisateurs</h4>
                        <h6>Gérer les utilisateurs et leurs rôles</h6>
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

            <!-- Filter -->
            <div class="card table-list-card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="form-group">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#addUserModal">
                                    <i data-feather="plus-circle" class="me-1"></i> Ajouter Utilisateur
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                    data-bs-target="#addRoleModal">
                                    <i data-feather="shield" class="me-1"></i> Ajouter Rôle
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="search-input">
                                <input type="text" id="searchInput" placeholder="Rechercher..." class="form-control"
                                    style="border: 2px solid #6571ff; font-size: 1.1rem;">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="usersTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Rôles</th>
                                    <th>Niveau Demandes</th>
                                    <th>Date de création</th>
                                    <th class="no-sort">Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Roles Table -->
            <div class="card table-list-card mt-4">
                <div class="card-header">
                    <h5>Gestion des Rôles</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table datanew" id="rolesTable">
                            <thead>
                                <tr>
                                    <th>Nom du Rôle</th>
                                    <th>Permissions</th>
                                    <th>Utilisateurs</th>
                                    <th class="no-sort">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <span class="badge bg-primary">{{ $role->permissions->count() }} permissions</span>
                                    </td>
                                    <td>
                                        <span class="badge bg-info">{{ $role->users->count() }} utilisateurs</span>
                                    </td>
                                    <td>
                                        <div class="action-table-data">
                                            <div class="edit-delete-action">
                                                <a class="me-2 p-2" href="#" onclick="editRole({{ $role->id }})">
                                                    <i data-feather="edit" class="feather-edit"></i>
                                                </a>
                                                <a class="confirm-text p-2" href="#" onclick="deleteRole({{ $role->id }})">
                                                    <i data-feather="trash-2" class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addUserForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Mot de passe</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Rôles</label>
                                <select name="roles[]" class="form-control" multiple>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Niveau d'Approbation Demandes</label>
                                <select name="demande_approval_level" class="form-control">
                                    <option value="">-- Aucun niveau --</option>
                                    <option value="1">Niveau 1 (Première approbation)</option>
                                    <option value="2">Niveau 2 (Deuxième approbation)</option>
                                    <option value="3">Niveau 3 (Troisième approbation)</option>
                                    <option value="4">Niveau 4 (Approbation finale + Décision)</option>
                                </select>
                                <small class="text-muted">Assignez un niveau pour que l'utilisateur puisse approuver les demandes</small>
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

<!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier l'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editUserForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="editUserId" name="user_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nom</label>
                                <input type="text" name="name" id="editUserName" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" id="editUserEmail" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nouveau mot de passe (optionnel)</label>
                                <input type="password" name="password" id="editUserPassword" class="form-control"
                                       placeholder="Laisser vide pour ne pas changer">
                                <small class="form-text text-muted">Minimum 8 caractères</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Rôles</label>
                                <select name="roles[]" id="editUserRoles" class="form-control" multiple>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Niveau d'Approbation Demandes</label>
                                <select name="demande_approval_level" id="editUserDemandeLevel" class="form-control">
                                    <option value="">-- Aucun niveau --</option>
                                    <option value="1">Niveau 1 (Première approbation)</option>
                                    <option value="2">Niveau 2 (Deuxième approbation)</option>
                                    <option value="3">Niveau 3 (Troisième approbation)</option>
                                    <option value="4">Niveau 4 (Approbation finale + Décision)</option>
                                </select>
                                <small class="text-muted">Assignez un niveau pour que l'utilisateur puisse approuver les demandes</small>
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

<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un rôle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="addRoleForm">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Nom du rôle</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Permissions</label>
                                <div class="row">
                                    @foreach($organizedPermissions as $group => $groupPermissions)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">{{ $group }}</h6>
                                                <div class="form-check">
                                                    <input class="form-check-input group-checkbox" type="checkbox"
                                                           data-group="{{ $group }}">
                                                    <label class="form-check-label">Tout sélectionner</label>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @foreach($groupPermissions as $permission)
                                                <div class="form-check">
                                                    <input class="form-check-input permission-checkbox"
                                                           type="checkbox" name="permissions[]"
                                                           value="{{ $permission->name }}"
                                                           data-group="{{ $group }}">
                                                    <label class="form-check-label">
                                                        {{ ucfirst(str_replace(['-', '.'], [' ', ' '], explode('.', $permission->name)[1] ?? $permission->name)) }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
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

<!-- Edit Role Modal -->
<div class="modal fade" id="editRoleModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modifier le rôle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editRoleForm">
                @csrf
                @method('PUT')
                <input type="hidden" id="editRoleId" name="role_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Nom du rôle</label>
                                <input type="text" name="name" id="editRoleName" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">Permissions</label>
                                <div class="row" id="editRolePermissions">
                                    @foreach($organizedPermissions as $group => $groupPermissions)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <div class="card-header">
                                                <h6 class="mb-0">{{ $group }}</h6>
                                                <div class="form-check">
                                                    <input class="form-check-input group-checkbox-edit" type="checkbox"
                                                           data-group="{{ $group }}">
                                                    <label class="form-check-label">Tout sélectionner</label>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                @foreach($groupPermissions as $permission)
                                                <div class="form-check">
                                                    <input class="form-check-input permission-checkbox-edit"
                                                           type="checkbox" name="permissions[]"
                                                           value="{{ $permission->name }}"
                                                           data-group="{{ $group }}">
                                                    <label class="form-check-label">
                                                        {{ ucfirst(str_replace(['-', '.'], [' ', ' '], explode('.', $permission->name)[1] ?? $permission->name)) }}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
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

<!-- View User Modal -->
<div class="modal fade" id="viewUserModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Détails de l'utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label"><strong>Nom :</strong></label>
                            <p id="viewUserName" class="form-control-plaintext"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label"><strong>Email :</strong></label>
                            <p id="viewUserEmail" class="form-control-plaintext"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label"><strong>Date de création :</strong></label>
                            <p id="viewUserCreated" class="form-control-plaintext"></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label"><strong>Dernière mise à jour :</strong></label>
                            <p id="viewUserUpdated" class="form-control-plaintext"></p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label"><strong>Rôles :</strong></label>
                            <div id="viewUserRoles"></div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label"><strong>Permissions :</strong></label>
                            <div id="viewUserPermissions"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="button" class="btn btn-primary" onclick="editUserFromView()" id="editFromViewBtn" style="display: none;">
                    <i data-feather="edit"></i> Modifier
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize DataTable for users
    var usersTable = new DataTable('#usersTable', {
        processing: true,
        serverSide: true,
        ajax: {
            url: "{{ route('users.data') }}",
        },
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'roles', name: 'roles', orderable: false, searchable: false },
            { data: 'demande_level', name: 'demande_level', orderable: false, searchable: false, title: 'Niveau Demandes' },
            { data: 'created_at', name: 'created_at' },
            { data: 'actions', name: 'actions', orderable: false, searchable: false }
        ],
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
        usersTable.search(this.value).draw();
    });

    // Group checkbox functionality for add role modal
    $('.group-checkbox').on('change', function() {
        var group = $(this).data('group');
        var isChecked = $(this).is(':checked');
        $('input[data-group="' + group + '"].permission-checkbox').prop('checked', isChecked);
    });

    // Group checkbox functionality for edit role modal
    $('.group-checkbox-edit').on('change', function() {
        var group = $(this).data('group');
        var isChecked = $(this).is(':checked');
        $('input[data-group="' + group + '"].permission-checkbox-edit').prop('checked', isChecked);
    });

    // Add User Form
    $('#addUserForm').on('submit', function(e) {
        e.preventDefault();

        // Disable submit button to prevent double submission
        var submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true).text('Création...');

        $.ajax({
            url: "{{ route('users.store') }}",
            method: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#addUserModal').modal('hide');
                usersTable.ajax.reload();
                showAlert('success', response.message);
                $('#addUserForm')[0].reset();
            },
            error: function(xhr) {
                console.error('Error details:', xhr.responseJSON);
                var errorMessage = 'Erreur lors de la création de l\'utilisateur';

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    var errors = xhr.responseJSON.errors;
                    errorMessage = Object.values(errors).flat().join('<br>');
                } else if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                showAlert('error', errorMessage);
            },
            complete: function() {
                // Re-enable submit button
                submitBtn.prop('disabled', false).text('Ajouter');
            }
        });
    });

    // Edit User Form
    $('#editUserForm').on('submit', function(e) {
        e.preventDefault();
        var userId = $('#editUserId').val();
        $.ajax({
            url: "/users/" + userId,
            method: 'PUT',
            data: $(this).serialize(),
            success: function(response) {
                $('#editUserModal').modal('hide');
                usersTable.ajax.reload();
                showAlert('success', response.message);
            },
            error: function(xhr) {
                showAlert('error', 'Erreur lors de la mise à jour de l\'utilisateur');
            }
        });
    });

    // Add Role Form
    $('#addRoleForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('roles.store') }}",
            method: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                $('#addRoleModal').modal('hide');
                location.reload();
                showAlert('success', response.message);
            },
            error: function(xhr) {
                showAlert('error', 'Erreur lors de la création du rôle');
            }
        });
    });

    // Edit Role Form
    $('#editRoleForm').on('submit', function(e) {
        e.preventDefault();
        var roleId = $('#editRoleId').val();
        $.ajax({
            url: "/roles/" + roleId,
            method: 'PUT',
            data: $(this).serialize(),
            success: function(response) {
                $('#editRoleModal').modal('hide');
                location.reload();
                showAlert('success', response.message);
            },
            error: function(xhr) {
                showAlert('error', 'Erreur lors de la mise à jour du rôle');
            }
        });
    });
});

function refreshTable() {
    $('#usersTable').DataTable().ajax.reload();
}

function viewUser(id) {
    $.ajax({
        url: "/users/" + id,
        method: 'GET',
        success: function(user) {
            $('#viewUserName').text(user.name);
            $('#viewUserEmail').text(user.email);
            $('#viewUserCreated').text(new Date(user.created_at).toLocaleDateString('fr-FR'));
            $('#viewUserUpdated').text(new Date(user.updated_at).toLocaleDateString('fr-FR'));

            // Afficher les rôles
            let rolesHtml = '';
            if (user.roles && user.roles.length > 0) {
                user.roles.forEach(function(role) {
                    rolesHtml += '<span class="badge bg-primary me-1">' + role.name + '</span>';
                });
            } else {
                rolesHtml = '<span class="badge bg-secondary">Aucun rôle</span>';
            }
            $('#viewUserRoles').html(rolesHtml);

            // Charger et afficher les permissions
            loadUserPermissions(id);

            // Afficher le bouton modifier si l'utilisateur a la permission
            @can('users.edit')
                $('#editFromViewBtn').show().data('user-id', id);
            @endcan

            $('#viewUserModal').modal('show');
        },
        error: function(xhr) {
            showAlert('error', 'Erreur lors du chargement des détails de l\'utilisateur');
        }
    });
}

function loadUserPermissions(userId) {
    $.ajax({
        url: "/users/" + userId + "/permissions",
        method: 'GET',
        success: function(data) {
            let permissionsHtml = '';
            if (data.modules && data.modules.length > 0) {
                data.modules.forEach(function(module) {
                    permissionsHtml += '<div class="mb-2">';
                    permissionsHtml += '<h6 class="mb-1">' + module.module + ' (' + module.permissions.length + ')</h6>';
                    permissionsHtml += '<div>';
                    module.permissions.forEach(function(permission) {
                        permissionsHtml += '<span class="badge bg-success me-1 mb-1">' + permission.display_name + '</span>';
                    });
                    permissionsHtml += '</div></div>';
                });
            } else {
                permissionsHtml = '<span class="badge bg-warning">Aucune permission</span>';
            }
            $('#viewUserPermissions').html(permissionsHtml);
        },
        error: function(xhr) {
            $('#viewUserPermissions').html('<span class="text-danger">Erreur lors du chargement des permissions</span>');
        }
    });
}

function editUserFromView() {
    const userId = $('#editFromViewBtn').data('user-id');
    $('#viewUserModal').modal('hide');
    setTimeout(() => editUser(userId), 300); // Délai pour éviter les conflits de modals
}

function editUser(id) {
    $.ajax({
        url: "/users/" + id,
        method: 'GET',
        success: function(user) {
            $('#editUserId').val(user.id);
            $('#editUserName').val(user.name);
            $('#editUserEmail').val(user.email);
            $('#editUserPassword').val(''); // Vider le champ mot de passe

            // Clear and set roles
            $('#editUserRoles option').prop('selected', false);
            user.roles.forEach(function(role) {
                $('#editUserRoles option[value="' + role.name + '"]').prop('selected', true);
            });

            // Set demande approval level
            $('#editUserDemandeLevel').val(user.demande_approval_level || '');

            $('#editUserModal').modal('show');
        },
        error: function(xhr) {
            showAlert('error', 'Erreur lors du chargement des données de l\'utilisateur');
        }
    });
}

function deleteUser(id) {
    // D'abord récupérer les infos de l'utilisateur pour confirmation
    $.ajax({
        url: "/users/" + id,
        method: 'GET',
        success: function(user) {
            const confirmMessage = `Êtes-vous sûr de vouloir supprimer l'utilisateur ?\n\n` +
                                 `Nom: ${user.name}\n` +
                                 `Email: ${user.email}\n` +
                                 `Rôles: ${user.roles.map(r => r.name).join(', ')}\n\n` +
                                 `Cette action est irréversible !`;

            if (confirm(confirmMessage)) {
                $.ajax({
                    url: "/users/" + id,
                    method: 'DELETE',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#usersTable').DataTable().ajax.reload();
                        showAlert('success', response.message);

                        // Fermer les modals si ouverts
                        $('#viewUserModal').modal('hide');
                        $('#editUserModal').modal('hide');
                    },
                    error: function(xhr) {
                        let errorMessage = 'Erreur lors de la suppression de l\'utilisateur';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        showAlert('error', errorMessage);
                    }
                });
            }
        },
        error: function(xhr) {
            showAlert('error', 'Erreur lors du chargement des données de l\'utilisateur');
        }
    });
}

function resetPassword(id) {
    // D'abord récupérer les infos de l'utilisateur pour confirmation
    $.ajax({
        url: "/users/" + id,
        method: 'GET',
        success: function(user) {
            const confirmMessage = `Êtes-vous sûr de vouloir réinitialiser le mot de passe de ?\n\n` +
                                 `Nom: ${user.name}\n` +
                                 `Email: ${user.email}\n\n` +
                                 `Un nouveau mot de passe temporaire sera généré.`;

            if (confirm(confirmMessage)) {
                $.ajax({
                    url: "/users/" + id + "/reset-password",
                    method: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        if (response.success) {
                            // Afficher le nouveau mot de passe dans une alerte
                            const message = `Mot de passe réinitialisé avec succès !\n\n` +
                                          `Utilisateur: ${response.user_name}\n` +
                                          `Email: ${response.user_email}\n` +
                                          `Nouveau mot de passe: ${response.new_password}\n\n` +
                                          `⚠️ Communiquez ce mot de passe à l'utilisateur de manière sécurisée.\n` +
                                          `L'utilisateur devra le changer lors de sa prochaine connexion.`;

                            alert(message);
                            showAlert('success', 'Mot de passe réinitialisé avec succès');
                        } else {
                            showAlert('error', response.message);
                        }
                    },
                    error: function(xhr) {
                        let errorMessage = 'Erreur lors de la réinitialisation du mot de passe';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        showAlert('error', errorMessage);
                    }
                });
            }
        },
        error: function(xhr) {
            showAlert('error', 'Erreur lors du chargement des données de l\'utilisateur');
        }
    });
}

function editRole(id) {
    $.ajax({
        url: "/roles/" + id,
        method: 'GET',
        success: function(role) {
            $('#editRoleId').val(role.id);
            $('#editRoleName').val(role.name);

            // Clear all checkboxes
            $('.permission-checkbox-edit').prop('checked', false);
            $('.group-checkbox-edit').prop('checked', false);

            // Set permissions
            role.permissions.forEach(function(permission) {
                $('input[value="' + permission.name + '"].permission-checkbox-edit').prop('checked', true);
            });

            $('#editRoleModal').modal('show');
        }
    });
}

function deleteRole(id) {
    if (confirm('Êtes-vous sûr de vouloir supprimer ce rôle ?')) {
        $.ajax({
            url: "/roles/" + id,
            method: 'DELETE',
            data: {
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                location.reload();
                showAlert('success', response.message);
            },
            error: function(xhr) {
                showAlert('error', 'Erreur lors de la suppression du rôle');
            }
        });
    }
}

function showAlert(type, message) {
    // You can implement your alert system here
    alert(message);
}
</script>

<x-foot />
