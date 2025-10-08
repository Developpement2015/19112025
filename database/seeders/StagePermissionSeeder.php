<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class StagePermissionSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Créer les permissions pour les stages
        $stagePermissions = [
            'stages.view',
            'stages.create',
            'stages.edit',
            'stages.delete',
            'stages.attestation',
            'stages.export',
            'stages.manage-ecoles',
            'stages.manage-options',
            'stages.manage-encadrants',
        ];

        foreach ($stagePermissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assigner les permissions aux rôles existants
        $adminRole = Role::where('name', 'Super Admin')->first();
        $hrRole = Role::where('name', 'RH Manager')->first();
        $userRole = Role::where('name', 'Utilisateur')->first();

        if ($adminRole) {
            // Super Admin a toutes les permissions
            $adminRole->givePermissionTo($stagePermissions);
        }

        if ($hrRole) {
            // RH Manager a toutes les permissions des stages
            $hrRole->givePermissionTo($stagePermissions);
        }

        if ($userRole) {
            // Utilisateur régulier a seulement la visualisation et les attestations
            $userRole->givePermissionTo(['stages.view', 'stages.attestation']);
        }

        $this->command->info('Permissions des stages créées et assignées avec succès!');
    }
}
