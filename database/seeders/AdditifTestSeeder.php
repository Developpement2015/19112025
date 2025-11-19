<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fonctionnaire;
use App\Models\TypeConge;
use App\Models\Relicat;
use Carbon\Carbon;

class AdditifTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * Creates a sample additif for fonctionnaire id 72 (if exists).
     */
    public function run()
    {
        $fonctionnaireId = 72; // change if you want another id
        $fonctionnaire = Fonctionnaire::find($fonctionnaireId);
        if (!$fonctionnaire) {
            $this->command->info("Fonctionnaire with id {$fonctionnaireId} not found. Seeder skipped.");
            return;
        }

        // Find administratif type
        $adminType = TypeConge::whereRaw('LOWER(nom) LIKE ?', ['%administratif%'])->first();
        if (!$adminType) {
            $adminType = TypeConge::first();
            $this->command->info('No type_conge with "administratif" found, using first TypeConge id ' . ($adminType ? $adminType->id : 'none'));
        }

        $currentYear = Carbon::now()->year;

        // Create additif relicat of 10 days for current year
        $relicat = Relicat::create([
            'fonctionnaire_id' => $fonctionnaire->id,
            'type_conge_id' => $adminType ? $adminType->id : null,
            'nbr_jours_disponibles' => 10,
            'date_conge' => Carbon::now()->toDateString(),
            'is_additif' => 1,
            'annee' => $currentYear,
            'document' => null
        ]);

        if ($relicat) {
            $this->command->info('Additif test created: id=' . $relicat->id . ', fonctionnaire_id=' . $fonctionnaire->id);
        } else {
            $this->command->info('Failed to create additif test.');
        }
    }
}
