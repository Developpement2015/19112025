<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Create admin user if it doesn't exist
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );

        // Assign Super Admin role
        $adminUser->assignRole('Super Admin');

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@test.com');
        $this->command->info('Password: password');
    }
}
