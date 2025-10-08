<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->command->info('🚀 Starting comprehensive database seeding...');

        // 1. Seed permissions and roles first
        $this->call([
            PermissionSeeder::class,
            AdminUserSeeder::class,
        ]);

        // 2. Seed master/reference data
        $this->call([
            MasterDataSeeder::class,
            CadresGradesSeeder::class,
            ServicesPositionsSeeder::class,
        ]);

        // 3. Seed fonctionnaires with realistic data
        $this->call([
            FonctionnairesSeeder::class,
        ]);

        // 4. Seed transactional data (mutations, positions, congés, etc.)
        $this->call([
            TransactionalDataSeeder::class,
        ]);

        // 5. Seed activity logs for testing
        $this->call([
            ActivityLogTestSeeder::class,
        ]);

        $this->command->info('✅ Database seeding completed successfully!');
        $this->command->info('📊 Summary:');
        $this->command->info('   - 200 Fonctionnaires with realistic data');
        $this->command->info('   - Complete master data (regions, villes, services, etc.)');
        $this->command->info('   - Retirement records for eligible fonctionnaires');
        $this->command->info('   - Mutations, positions, congés, and certificates');
        $this->command->info('   - User roles and permissions');
        $this->command->info('   - Activity logs for testing');
        $this->command->info('🎯 Ready for testing!');
    }
}
