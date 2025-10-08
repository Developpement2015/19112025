<?php

namespace App\Console\Commands;

use App\Models\Fonctionnaire;
use App\Models\Relicat;
use App\Models\TypeConge;
use App\Services\CongeAvailabilityService;
use Illuminate\Console\Command;

class InitializeCongeAvailabilities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'conge:initialize-availabilities {--force : Force reinitialization of all records}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize congé availability records for all fonctionnaires based on existing relicats';

    /**
     * The CongeAvailabilityService instance.
     *
     * @var CongeAvailabilityService
     */
    protected $congeAvailabilityService;

    /**
     * Create a new command instance.
     *
     * @param CongeAvailabilityService $congeAvailabilityService
     * @return void
     */
    public function __construct(CongeAvailabilityService $congeAvailabilityService)
    {
        parent::__construct();
        $this->congeAvailabilityService = $congeAvailabilityService;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Initializing congé availability records...');

        // Get all fonctionnaires
        $fonctionnaires = Fonctionnaire::all();
        $this->info('Found ' . $fonctionnaires->count() . ' fonctionnaires');

        // Get all types of congé
        $typeConges = TypeConge::all();
        $this->info('Found ' . $typeConges->count() . ' types of congé');

        // Get all relicats
        $relicats = Relicat::all();
        $this->info('Found ' . $relicats->count() . ' relicats');

        // Initialize a progress bar
        $progressBar = $this->output->createProgressBar($fonctionnaires->count() * $typeConges->count());
        $progressBar->start();

        // For each fonctionnaire and type of congé
        foreach ($fonctionnaires as $fonctionnaire) {
            foreach ($typeConges as $typeConge) {
                // Get all relicats for this fonctionnaire and type of congé
                $fonctionnaireRelicats = $relicats->where('fonctionnaire_id', $fonctionnaire->id)
                    ->where('type_conge_id', $typeConge->id);

                // If there are relicats, initialize availability records
                if ($fonctionnaireRelicats->isNotEmpty() || $this->option('force')) {
                    // Get the years from the relicats
                    $years = [];
                    foreach ($fonctionnaireRelicats as $relicat) {
                        if ($relicat->date_conge) {
                            $year = date('Y', strtotime($relicat->date_conge));
                            if (!in_array($year, $years)) {
                                $years[] = $year;
                            }
                        }
                    }

                    // If no years found, use the current year
                    if (empty($years)) {
                        $years[] = date('Y');
                    }

                    // Initialize availability records for each year
                    foreach ($years as $year) {
                        $this->congeAvailabilityService->updateAvailability($fonctionnaire->id, $typeConge->id, $year);
                    }
                }

                $progressBar->advance();
            }
        }

        $progressBar->finish();
        $this->newLine();
        $this->info('Congé availability records initialized successfully!');
    }
}
