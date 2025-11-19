<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolesAndUsersSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $roles = ['responsable1','responsable2','responsable3','utilisateur3','admin'];
        foreach ($roles as $r) {
            Role::firstOrCreate(['name' => $r]);
        }

        // Create test users
        $users = [
            ['name' => 'Resp One','email' => 'resp1@example.test','role'=>'responsable1'],
            ['name' => 'Resp Two','email' => 'resp2@example.test','role'=>'responsable2'],
            ['name' => 'Resp Three','email' => 'resp3@example.test','role'=>'responsable3'],
            ['name' => 'User Three','email' => 'user3@example.test','role'=>'utilisateur3'],
        ];

        foreach ($users as $u) {
            $user = User::firstOrCreate([
                'email' => $u['email']
            ],[
                'name' => $u['name'],
                'password' => Hash::make('password')
            ]);
            $user->assignRole($u['role']);
        }
    }
}
