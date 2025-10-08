<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ecole;
use App\Models\Option;
use App\Models\Encadrant;
use App\Models\Stage;
use App\Models\Service;
use App\Models\NomFormationSanitaire;

class StageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer des écoles
        $ecoles = [
            ['nom' => 'Université Mohammed V', 'nom_arabe' => 'جامعة محمد الخامس'],
            ['nom' => 'Université Hassan II', 'nom_arabe' => 'جامعة الحسن الثاني'],
            ['nom' => 'Institut Supérieur des Sciences de la Santé', 'nom_arabe' => 'المعهد العالي لعلوم الصحة'],
            ['nom' => 'École Nationale de Santé Publique', 'nom_arabe' => 'المدرسة الوطنية للصحة العمومية'],
            ['nom' => 'Faculté de Médecine et de Pharmacie', 'nom_arabe' => 'كلية الطب والصيدلة'],
        ];

        foreach ($ecoles as $ecole) {
            Ecole::create($ecole);
        }

        // Créer des options/spécialités
        $options = [
            ['nom' => 'Kinésithérapeute', 'nom_arabe' => 'أخصائي العلاج الطبيعي'],
            ['nom' => 'Aide Soignant', 'nom_arabe' => 'مساعد ممرض'],
            ['nom' => 'Infirmier', 'nom_arabe' => 'ممرض'],
            ['nom' => 'Technicien de Laboratoire', 'nom_arabe' => 'تقني مختبر'],
            ['nom' => 'Radiologie', 'nom_arabe' => 'الأشعة'],
            ['nom' => 'Pharmacie', 'nom_arabe' => 'الصيدلة'],
            ['nom' => 'Médecine Générale', 'nom_arabe' => 'الطب العام'],
            ['nom' => 'Administration Hospitalière', 'nom_arabe' => 'الإدارة الاستشفائية'],
        ];

        foreach ($options as $option) {
            Option::create($option);
        }

        // Créer des encadrants
        $encadrants = [
            ['nom' => 'Dr. Ahmed Benali', 'nom_arabe' => 'د. أحمد بن علي', 'fonction' => 'Chef de Service', 'fonction_arabe' => 'رئيس المصلحة'],
            ['nom' => 'Dr. Fatima Zahra', 'nom_arabe' => 'د. فاطمة الزهراء', 'fonction' => 'Médecin Spécialiste', 'fonction_arabe' => 'طبيب مختص'],
            ['nom' => 'Mme. Khadija Alami', 'nom_arabe' => 'السيدة خديجة العلمي', 'fonction' => 'Infirmière Major', 'fonction_arabe' => 'ممرضة رئيسية'],
            ['nom' => 'M. Omar Tazi', 'nom_arabe' => 'السيد عمر التازي', 'fonction' => 'Technicien Principal', 'fonction_arabe' => 'تقني رئيسي'],
            ['nom' => 'Dr. Youssef Idrissi', 'nom_arabe' => 'د. يوسف الإدريسي', 'fonction' => 'Directeur Médical', 'fonction_arabe' => 'مدير طبي'],
        ];

        foreach ($encadrants as $encadrant) {
            Encadrant::create($encadrant);
        }

        // Créer des stages d'exemple
        $stages = [
            [
                'nom_prenom' => 'Amina Benali',
                'cin' => 'AB123456',
                'institut_details' => 'Étudiante en 3ème année de kinésithérapie à l\'Université Mohammed V',
                'duree' => 30,
                'date_debut' => '2024-01-15',
                'date_fin' => '2024-02-14',
                'hierarchie' => 'Directeur Régional de la Santé',
                'avis' => 'Stage effectué avec satisfaction',
                'statut_attestation' => 'traité',
                'cadre' => 'médical',
                'type_stage' => 'formation',
                'ecole_id' => 1,
                'option_id' => 1,
                'service_id' => 24, // Radiologie
                'formation_sanitaire_id' => 9, // Alghassani
                'encadrant_id' => 1,
            ],
            [
                'nom_prenom' => 'Mohammed Tazi',
                'cin' => 'MT789012',
                'institut_details' => 'Étudiant en 2ème année d\'aide soignant à l\'Institut Supérieur des Sciences de la Santé',
                'duree' => 45,
                'date_debut' => '2024-02-01',
                'date_fin' => '2024-03-17',
                'hierarchie' => 'Chef de Service',
                'avis' => null,
                'statut_attestation' => 'en cours',
                'cadre' => 'médical',
                'type_stage' => 'volontaire',
                'ecole_id' => 3,
                'option_id' => 2,
                'service_id' => 25, // Urgence
                'formation_sanitaire_id' => 10, // Monfleuri 1
                'encadrant_id' => 2,
            ],
            [
                'nom_prenom' => 'Sara Alami',
                'cin' => 'SA345678',
                'institut_details' => 'Étudiante en 1ère année d\'infirmerie à l\'École Nationale de Santé Publique',
                'duree' => 60,
                'date_debut' => '2024-03-01',
                'date_fin' => '2024-04-30',
                'hierarchie' => 'Directeur de l\'Hôpital',
                'avis' => 'Excellent travail et motivation',
                'statut_attestation' => 'traité',
                'cadre' => 'médical',
                'type_stage' => 'formation',
                'ecole_id' => 4,
                'option_id' => 3,
                'service_id' => 30, // pédiatrie
                'formation_sanitaire_id' => 11, // fondation med VI traitement cancer
                'encadrant_id' => 3,
            ],
        ];

        foreach ($stages as $stage) {
            Stage::create($stage);
        }
    }
}
