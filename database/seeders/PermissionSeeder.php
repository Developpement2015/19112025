<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Define all permissions based on sidebar structure and fonctionnaire details
        $permissions = [
            // Administration
            'administration.tableau-de-bord',
            'administration.statistics-detailed',
            'administration.statistics-hr',
            'administration.user-management',

            // Paramétrage - Gestion des lieux
            'parametrage.arrondissements-communes',
            'parametrage.regions',
            'parametrage.villes',
            'parametrage.grades',
            'parametrage.positions',
            'parametrage.services',
            'parametrage.type-mutation',
            'parametrage.fonctions',
            'parametrage.conges-types',
            'parametrage.certificats-types',
            'parametrage.stages-types',

            // Gestion des cadres
            'cadres.categories-cadres',
            'cadres.cadres',
            'cadres.grades-cadres',
            'cadres.specialites-cadres',

            // Formation sanitaire
            'formation.categories-formation',
            'formation.type-categories-formation',
            'formation.niveau-categories-formation',
            'formation.nom-formation-sanitaire',

            // Fonctionnaires
            'fonctionnaires.management',
            'fonctionnaires.view',
            'fonctionnaires.create',
            'fonctionnaires.edit',
            'fonctionnaires.delete',

            // Fonctionnaire Details Tabs
            'fonctionnaires.informations',
            'fonctionnaires.mutations',
            'fonctionnaires.positions',
            'fonctionnaires.conges',
            'fonctionnaires.certificats',
            'fonctionnaires.greves',

            // Documents
            'documents.search',

            // User Management
            'users.view',
            'users.create',
            'users.edit',
            'users.delete',
            'roles.view',
            'roles.create',
            'roles.edit',
            'roles.delete',

            // Activity Logs
            'activity-logs.view',

            // Retirement Management
            'retraites.view',
            'retraites.create',
            'retraites.edit',
            'retraites.delete',
            'retraites.validate',
            'retraites.auto-create',

            // Stage Management
            'stages.view',
            'stages.create',
            'stages.edit',
            'stages.delete',
            'stages.attestation',
            'stages.export',
            'stages.manage-ecoles',
            'stages.manage-options',
            'stages.manage-encadrants',

            // Gestion des grèves
            'greves.view',
            'greves.create',
            'greves.edit',
            'greves.delete',

            // Gestion des demandes fonctionnaires
            'demandes.view',
            'demandes.create',
            'demandes.approve',
            'demandes.decide',
            'demandes.manage',

            // Impression en lot
            'batch-print.view',
            'batch-print.attestations',
            'batch-print.conge-decisions',

            // Analyses IA
            'statistics.ai-analyses',

            // Tableau de bord
            'administration.tableau-de-bord',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create default roles
        $adminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $hrRole = Role::firstOrCreate(['name' => 'RH Manager']);
        $userRole = Role::firstOrCreate(['name' => 'Utilisateur']);

        // Create responsable roles for demandes workflow
        $responsable1Role = Role::firstOrCreate(['name' => 'responsable1']);
        $responsable2Role = Role::firstOrCreate(['name' => 'responsable2']);
        $responsable3Role = Role::firstOrCreate(['name' => 'responsable3']);

        // Assign all permissions to Super Admin
        $adminRole->givePermissionTo(Permission::all());

        // Assign specific permissions to RH Manager
        $hrPermissions = [
            'administration.tableau-de-bord',
            'administration.statistics-detailed',
            'administration.statistics-hr',
            'fonctionnaires.management',
            'fonctionnaires.view',
            'fonctionnaires.create',
            'fonctionnaires.edit',
            'fonctionnaires.informations',
            'fonctionnaires.mutations',
            'fonctionnaires.positions',
            'fonctionnaires.conges',
            'fonctionnaires.certificats',
            'fonctionnaires.greves',
            'documents.search',
            'parametrage.grades',
            'parametrage.positions',
            'parametrage.services',
            'parametrage.fonctions',
            'parametrage.conges-types',
            'parametrage.certificats-types',
            'activity-logs.view',
            'retraites.view',
            'retraites.create',
            'retraites.edit',
            'retraites.validate',
            'retraites.auto-create',
            'stages.view',
            'stages.create',
            'stages.edit',
            'stages.delete',
            'stages.attestation',
            'stages.export',
            'stages.manage-ecoles',
            'stages.manage-options',
            'stages.manage-encadrants',
            'greves.view',
            'greves.create',
            'greves.edit',
            'greves.delete',
            'batch-print.view',
            'batch-print.attestations',
            'batch-print.conge-decisions',
            'statistics.ai-analyses',
            'administration.tableau-de-bord',
        ];
        $hrRole->givePermissionTo($hrPermissions);

        // Assign basic permissions to regular user
        $userPermissions = [
            'administration.tableau-de-bord',
            'fonctionnaires.view',
            'fonctionnaires.informations',
            'documents.search',
            'stages.view',
            'stages.attestation',
            'greves.view',
        ];
        $userRole->givePermissionTo($userPermissions);

        // Assign permissions to responsable1 (Niveau 1 - can view and approve level 0→1)
        $responsable1Permissions = [
            'administration.tableau-de-bord',
            'demandes.view',
            'demandes.approve',
        ];
        $responsable1Role->givePermissionTo($responsable1Permissions);

        // Assign permissions to responsable2 (Niveau 2 - can view and approve level 1→2)
        $responsable2Permissions = [
            'administration.tableau-de-bord',
            'demandes.view',
            'demandes.approve',
        ];
        $responsable2Role->givePermissionTo($responsable2Permissions);

        // Assign permissions to responsable3 (Niveau 3 - can view, approve level 2→3, and create decisions)
        $responsable3Permissions = [
            'administration.tableau-de-bord',
            'demandes.view',
            'demandes.approve',
            'demandes.decide',
        ];
        $responsable3Role->givePermissionTo($responsable3Permissions);

        $this->command->info('Permissions and roles created successfully!');
    }
}
