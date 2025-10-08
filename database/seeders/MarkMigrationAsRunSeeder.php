<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarkMigrationAsRunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('migrations')->insert([
            'migration' => '2025_04_25_225044_add_date_conge_to_relicats_table',
            'batch' => 12,
        ]);
    }
}
