<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Demande;

class UpdateDemandesNumeros extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demandes:update-numeros';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mettre à jour les numéros de demandes existantes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Mise à jour des numéros de demandes...');
        
        $demandes = Demande::whereNull('numero_demande')->orderBy('id')->get();
        
        if ($demandes->isEmpty()) {
            $this->info('Aucune demande à mettre à jour.');
            return 0;
        }
        
        $counter = [];
        
        foreach ($demandes as $demande) {
            $year = $demande->created_at->format('Y');
            
            if (!isset($counter[$year])) {
                // Get last number for this year
                $lastDemande = Demande::whereYear('created_at', $year)
                    ->whereNotNull('numero_demande')
                    ->orderBy('id', 'desc')
                    ->first();
                
                if ($lastDemande && $lastDemande->numero_demande) {
                    $parts = explode('-', $lastDemande->numero_demande);
                    $counter[$year] = isset($parts[2]) ? intval($parts[2]) : 0;
                } else {
                    $counter[$year] = 0;
                }
            }
            
            $counter[$year]++;
            $numeroDemande = 'DEM-' . $year . '-' . str_pad($counter[$year], 4, '0', STR_PAD_LEFT);
            
            $demande->numero_demande = $numeroDemande;
            $demande->save();
            
            $this->line("Demande #{$demande->id} -> {$numeroDemande}");
        }
        
        $this->info("Terminé ! {$demandes->count()} demande(s) mise(s) à jour.");
        return 0;
    }
}
