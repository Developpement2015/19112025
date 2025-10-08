<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fonctionnaire;
use App\Models\Mutation;
use App\Models\PositionFonctionnaire;
use App\Models\Conge;
use App\Models\Certificate;
use App\Models\Greve;
use Carbon\Carbon;
use Faker\Factory as Faker;

class TransactionalDataSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding transactional data...');
        
        $faker = Faker::create('fr_FR');
        $fonctionnaires = Fonctionnaire::all();
        
        foreach ($fonctionnaires as $fonctionnaire) {
            // Créer des mutations pour chaque fonctionnaire
            $this->createMutations($fonctionnaire, $faker);
            
            // Créer des positions pour chaque fonctionnaire
            $this->createPositions($fonctionnaire, $faker);
            
            // Créer des congés
            $this->createConges($fonctionnaire, $faker);
            
            // Créer des certificats
            $this->createCertificates($fonctionnaire, $faker);
            
            // Créer quelques grèves (optionnel)
            $this->createGreves($fonctionnaire, $faker);
        }
        
        $this->command->info('Transactional data seeded successfully!');
    }
    
    private function createMutations($fonctionnaire, $faker)
    {
        // Mutation initiale (recrutement)
        Mutation::create([
            'fonctionnaire_id' => $fonctionnaire->id,
            'type_mutation' => 1, // Recrutement
            'date_mutation' => $fonctionnaire->date_embauche,
            'service_origine_id' => null,
            'service_destination_id' => $fonctionnaire->service_id,
            'fonction_origine_id' => null,
            'fonction_destination_id' => $fonctionnaire->fonction_id,
            'nom_formation_sanitaire_origine_id' => null,
            'nom_formation_sanitaire_destination_id' => $fonctionnaire->nom_formation_sanitaire_id,
            'motif' => 'Recrutement initial',
            'ref_decision' => 'REC-' . $fonctionnaire->ppr . '-' . Carbon::parse($fonctionnaire->date_embauche)->format('Y'),
            'date_decision' => $fonctionnaire->date_embauche,
            'statut' => 'effectuee'
        ]);
        
        // Créer 1-3 mutations supplémentaires pour certains fonctionnaires
        $nombreMutations = $faker->numberBetween(0, 3);
        $dateDerniereMutation = Carbon::parse($fonctionnaire->date_embauche);
        
        for ($i = 0; $i < $nombreMutations; $i++) {
            $dateMutation = $dateDerniereMutation->copy()->addMonths($faker->numberBetween(6, 36));
            
            if ($dateMutation->isFuture()) {
                break;
            }
            
            $typeMutation = $faker->randomElement([2, 3, 4, 5, 7]); // Mutations internes, externes, promotions, etc.
            $nouveauService = $faker->numberBetween(1, 25);
            $nouvelleFonction = $faker->numberBetween(1, 28);
            
            Mutation::create([
                'fonctionnaire_id' => $fonctionnaire->id,
                'type_mutation' => $typeMutation,
                'date_mutation' => $dateMutation->format('Y-m-d'),
                'service_origine_id' => $fonctionnaire->service_id,
                'service_destination_id' => $nouveauService,
                'fonction_origine_id' => $fonctionnaire->fonction_id,
                'fonction_destination_id' => $nouvelleFonction,
                'nom_formation_sanitaire_origine_id' => $fonctionnaire->nom_formation_sanitaire_id,
                'nom_formation_sanitaire_destination_id' => $faker->numberBetween(1, 10),
                'motif' => $faker->sentence(),
                'ref_decision' => 'MUT-' . $fonctionnaire->ppr . '-' . $dateMutation->format('Y') . '-' . ($i + 1),
                'date_decision' => $dateMutation->format('Y-m-d'),
                'statut' => 'effectuee'
            ]);
            
            $dateDerniereMutation = $dateMutation;
        }
    }
    
    private function createPositions($fonctionnaire, $faker)
    {
        // Position initiale
        PositionFonctionnaire::create([
            'fonctionnaire_id' => $fonctionnaire->id,
            'position_id' => 1, // En activité
            'date_debut' => $fonctionnaire->date_embauche,
            'date_fin' => null,
            'motif' => 'Prise de service',
            'ref_decision' => 'POS-' . $fonctionnaire->ppr . '-INIT',
            'date_decision' => $fonctionnaire->date_embauche,
            'statut' => 'en_cours'
        ]);
        
        // Créer quelques changements de position
        $nombrePositions = $faker->numberBetween(0, 5);
        $dateDebut = Carbon::parse($fonctionnaire->date_embauche);
        
        for ($i = 0; $i < $nombrePositions; $i++) {
            $dateChangement = $dateDebut->copy()->addMonths($faker->numberBetween(3, 24));
            
            if ($dateChangement->isFuture()) {
                break;
            }
            
            $dureePosition = $faker->numberBetween(1, 12); // mois
            $dateFin = $dateChangement->copy()->addMonths($dureePosition);
            
            $positionId = $faker->randomElement([2, 3, 4, 5, 7]); // Congé, formation, mission, etc.
            
            PositionFonctionnaire::create([
                'fonctionnaire_id' => $fonctionnaire->id,
                'position_id' => $positionId,
                'date_debut' => $dateChangement->format('Y-m-d'),
                'date_fin' => $dateFin->format('Y-m-d'),
                'motif' => $faker->sentence(),
                'ref_decision' => 'POS-' . $fonctionnaire->ppr . '-' . $dateChangement->format('Y') . '-' . ($i + 1),
                'date_decision' => $dateChangement->format('Y-m-d'),
                'statut' => 'terminee'
            ]);
            
            $dateDebut = $dateFin;
        }
    }
    
    private function createConges($fonctionnaire, $faker)
    {
        $nombreConges = $faker->numberBetween(5, 15);
        $dateEmbauche = Carbon::parse($fonctionnaire->date_embauche);
        
        for ($i = 0; $i < $nombreConges; $i++) {
            $dateDebut = $dateEmbauche->copy()->addMonths($faker->numberBetween(1, 60));
            
            if ($dateDebut->isFuture()) {
                break;
            }
            
            $typeCongeId = $faker->numberBetween(1, 10);
            $duree = $faker->numberBetween(1, 30); // jours
            $dateFin = $dateDebut->copy()->addDays($duree);
            
            Conge::create([
                'fonctionnaire_id' => $fonctionnaire->id,
                'type_conge_id' => $typeCongeId,
                'date_debut' => $dateDebut->format('Y-m-d'),
                'date_fin' => $dateFin->format('Y-m-d'),
                'nbr_jours' => $duree,
                'motif' => $faker->optional(0.7)->sentence(),
                'ref_decision' => 'CONGE-' . $fonctionnaire->ppr . '-' . $dateDebut->format('Y') . '-' . ($i + 1),
                'date_decision' => $dateDebut->copy()->subDays($faker->numberBetween(1, 15))->format('Y-m-d'),
                'statut' => $faker->randomElement(['approuve', 'termine', 'en_cours']),
                'remarques' => $faker->optional(0.3)->sentence()
            ]);
        }
    }
    
    private function createCertificates($fonctionnaire, $faker)
    {
        $nombreCertificats = $faker->numberBetween(2, 8);
        
        for ($i = 0; $i < $nombreCertificats; $i++) {
            $dateEmission = $faker->dateTimeBetween($fonctionnaire->date_embauche, 'now');
            $typeCertificatId = $faker->numberBetween(1, 10);
            
            Certificate::create([
                'fonctionnaire_id' => $fonctionnaire->id,
                'type_certificate_id' => $typeCertificatId,
                'date_emission' => $dateEmission->format('Y-m-d'),
                'ref_certificate' => 'CERT-' . $fonctionnaire->ppr . '-' . $dateEmission->format('Y') . '-' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                'objet' => $faker->sentence(),
                'contenu' => $faker->paragraph(),
                'statut' => $faker->randomElement(['emis', 'delivre', 'annule']),
                'remarques' => $faker->optional(0.3)->sentence(),
                'fichier_path' => null
            ]);
        }
    }
    
    private function createGreves($fonctionnaire, $faker)
    {
        // Seulement 20% des fonctionnaires participent à des grèves
        if ($faker->boolean(20)) {
            $nombreGreves = $faker->numberBetween(1, 3);
            
            for ($i = 0; $i < $nombreGreves; $i++) {
                $dateGreve = $faker->dateTimeBetween($fonctionnaire->date_embauche, 'now');
                $duree = $faker->numberBetween(1, 5); // jours
                
                Greve::create([
                    'fonctionnaire_id' => $fonctionnaire->id,
                    'date_debut' => $dateGreve->format('Y-m-d'),
                    'date_fin' => Carbon::parse($dateGreve)->addDays($duree)->format('Y-m-d'),
                    'nbr_jours' => $duree,
                    'motif' => $faker->randomElement([
                        'Grève pour amélioration des conditions de travail',
                        'Grève pour augmentation salariale',
                        'Grève de solidarité',
                        'Grève contre les réformes'
                    ]),
                    'type_greve' => $faker->randomElement(['totale', 'partielle', 'tournante']),
                    'statut' => 'terminee',
                    'remarques' => $faker->optional(0.4)->sentence(),
                    'ref_decision' => 'GREVE-' . $dateGreve->format('Y-m-d') . '-' . $fonctionnaire->ppr
                ]);
            }
        }
    }
}
