<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Fonctionnaire;
use Illuminate\Support\Facades\Hash;

class ActivityLogTestSeeder extends Seeder
{
    public function run()
    {
        // Create a test user to generate activity logs
        $testUser = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
            ]
        );

        // Assign a role to generate activity
        $testUser->assignRole('Utilisateur');

        // Create some manual activity logs for testing
        activity()
            ->causedBy($testUser)
            ->performedOn($testUser)
            ->withProperties(['test' => 'data'])
            ->log('Test activity created');

        // If there are fonctionnaires, create some activity for them too
        $fonctionnaires = Fonctionnaire::take(3)->get();
        foreach ($fonctionnaires as $fonctionnaire) {
            activity()
                ->causedBy($testUser)
                ->performedOn($fonctionnaire)
                ->withProperties(['action' => 'test_update'])
                ->log('Fonctionnaire test update');
        }

        $this->command->info('Test activity logs created successfully!');
    }
}
