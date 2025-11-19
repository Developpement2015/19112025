<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class ResponsableUsersSeeder extends Seeder
{
    public function run()
    {
        // Create responsable1 user
        $responsable1 = User::firstOrCreate(
            ['email' => 'responsable1@grh.test'],
            [
                'name' => 'Responsable Niveau 1',
                'password' => Hash::make('resp1'),
            ]
        );
        $role1 = Role::firstOrCreate(['name' => 'responsable1']);
        $responsable1->assignRole($role1);

        // Create responsable2 user
        $responsable2 = User::firstOrCreate(
            ['email' => 'responsable2@grh.test'],
            [
                'name' => 'Responsable Niveau 2',
                'password' => Hash::make('resp2'),
            ]
        );
        $role2 = Role::firstOrCreate(['name' => 'responsable2']);
        $responsable2->assignRole($role2);

        // Create responsable3 user
        $responsable3 = User::firstOrCreate(
            ['email' => 'responsable3@grh.test'],
            [
                'name' => 'Responsable Niveau 3',
                'password' => Hash::make('resp3'),
            ]
        );
        $role3 = Role::firstOrCreate(['name' => 'responsable3']);
        $responsable3->assignRole($role3);

        $this->command->info('Responsable users created successfully!');
        $this->command->info('responsable1@grh.test / resp1');
        $this->command->info('responsable2@grh.test / resp2');
        $this->command->info('responsable3@grh.test / resp3');
    }
}
