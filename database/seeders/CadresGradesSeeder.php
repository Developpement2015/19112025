<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CategorieCadre;
use App\Models\Cadre;
use App\Models\GradeCadre;
use App\Models\Specialite;
use App\Models\Grade;
use App\Models\SpecialiteGrade;

class CadresGradesSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding cadres and grades...');

        // Categories Cadres
        $categoriesCadres = [
            ['nom' => 'Cadres Médicaux', 'nom_arabe' => 'الأطر الطبية'],
            ['nom' => 'Cadres Paramédicaux', 'nom_arabe' => 'الأطر شبه الطبية'],
            ['nom' => 'Cadres Administratifs', 'nom_arabe' => 'الأطر الإدارية'],
            ['nom' => 'Cadres Techniques', 'nom_arabe' => 'الأطر التقنية'],
            ['nom' => 'Cadres de Soutien', 'nom_arabe' => 'أطر الدعم']
        ];

        foreach ($categoriesCadres as $cat) {
            CategorieCadre::create($cat);
        }

        // Cadres
        $cadres = [
            // Cadres Médicaux
            ['nom' => 'Médecins Spécialistes', 'nom_arabe' => 'الأطباء المختصون', 'categorie_cadre_id' => 1],
            ['nom' => 'Médecins Généralistes', 'nom_arabe' => 'الأطباء العامون', 'categorie_cadre_id' => 1],
            ['nom' => 'Chirurgiens-Dentistes', 'nom_arabe' => 'أطباء الأسنان', 'categorie_cadre_id' => 1],
            ['nom' => 'Pharmaciens', 'nom_arabe' => 'الصيادلة', 'categorie_cadre_id' => 1],
            
            // Cadres Paramédicaux
            ['nom' => 'Infirmiers Diplômés d\'État', 'nom_arabe' => 'الممرضون المجازون', 'categorie_cadre_id' => 2],
            ['nom' => 'Techniciens de Santé', 'nom_arabe' => 'التقنيون الصحيون', 'categorie_cadre_id' => 2],
            ['nom' => 'Sages-Femmes', 'nom_arabe' => 'القابلات', 'categorie_cadre_id' => 2],
            ['nom' => 'Auxiliaires de Santé', 'nom_arabe' => 'مساعدو الصحة', 'categorie_cadre_id' => 2],
            
            // Cadres Administratifs
            ['nom' => 'Administrateurs', 'nom_arabe' => 'الإداريون', 'categorie_cadre_id' => 3],
            ['nom' => 'Attachés d\'Administration', 'nom_arabe' => 'ملحقو الإدارة', 'categorie_cadre_id' => 3],
            ['nom' => 'Secrétaires d\'Administration', 'nom_arabe' => 'كتاب الإدارة', 'categorie_cadre_id' => 3],
            ['nom' => 'Agents d\'Administration', 'nom_arabe' => 'أعوان الإدارة', 'categorie_cadre_id' => 3],
            
            // Cadres Techniques
            ['nom' => 'Ingénieurs', 'nom_arabe' => 'المهندسون', 'categorie_cadre_id' => 4],
            ['nom' => 'Techniciens Spécialisés', 'nom_arabe' => 'التقنيون المتخصصون', 'categorie_cadre_id' => 4],
            ['nom' => 'Techniciens', 'nom_arabe' => 'التقنيون', 'categorie_cadre_id' => 4],
            
            // Cadres de Soutien
            ['nom' => 'Agents de Service', 'nom_arabe' => 'أعوان الخدمة', 'categorie_cadre_id' => 5],
            ['nom' => 'Gardiens', 'nom_arabe' => 'الحراس', 'categorie_cadre_id' => 5],
            ['nom' => 'Chauffeurs', 'nom_arabe' => 'السائقون', 'categorie_cadre_id' => 5]
        ];

        foreach ($cadres as $cadre) {
            Cadre::create($cadre);
        }

        // Grades Cadres
        $gradesCadres = [
            // Pour Médecins Spécialistes
            ['nom' => 'Professeur de l\'Enseignement Supérieur', 'nom_arabe' => 'أستاذ التعليم العالي', 'cadre_id' => 1],
            ['nom' => 'Professeur Agrégé', 'nom_arabe' => 'أستاذ مبرز', 'cadre_id' => 1],
            ['nom' => 'Professeur Assistant', 'nom_arabe' => 'أستاذ مساعد', 'cadre_id' => 1],
            ['nom' => 'Médecin Spécialiste Principal', 'nom_arabe' => 'طبيب مختص رئيسي', 'cadre_id' => 1],
            ['nom' => 'Médecin Spécialiste', 'nom_arabe' => 'طبيب مختص', 'cadre_id' => 1],
            
            // Pour Médecins Généralistes
            ['nom' => 'Médecin Principal', 'nom_arabe' => 'طبيب رئيسي', 'cadre_id' => 2],
            ['nom' => 'Médecin', 'nom_arabe' => 'طبيب', 'cadre_id' => 2],
            
            // Pour Infirmiers
            ['nom' => 'Infirmier Major', 'nom_arabe' => 'ممرض رئيسي', 'cadre_id' => 5],
            ['nom' => 'Infirmier Principal', 'nom_arabe' => 'ممرض رئيسي', 'cadre_id' => 5],
            ['nom' => 'Infirmier', 'nom_arabe' => 'ممرض', 'cadre_id' => 5],
            
            // Pour Administrateurs
            ['nom' => 'Administrateur 1er Grade', 'nom_arabe' => 'إداري من الدرجة الأولى', 'cadre_id' => 9],
            ['nom' => 'Administrateur 2ème Grade', 'nom_arabe' => 'إداري من الدرجة الثانية', 'cadre_id' => 9],
            ['nom' => 'Administrateur 3ème Grade', 'nom_arabe' => 'إداري من الدرجة الثالثة', 'cadre_id' => 9]
        ];

        foreach ($gradesCadres as $grade) {
            GradeCadre::create($grade);
        }

        // Spécialités
        $specialites = [
            // Spécialités Médicales
            ['nom' => 'Cardiologie', 'nom_arabe' => 'أمراض القلب'],
            ['nom' => 'Neurologie', 'nom_arabe' => 'الأمراض العصبية'],
            ['nom' => 'Pédiatrie', 'nom_arabe' => 'طب الأطفال'],
            ['nom' => 'Gynécologie-Obstétrique', 'nom_arabe' => 'أمراض النساء والتوليد'],
            ['nom' => 'Chirurgie Générale', 'nom_arabe' => 'الجراحة العامة'],
            ['nom' => 'Anesthésie-Réanimation', 'nom_arabe' => 'التخدير والإنعاش'],
            ['nom' => 'Radiologie', 'nom_arabe' => 'الأشعة'],
            ['nom' => 'Laboratoire', 'nom_arabe' => 'المختبر'],
            ['nom' => 'Dermatologie', 'nom_arabe' => 'الأمراض الجلدية'],
            ['nom' => 'Ophtalmologie', 'nom_arabe' => 'طب العيون'],
            ['nom' => 'ORL', 'nom_arabe' => 'الأنف والأذن والحنجرة'],
            ['nom' => 'Orthopédie', 'nom_arabe' => 'جراحة العظام'],
            ['nom' => 'Urologie', 'nom_arabe' => 'المسالك البولية'],
            ['nom' => 'Psychiatrie', 'nom_arabe' => 'الطب النفسي'],
            ['nom' => 'Médecine Interne', 'nom_arabe' => 'الطب الباطني'],
            
            // Spécialités Paramédicales
            ['nom' => 'Soins Généraux', 'nom_arabe' => 'العناية العامة'],
            ['nom' => 'Soins Intensifs', 'nom_arabe' => 'العناية المركزة'],
            ['nom' => 'Bloc Opératoire', 'nom_arabe' => 'غرفة العمليات'],
            ['nom' => 'Urgences', 'nom_arabe' => 'الطوارئ'],
            ['nom' => 'Pédiatrie', 'nom_arabe' => 'طب الأطفال'],
            
            // Spécialités Techniques
            ['nom' => 'Maintenance Biomédicale', 'nom_arabe' => 'الصيانة الطبية الحيوية'],
            ['nom' => 'Informatique', 'nom_arabe' => 'المعلوميات'],
            ['nom' => 'Électricité', 'nom_arabe' => 'الكهرباء'],
            ['nom' => 'Plomberie', 'nom_arabe' => 'السباكة'],
            ['nom' => 'Climatisation', 'nom_arabe' => 'التكييف']
        ];

        foreach ($specialites as $specialite) {
            Specialite::create($specialite);
        }

        // Grades
        $grades = [
            ['nom' => 'Échelle 11', 'nom_arabe' => 'السلم 11'],
            ['nom' => 'Échelle 10', 'nom_arabe' => 'السلم 10'],
            ['nom' => 'Échelle 9', 'nom_arabe' => 'السلم 9'],
            ['nom' => 'Échelle 8', 'nom_arabe' => 'السلم 8'],
            ['nom' => 'Échelle 7', 'nom_arabe' => 'السلم 7'],
            ['nom' => 'Échelle 6', 'nom_arabe' => 'السلم 6'],
            ['nom' => 'Échelle 5', 'nom_arabe' => 'السلم 5'],
            ['nom' => 'Échelle 4', 'nom_arabe' => 'السلم 4'],
            ['nom' => 'Échelle 3', 'nom_arabe' => 'السلم 3'],
            ['nom' => 'Échelle 2', 'nom_arabe' => 'السلم 2']
        ];

        foreach ($grades as $grade) {
            Grade::create($grade);
        }

        // Spécialité-Grades (combinations)
        $specialiteGrades = [
            // Cardiologie avec différents grades
            ['specialite_id' => 1, 'grade_id' => 1, 'nom' => 'Cardiologue Échelle 11', 'nom_arabe' => 'طبيب قلب السلم 11'],
            ['specialite_id' => 1, 'grade_id' => 2, 'nom' => 'Cardiologue Échelle 10', 'nom_arabe' => 'طبيب قلب السلم 10'],
            ['specialite_id' => 1, 'grade_id' => 3, 'nom' => 'Cardiologue Échelle 9', 'nom_arabe' => 'طبيب قلب السلم 9'],
            
            // Pédiatrie
            ['specialite_id' => 3, 'grade_id' => 1, 'nom' => 'Pédiatre Échelle 11', 'nom_arabe' => 'طبيب أطفال السلم 11'],
            ['specialite_id' => 3, 'grade_id' => 2, 'nom' => 'Pédiatre Échelle 10', 'nom_arabe' => 'طبيب أطفال السلم 10'],
            
            // Infirmiers
            ['specialite_id' => 16, 'grade_id' => 6, 'nom' => 'Infirmier Soins Généraux Échelle 6', 'nom_arabe' => 'ممرض عناية عامة السلم 6'],
            ['specialite_id' => 16, 'grade_id' => 7, 'nom' => 'Infirmier Soins Généraux Échelle 7', 'nom_arabe' => 'ممرض عناية عامة السلم 7'],
            ['specialite_id' => 17, 'grade_id' => 6, 'nom' => 'Infirmier Soins Intensifs Échelle 6', 'nom_arabe' => 'ممرض عناية مركزة السلم 6'],
            
            // Administratifs
            ['specialite_id' => 22, 'grade_id' => 8, 'nom' => 'Informaticien Échelle 8', 'nom_arabe' => 'مهندس معلوميات السلم 8'],
            ['specialite_id' => 22, 'grade_id' => 9, 'nom' => 'Informaticien Échelle 9', 'nom_arabe' => 'مهندس معلوميات السلم 9'],
            
            // Techniques
            ['specialite_id' => 21, 'grade_id' => 7, 'nom' => 'Technicien Biomédical Échelle 7', 'nom_arabe' => 'تقني طبي حيوي السلم 7'],
            ['specialite_id' => 23, 'grade_id' => 5, 'nom' => 'Électricien Échelle 5', 'nom_arabe' => 'كهربائي السلم 5'],
            ['specialite_id' => 24, 'grade_id' => 4, 'nom' => 'Plombier Échelle 4', 'nom_arabe' => 'سباك السلم 4']
        ];

        foreach ($specialiteGrades as $sg) {
            SpecialiteGrade::create($sg);
        }

        $this->command->info('Cadres and grades seeded successfully!');
    }
}
