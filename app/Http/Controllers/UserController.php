<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function page()
    {
        $roles = Role::all();
        $permissions = Permission::all()->groupBy(function($permission) {
            return explode('.', $permission->name)[0];
        });

        // Organiser les permissions avec des noms plus lisibles
        $organizedPermissions = [];
        $moduleNames = [
            'administration' => 'Administration',
            'users' => 'Gestion Utilisateurs',
            'roles' => 'Gestion Rôles',
            'fonctionnaires' => 'Fonctionnaires',
            'cadres' => 'Gestion des Cadres',
            'formations' => 'Formations Sanitaires',
            'stages' => 'Gestion des Stages',
            'conges' => 'Gestion des Congés',
            'demandes' => 'Gestion des Demandes',
            'mutations' => 'Mutations',
            'greves' => 'Grèves',
            'documents' => 'Documents & Recherche',
            'statistics' => 'Statistiques',
            'retraites' => 'Retraites',
            'batch-print' => 'Impression en Lot',
            'activity-logs' => 'Journal d\'Activité',
            'parametrage' => 'Paramétrage'
        ];

        foreach ($permissions as $module => $modulePermissions) {
            $organizedPermissions[$moduleNames[$module] ?? ucfirst($module)] = $modulePermissions;
        }

        return view('users.page', compact('roles', 'organizedPermissions'));
    }

    public function data(Request $request)
    {
        $users = User::with('roles')->select(['id', 'name', 'email', 'created_at', 'demande_approval_level']);

        return DataTables::of($users)
            ->addColumn('roles', function ($user) {
                $roles = $user->roles->pluck('name')->toArray();
                if (empty($roles)) {
                    return '<span class="badge bg-secondary">Aucun rôle</span>';
                }

                $rolesBadges = [];
                foreach ($roles as $role) {
                    $badgeClass = $role === 'Super Admin' ? 'bg-danger' : 'bg-primary';
                    $rolesBadges[] = '<span class="badge ' . $badgeClass . ' me-1">' . $role . '</span>';
                }

                return implode('', $rolesBadges);
            })
            ->addColumn('demande_level', function ($user) {
                if ($user->demande_approval_level) {
                    $colors = [1 => 'success', 2 => 'warning', 3 => 'info', 4 => 'danger'];
                    $color = $colors[$user->demande_approval_level] ?? 'secondary';
                    return '<span class="badge bg-' . $color . '">Niveau ' . $user->demande_approval_level . '</span>';
                }
                return '<span class="text-muted">-</span>';
            })
            ->addColumn('actions', function ($user) {
                $currentUser = Auth::user();
                $actions = '<div class="action-table-data"><div class="edit-delete-action">';

                // Vérifier si l'utilisateur est Super Admin
                $isSuperAdmin = $currentUser->hasRole('Super Admin');

                // Affichage des boutons pour le Super Admin
                if ($isSuperAdmin) {
                    // Bouton Voir
                    $actions .= '<a class="btn btn-sm btn-info me-1 mb-1" href="#" onclick="viewUser(' . $user->id . ')" title="Voir les détails">
                                    <i class="fas fa-eye"></i>
                                </a>';

                    // Bouton Modifier
                    $actions .= '<a class="btn btn-sm btn-primary me-1 mb-1" href="#" onclick="editUser(' . $user->id . ')" title="Modifier">
                                    <i class="fas fa-edit"></i>
                                </a>';

                    // Bouton Réinitialiser mot de passe (pas pour son propre compte)
                    if ($user->id !== $currentUser->id) {
                        $actions .= '<a class="btn btn-sm btn-warning me-1 mb-1" href="#" onclick="resetPassword(' . $user->id . ')" title="Réinitialiser le mot de passe">
                                        <i class="fas fa-key"></i>
                                    </a>';
                    }

                    // Bouton Supprimer (pas pour son propre compte)
                    if ($user->id !== $currentUser->id) {
                        $actions .= '<a class="btn btn-sm btn-danger mb-1" href="#" onclick="deleteUser(' . $user->id . ')" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </a>';
                    }
                } else {
                    // Pour les autres utilisateurs, vérifier les permissions
                    if ($currentUser->can('users.view')) {
                        $actions .= '<a class="btn btn-sm btn-outline-info me-1 mb-1" href="#" onclick="viewUser(' . $user->id . ')" title="Voir les détails">
                                        <i class="fas fa-eye"></i>
                                    </a>';
                    }

                    if ($currentUser->can('users.edit')) {
                        $actions .= '<a class="btn btn-sm btn-outline-primary me-1 mb-1" href="#" onclick="editUser(' . $user->id . ')" title="Modifier">
                                        <i class="fas fa-edit"></i>
                                    </a>';
                    }

                    if ($currentUser->can('users.delete') && $user->id !== $currentUser->id) {
                        $actions .= '<a class="btn btn-sm btn-outline-danger mb-1" href="#" onclick="deleteUser(' . $user->id . ')" title="Supprimer">
                                        <i class="fas fa-trash"></i>
                                    </a>';
                    }
                }

                $actions .= '</div></div>';

                return $actions;
            })
            ->rawColumns(['roles', 'demande_level', 'actions'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'roles' => 'array',
                'demande_approval_level' => 'nullable|integer|in:1,2,3,4'
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'demande_approval_level' => $request->demande_approval_level,
            ]);

            if ($request->has('roles') && !empty($request->roles)) {
                $user->assignRole($request->roles);
            }

            // Log activity
            activity()
                ->causedBy(Auth::user())
                ->performedOn($user)
                ->withProperties([
                    'roles' => $request->roles ?? [],
                    'demande_approval_level' => $request->demande_approval_level
                ])
                ->log('Utilisateur créé');

            return response()->json(['success' => true, 'message' => 'Utilisateur créé avec succès']);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Erreur création utilisateur: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la création de l\'utilisateur: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $user = User::with('roles')->findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $currentUser = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'roles' => 'array',
            'demande_approval_level' => 'nullable|integer|in:1,2,3,4'
        ]);

        // Empêcher de retirer le rôle Super Admin du dernier Super Admin
        if ($user->hasRole('Super Admin')) {
            $superAdminCount = User::role('Super Admin')->count();
            $newRoles = $request->roles ?? [];

            if ($superAdminCount <= 1 && !in_array('Super Admin', $newRoles)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Impossible de retirer le rôle Super Admin du dernier administrateur'
                ], 403);
            }
        }

        $oldData = [
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->roles->pluck('name')->toArray(),
            'demande_approval_level' => $user->demande_approval_level
        ];

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'demande_approval_level' => $request->demande_approval_level,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        $user->syncRoles($request->roles ?? []);

        // Log activity
        activity()
            ->causedBy($currentUser)
            ->performedOn($user)
            ->withProperties([
                'old_data' => $oldData,
                'new_roles' => $request->roles ?? [],
                'new_demande_approval_level' => $request->demande_approval_level,
                'password_changed' => $request->filled('password')
            ])
            ->log('Utilisateur mis à jour');

        return response()->json(['success' => true, 'message' => 'Utilisateur mis à jour avec succès']);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $currentUser = Auth::user();

        // Empêcher la suppression de son propre compte
        if ($user->id === $currentUser->id) {
            return response()->json([
                'success' => false,
                'message' => 'Vous ne pouvez pas supprimer votre propre compte'
            ], 403);
        }

        // Empêcher la suppression du dernier Super Admin
        if ($user->hasRole('Super Admin')) {
            $superAdminCount = User::role('Super Admin')->count();
            if ($superAdminCount <= 1) {
                return response()->json([
                    'success' => false,
                    'message' => 'Impossible de supprimer le dernier Super Admin'
                ], 403);
            }
        }

        // Log activity before deletion
        activity()
            ->causedBy($currentUser)
            ->performedOn($user)
            ->withProperties([
                'user_data' => $user->toArray(),
                'roles' => $user->roles->pluck('name')->toArray()
            ])
            ->log('Utilisateur supprimé');

        $user->delete();

        return response()->json(['success' => true, 'message' => 'Utilisateur supprimé avec succès']);
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $currentUser = Auth::user();

        // Seul le Super Admin peut réinitialiser les mots de passe
        if (!$currentUser->hasRole('Super Admin')) {
            return response()->json([
                'success' => false,
                'message' => 'Accès refusé. Seul le Super Admin peut réinitialiser les mots de passe.'
            ], 403);
        }

        // Empêcher la réinitialisation de son propre mot de passe
        if ($user->id === $currentUser->id) {
            return response()->json([
                'success' => false,
                'message' => 'Vous ne pouvez pas réinitialiser votre propre mot de passe'
            ], 403);
        }

        // Générer un nouveau mot de passe temporaire
        $newPassword = 'Temp' . rand(1000, 9999) . '!';

        $user->update(['password' => Hash::make($newPassword)]);

        // Log activity
        activity()
            ->causedBy($currentUser)
            ->performedOn($user)
            ->withProperties(['action' => 'password_reset'])
            ->log('Mot de passe réinitialisé');

        return response()->json([
            'success' => true,
            'message' => 'Mot de passe réinitialisé avec succès',
            'new_password' => $newPassword,
            'user_name' => $user->name,
            'user_email' => $user->email
        ]);
    }

    public function storeRole(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles',
            'permissions' => 'array'
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->permissions);
        }

        return response()->json(['success' => true, 'message' => 'Rôle créé avec succès']);
    }

    public function updateRole(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'permissions' => 'array'
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);

        return response()->json(['success' => true, 'message' => 'Rôle mis à jour avec succès']);
    }

    public function destroyRole($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return response()->json(['success' => true, 'message' => 'Rôle supprimé avec succès']);
    }

    public function showRole($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        return response()->json($role);
    }
}
