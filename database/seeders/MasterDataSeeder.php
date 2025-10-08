<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Ville;
use App\Models\ArrondissementCommune;
use App\Models\CategorieFormation;
use App\Models\TypeCategorieFormation;
use App\Models\NiveauCategorieFormation;
use App\Models\NomFormationSanitaire;
use App\Models\CategorieCadre;
use App\Models\Cadre;
use App\Models\GradeCadre;
use App\Models\Specialite;
use App\Models\Grade;
use App\Models\SpecialiteGrade;
use App\Models\Position;
use App\Models\TypeMutation;
use App\Models\Service;
use App\Models\Fonction;
use App\Models\TypeConge;
use App\Models\TypeCertificate;
use App\Models\TypeStage;

class MasterDataSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding master data...');

        // Regions
        $regions = [
            ['nom' => 'Fès-Meknès', 'nom_arabe' => 'فاس مكناس'],
            ['nom' => 'Rabat-Salé-Kénitra', 'nom_arabe' => 'الرباط سلا القنيطرة'],
            ['nom' => 'Casablanca-Settat', 'nom_arabe' => 'الدار البيضاء سطات'],
            ['nom' => 'Marrakech-Safi', 'nom_arabe' => 'مراكش آسفي'],
            ['nom' => 'Tanger-Tétouan-Al Hoceïma', 'nom_arabe' => 'طنجة تطوان الحسيمة'],
            ['nom' => 'Oriental', 'nom_arabe' => 'الشرق'],
            ['nom' => 'Souss-Massa', 'nom_arabe' => 'سوس ماسة'],
            ['nom' => 'Drâa-Tafilalet', 'nom_arabe' => 'درعة تافيلالت'],
            ['nom' => 'Béni Mellal-Khénifra', 'nom_arabe' => 'بني ملال خنيفرة'],
            ['nom' => 'Guelmim-Oued Noun', 'nom_arabe' => 'كلميم واد نون'],
            ['nom' => 'Laâyoune-Sakia El Hamra', 'nom_arabe' => 'العيون الساقية الحمراء'],
            ['nom' => 'Dakhla-Oued Ed-Dahab', 'nom_arabe' => 'الداخلة وادي الذهب']
        ];

        foreach ($regions as $region) {
            Region::create($region);
        }

        // Villes for Fès-Meknès region
        $villes = [
            ['nom' => 'Fès', 'nom_arabe' => 'فاس', 'region_id' => 1],
            ['nom' => 'Meknès', 'nom_arabe' => 'مكناس', 'region_id' => 1],
            ['nom' => 'Taza', 'nom_arabe' => 'تازة', 'region_id' => 1],
            ['nom' => 'Sefrou', 'nom_arabe' => 'صفرو', 'region_id' => 1],
            ['nom' => 'El Hajeb', 'nom_arabe' => 'الحاجب', 'region_id' => 1],
            ['nom' => 'Ifrane', 'nom_arabe' => 'إفران', 'region_id' => 1],
            ['nom' => 'Moulay Yacoub', 'nom_arabe' => 'مولاي يعقوب', 'region_id' => 1],
            ['nom' => 'Boulemane', 'nom_arabe' => 'بولمان', 'region_id' => 1],
            ['nom' => 'Taounate', 'nom_arabe' => 'تاونات', 'region_id' => 1],
            ['nom' => 'Khénifra', 'nom_arabe' => 'خنيفرة', 'region_id' => 1]
        ];

        foreach ($villes as $ville) {
            Ville::create($ville);
        }

        // Arrondissements/Communes
        $arrondissements = [
            ['nom' => 'Agdal', 'nom_arabe' => 'أكدال', 'ville_id' => 1],
            ['nom' => 'Saiss', 'nom_arabe' => 'سايس', 'ville_id' => 1],
            ['nom' => 'Zouagha', 'nom_arabe' => 'زواغة', 'ville_id' => 1],
            ['nom' => 'Jnan El Ward', 'nom_arabe' => 'جنان الورد', 'ville_id' => 1],
            ['nom' => 'Marinides', 'nom_arabe' => 'المرينيين', 'ville_id' => 1],
            ['nom' => 'Médina', 'nom_arabe' => 'المدينة', 'ville_id' => 1],
            ['nom' => 'Hamria', 'nom_arabe' => 'الحمرية', 'ville_id' => 2],
            ['nom' => 'Toulal', 'nom_arabe' => 'تولال', 'ville_id' => 2],
            ['nom' => 'Zitoune', 'nom_arabe' => 'الزيتون', 'ville_id' => 2],
            ['nom' => 'Ouislane', 'nom_arabe' => 'ويسلان', 'ville_id' => 2]
        ];

        foreach ($arrondissements as $arr) {
            ArrondissementCommune::create($arr);
        }

        // Categories Formation
        $categoriesFormation = [
            ['nom' => 'Formation Médicale', 'nom_arabe' => 'التكوين الطبي'],
            ['nom' => 'Formation Paramédicale', 'nom_arabe' => 'التكوين شبه الطبي'],
            ['nom' => 'Formation Administrative', 'nom_arabe' => 'التكوين الإداري'],
            ['nom' => 'Formation Technique', 'nom_arabe' => 'التكوين التقني'],
            ['nom' => 'Formation Spécialisée', 'nom_arabe' => 'التكوين المتخصص']
        ];

        foreach ($categoriesFormation as $cat) {
            CategorieFormation::create($cat);
        }

        // Types Categories Formation
        $typesCategories = [
            ['nom' => 'Formation Initiale', 'nom_arabe' => 'التكوين الأولي', 'categorie_formation_id' => 1],
            ['nom' => 'Formation Continue', 'nom_arabe' => 'التكوين المستمر', 'categorie_formation_id' => 1],
            ['nom' => 'Formation Spécialisée', 'nom_arabe' => 'التكوين المتخصص', 'categorie_formation_id' => 1],
            ['nom' => 'Formation de Base', 'nom_arabe' => 'التكوين الأساسي', 'categorie_formation_id' => 2],
            ['nom' => 'Formation Avancée', 'nom_arabe' => 'التكوين المتقدم', 'categorie_formation_id' => 2],
            ['nom' => 'Gestion Administrative', 'nom_arabe' => 'التسيير الإداري', 'categorie_formation_id' => 3],
            ['nom' => 'Ressources Humaines', 'nom_arabe' => 'الموارد البشرية', 'categorie_formation_id' => 3],
            ['nom' => 'Maintenance', 'nom_arabe' => 'الصيانة', 'categorie_formation_id' => 4],
            ['nom' => 'Informatique', 'nom_arabe' => 'المعلوميات', 'categorie_formation_id' => 4]
        ];

        foreach ($typesCategories as $type) {
            TypeCategorieFormation::create($type);
        }

        // Niveaux Categories Formation
        $niveauxCategories = [
            ['nom' => 'Niveau 1', 'nom_arabe' => 'المستوى 1', 'type_categorie_formation_id' => 1],
            ['nom' => 'Niveau 2', 'nom_arabe' => 'المستوى 2', 'type_categorie_formation_id' => 1],
            ['nom' => 'Niveau 3', 'nom_arabe' => 'المستوى 3', 'type_categorie_formation_id' => 1],
            ['nom' => 'Débutant', 'nom_arabe' => 'مبتدئ', 'type_categorie_formation_id' => 2],
            ['nom' => 'Intermédiaire', 'nom_arabe' => 'متوسط', 'type_categorie_formation_id' => 2],
            ['nom' => 'Avancé', 'nom_arabe' => 'متقدم', 'type_categorie_formation_id' => 2],
            ['nom' => 'Expert', 'nom_arabe' => 'خبير', 'type_categorie_formation_id' => 3]
        ];

        foreach ($niveauxCategories as $niveau) {
            NiveauCategorieFormation::create($niveau);
        }

        // Formations Sanitaires
        $formationsSanitaires = [
            ['nom' => 'CHU Hassan II Fès', 'nom_arabe' => 'المستشفى الجامعي الحسن الثاني فاس', 'niveau_categorie_formation_id' => 1],
            ['nom' => 'Hôpital Provincial Sefrou', 'nom_arabe' => 'المستشفى الإقليمي صفرو', 'niveau_categorie_formation_id' => 2],
            ['nom' => 'Centre de Santé Agdal', 'nom_arabe' => 'المركز الصحي أكدال', 'niveau_categorie_formation_id' => 3],
            ['nom' => 'Dispensaire Saiss', 'nom_arabe' => 'المستوصف سايس', 'niveau_categorie_formation_id' => 4],
            ['nom' => 'CHR Meknès', 'nom_arabe' => 'المستشفى الجهوي مكناس', 'niveau_categorie_formation_id' => 1],
            ['nom' => 'Hôpital Provincial Taza', 'nom_arabe' => 'المستشفى الإقليمي تازة', 'niveau_categorie_formation_id' => 2],
            ['nom' => 'Centre de Santé Ifrane', 'nom_arabe' => 'المركز الصحي إفران', 'niveau_categorie_formation_id' => 3],
            ['nom' => 'Dispensaire El Hajeb', 'nom_arabe' => 'المستوصف الحاجب', 'niveau_categorie_formation_id' => 4],
            ['nom' => 'Hôpital Spécialisé Oncologie', 'nom_arabe' => 'المستشفى المتخصص في الأورام', 'niveau_categorie_formation_id' => 5],
            ['nom' => 'Centre de Santé Moulay Yacoub', 'nom_arabe' => 'المركز الصحي مولاي يعقوب', 'niveau_categorie_formation_id' => 6]
        ];

        foreach ($formationsSanitaires as $formation) {
            NomFormationSanitaire::create($formation);
        }

        $this->command->info('Master data seeded successfully!');
    }
}
