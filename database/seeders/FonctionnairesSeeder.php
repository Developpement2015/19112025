<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fonctionnaire;
use App\Models\Retraite;
use Carbon\Carbon;
use Faker\Factory as Faker;

class FonctionnairesSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding fonctionnaires...');
        
        $faker = Faker::create('fr_FR');
        
        // Noms marocains réalistes
        $nomsMarocains = [
            'ALAMI', 'BENALI', 'CHERKAOUI', 'DOUIRI', 'EL FASSI', 'FILALI', 'GHAZI', 'HAJJI',
            'IDRISSI', 'JAMAL', 'KABBAJ', 'LAHLOU', 'MANSOURI', 'NACIRI', 'OUALI', 'QADIRI',
            'RACHIDI', 'SLAOUI', 'TAZI', 'USMANI', 'WAHBI', 'YOUSFI', 'ZIANI', 'AMRANI',
            'BERRADA', 'CHRAIBI', 'DRISSI', 'EL ALAOUI', 'FASSI', 'GUERRAOUI', 'HASSANI',
            'ISMAILI', 'JEBARI', 'KETTANI', 'LAMRANI', 'MEKOUAR', 'NEJJAR', 'OUAZZANI'
        ];
        
        $prenomsHommes = [
            'Mohammed', 'Ahmed', 'Hassan', 'Omar', 'Youssef', 'Khalid', 'Abdelkader', 'Mustapha',
            'Said', 'Rachid', 'Karim', 'Noureddine', 'Abdellatif', 'Driss', 'Fouad', 'Jamal',
            'Abdellah', 'Brahim', 'Hamid', 'Larbi', 'Aziz', 'Tarik', 'Amine', 'Hicham'
        ];
        
        $prenomsFemmes = [
            'Fatima', 'Aicha', 'Khadija', 'Zineb', 'Amina', 'Latifa', 'Naima', 'Malika',
            'Samira', 'Nadia', 'Rajae', 'Souad', 'Hafida', 'Karima', 'Siham', 'Widad',
            'Nezha', 'Houria', 'Saida', 'Jamila', 'Zohra', 'Bouchra', 'Laila', 'Meryem'
        ];
        
        // Créer 200 fonctionnaires avec des données réalistes
        for ($i = 1; $i <= 200; $i++) {
            $sexe = $faker->randomElement(['M', 'F']);
            $prenom = $sexe === 'M' ? $faker->randomElement($prenomsHommes) : $faker->randomElement($prenomsFemmes);
            $nom = $faker->randomElement($nomsMarocains);
            
            // Générer des âges variés (25-70 ans) pour tester les retraites
            $age = $faker->numberBetween(25, 70);
            $dateNaissance = Carbon::now()->subYears($age)->subDays($faker->numberBetween(1, 365));
            
            // Date d'embauche entre 1980 et 2020
            $anneesService = $faker->numberBetween(3, 40);
            $dateEmbauche = Carbon::now()->subYears($anneesService)->subDays($faker->numberBetween(1, 365));
            
            // S'assurer que la date d'embauche est après la date de naissance + 20 ans minimum
            if ($dateEmbauche->diffInYears($dateNaissance) < 20) {
                $dateEmbauche = $dateNaissance->copy()->addYears(22);
            }
            
            $fonctionnaire = Fonctionnaire::create([
                'ppr' => str_pad($faker->unique()->numberBetween(100000, 999999), 6, '0', STR_PAD_LEFT),
                'nom' => $nom,
                'nom_arabe' => $this->translateToArabic($nom),
                'prenom' => $prenom,
                'prenom_arabe' => $this->translateToArabic($prenom),
                'cin' => strtoupper($faker->bothify('??######')),
                'sexe' => $sexe,
                'date_naissance' => $dateNaissance->format('Y-m-d'),
                'date_embauche' => $dateEmbauche->format('Y-m-d'),
                'email' => strtolower($prenom . '.' . $nom . '@sante.gov.ma'),
                'telephone' => '0' . $faker->randomElement(['6', '7']) . $faker->numerify('########'),
                'adresse' => $faker->address,
                'fonction_id' => $faker->numberBetween(1, 28),
                'nom_formation_sanitaire_id' => $faker->numberBetween(1, 10),
                'remarques' => $faker->optional(0.3)->sentence(),
                'service_id' => $faker->numberBetween(1, 25),
                'specialite_grade_id' => $faker->numberBetween(1, 13),
                'position_id' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7]), // Éviter retraite/démission pour la plupart
                'type_mutation' => $faker->numberBetween(1, 8),
                'date_mutation' => $dateEmbauche->format('Y-m-d'),
                'date_prise_en_service' => $dateEmbauche->copy()->addDays($faker->numberBetween(1, 30))->format('Y-m-d'),
                'date_note' => $faker->optional(0.5)->dateTimeBetween($dateEmbauche, 'now')->format('Y-m-d'),
                'ref_note' => $faker->optional(0.5)->bothify('NOTE-####-??'),
                'fichier_note' => null
            ]);
            
            // Créer automatiquement des retraites pour les fonctionnaires de 62.5 ans et plus
            if ($age >= 62.5) {
                $dateRetraite = $dateNaissance->copy()->addYears(62.5);
                
                // Si la date de retraite est dans le passé, la mettre à aujourd'hui
                if ($dateRetraite->isPast()) {
                    $dateRetraite = Carbon::today();
                }
                
                $ageRetraite = $dateNaissance->diffInYears($dateRetraite, false);
                $anneesServiceRetraite = $dateEmbauche->diffInYears($dateRetraite, false);
                
                Retraite::create([
                    'fonctionnaire_id' => $fonctionnaire->id,
                    'type_retraite' => 'limite_age',
                    'date_retraite' => $dateRetraite->format('Y-m-d'),
                    'age_retraite' => $ageRetraite,
                    'annees_service' => $anneesServiceRetraite,
                    'motif' => 'Retraite automatique - limite d\'âge atteinte (62.5 ans)',
                    'statut' => $faker->randomElement(['propose', 'valide', 'effectue']),
                    'created_by' => 1, // Admin user
                    'validated_by' => $faker->optional(0.7)->randomElement([1]),
                    'validated_at' => $faker->optional(0.7)->dateTimeBetween('-1 year', 'now'),
                    'remarques' => $faker->optional(0.3)->sentence()
                ]);
            }
            
            // Créer quelques retraites anticipées pour des fonctionnaires plus jeunes
            if ($age >= 55 && $age < 62.5 && $faker->boolean(10)) { // 10% de chance
                $dateRetraite = Carbon::now()->addDays($faker->numberBetween(30, 365));
                $ageRetraite = $dateNaissance->diffInYears($dateRetraite, false);
                $anneesServiceRetraite = $dateEmbauche->diffInYears($dateRetraite, false);
                
                $motifs = [
                    'Retraite anticipée pour raisons de santé',
                    'Retraite anticipée volontaire',
                    'Retraite anticipée pour raisons familiales',
                    'Retraite anticipée après 30 ans de service'
                ];
                
                Retraite::create([
                    'fonctionnaire_id' => $fonctionnaire->id,
                    'type_retraite' => 'anticipee',
                    'date_retraite' => $dateRetraite->format('Y-m-d'),
                    'age_retraite' => $ageRetraite,
                    'annees_service' => $anneesServiceRetraite,
                    'motif' => $faker->randomElement($motifs),
                    'statut' => $faker->randomElement(['propose', 'valide']),
                    'created_by' => 1,
                    'validated_by' => $faker->optional(0.5)->randomElement([1]),
                    'validated_at' => $faker->optional(0.5)->dateTimeBetween('-6 months', 'now'),
                    'remarques' => $faker->optional(0.4)->sentence()
                ]);
            }
        }
        
        $this->command->info('200 fonctionnaires created with realistic retirement data!');
    }
    
    private function translateToArabic($name)
    {
        $translations = [
            // Noms
            'ALAMI' => 'العلمي', 'BENALI' => 'بن علي', 'CHERKAOUI' => 'الشرقاوي',
            'DOUIRI' => 'الدويري', 'EL FASSI' => 'الفاسي', 'FILALI' => 'الفيلالي',
            'GHAZI' => 'الغازي', 'HAJJI' => 'الحجي', 'IDRISSI' => 'الإدريسي',
            'JAMAL' => 'جمال', 'KABBAJ' => 'القباج', 'LAHLOU' => 'لحلو',
            'MANSOURI' => 'المنصوري', 'NACIRI' => 'الناصري', 'OUALI' => 'الوالي',
            'QADIRI' => 'القادري', 'RACHIDI' => 'الراشدي', 'SLAOUI' => 'السلاوي',
            'TAZI' => 'التازي', 'USMANI' => 'العثماني', 'WAHBI' => 'الوهبي',
            'YOUSFI' => 'اليوسفي', 'ZIANI' => 'الزياني', 'AMRANI' => 'العمراني',
            
            // Prénoms masculins
            'Mohammed' => 'محمد', 'Ahmed' => 'أحمد', 'Hassan' => 'حسن',
            'Omar' => 'عمر', 'Youssef' => 'يوسف', 'Khalid' => 'خالد',
            'Abdelkader' => 'عبد القادر', 'Mustapha' => 'مصطفى', 'Said' => 'سعيد',
            'Rachid' => 'رشيد', 'Karim' => 'كريم', 'Noureddine' => 'نور الدين',
            
            // Prénoms féminins
            'Fatima' => 'فاطمة', 'Aicha' => 'عائشة', 'Khadija' => 'خديجة',
            'Zineb' => 'زينب', 'Amina' => 'أمينة', 'Latifa' => 'لطيفة',
            'Naima' => 'نعيمة', 'Malika' => 'مليكة', 'Samira' => 'سميرة',
            'Nadia' => 'نادية', 'Rajae' => 'رجاء', 'Souad' => 'سعاد'
        ];
        
        return $translations[$name] ?? $name;
    }
}
