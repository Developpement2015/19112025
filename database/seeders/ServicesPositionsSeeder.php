<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;
use App\Models\TypeMutation;
use App\Models\Service;
use App\Models\Fonction;
use App\Models\TypeConge;
use App\Models\TypeCertificate;
use App\Models\TypeStage;

class ServicesPositionsSeeder extends Seeder
{
    public function run()
    {
        $this->command->info('Seeding services, positions, and other reference data...');

        // Positions
        $positions = [
            ['nom' => 'En Activité', 'nom_arabe' => 'في حالة نشاط'],
            ['nom' => 'En Congé', 'nom_arabe' => 'في إجازة'],
            ['nom' => 'En Formation', 'nom_arabe' => 'في تكوين'],
            ['nom' => 'En Mission', 'nom_arabe' => 'في مهمة'],
            ['nom' => 'En Disponibilité', 'nom_arabe' => 'في حالة توفر'],
            ['nom' => 'Détaché', 'nom_arabe' => 'منتدب'],
            ['nom' => 'En Maladie', 'nom_arabe' => 'في حالة مرض'],
            ['nom' => 'Suspendu', 'nom_arabe' => 'موقوف'],
            ['nom' => 'En Retraite', 'nom_arabe' => 'متقاعد'],
            ['nom' => 'Démissionnaire', 'nom_arabe' => 'مستقيل']
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }

        // Types de Mutation
        $typesMutation = [
            ['nom' => 'Recrutement', 'nom_arabe' => 'توظيف'],
            ['nom' => 'Mutation Interne', 'nom_arabe' => 'نقلة داخلية'],
            ['nom' => 'Mutation Externe', 'nom_arabe' => 'نقلة خارجية'],
            ['nom' => 'Promotion', 'nom_arabe' => 'ترقية'],
            ['nom' => 'Détachement', 'nom_arabe' => 'انتداب'],
            ['nom' => 'Réintégration', 'nom_arabe' => 'إعادة إدماج'],
            ['nom' => 'Affectation', 'nom_arabe' => 'تعيين'],
            ['nom' => 'Transfert', 'nom_arabe' => 'تحويل']
        ];

        foreach ($typesMutation as $type) {
            TypeMutation::create($type);
        }

        // Services
        $services = [
            // Services Médicaux
            ['nom' => 'Service de Cardiologie', 'nom_arabe' => 'مصلحة أمراض القلب'],
            ['nom' => 'Service de Pédiatrie', 'nom_arabe' => 'مصلحة طب الأطفال'],
            ['nom' => 'Service de Chirurgie Générale', 'nom_arabe' => 'مصلحة الجراحة العامة'],
            ['nom' => 'Service de Gynécologie', 'nom_arabe' => 'مصلحة أمراض النساء'],
            ['nom' => 'Service d\'Urgences', 'nom_arabe' => 'مصلحة الطوارئ'],
            ['nom' => 'Service de Radiologie', 'nom_arabe' => 'مصلحة الأشعة'],
            ['nom' => 'Service de Laboratoire', 'nom_arabe' => 'مصلحة المختبر'],
            ['nom' => 'Service d\'Anesthésie', 'nom_arabe' => 'مصلحة التخدير'],
            ['nom' => 'Service de Réanimation', 'nom_arabe' => 'مصلحة الإنعاش'],
            ['nom' => 'Service de Pharmacie', 'nom_arabe' => 'مصلحة الصيدلة'],
            
            // Services Administratifs
            ['nom' => 'Direction Générale', 'nom_arabe' => 'الإدارة العامة'],
            ['nom' => 'Service des Ressources Humaines', 'nom_arabe' => 'مصلحة الموارد البشرية'],
            ['nom' => 'Service Financier', 'nom_arabe' => 'المصلحة المالية'],
            ['nom' => 'Service des Affaires Générales', 'nom_arabe' => 'مصلحة الشؤون العامة'],
            ['nom' => 'Service Informatique', 'nom_arabe' => 'مصلحة المعلوميات'],
            ['nom' => 'Service de la Formation', 'nom_arabe' => 'مصلحة التكوين'],
            ['nom' => 'Service des Marchés Publics', 'nom_arabe' => 'مصلحة الصفقات العمومية'],
            ['nom' => 'Service de la Maintenance', 'nom_arabe' => 'مصلحة الصيانة'],
            ['nom' => 'Service de la Sécurité', 'nom_arabe' => 'مصلحة الأمن'],
            ['nom' => 'Service de l\'Hygiène', 'nom_arabe' => 'مصلحة النظافة'],
            
            // Services de Soutien
            ['nom' => 'Service de la Restauration', 'nom_arabe' => 'مصلحة المطعم'],
            ['nom' => 'Service de la Blanchisserie', 'nom_arabe' => 'مصلحة المغسلة'],
            ['nom' => 'Service du Transport', 'nom_arabe' => 'مصلحة النقل'],
            ['nom' => 'Service de la Morgue', 'nom_arabe' => 'مصلحة المشرحة'],
            ['nom' => 'Service des Archives', 'nom_arabe' => 'مصلحة الأرشيف']
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Fonctions
        $fonctions = [
            // Fonctions Médicales
            ['nom' => 'Chef de Service', 'nom_arabe' => 'رئيس المصلحة'],
            ['nom' => 'Médecin Chef', 'nom_arabe' => 'طبيب رئيس'],
            ['nom' => 'Médecin Spécialiste', 'nom_arabe' => 'طبيب مختص'],
            ['nom' => 'Médecin Généraliste', 'nom_arabe' => 'طبيب عام'],
            ['nom' => 'Médecin Résident', 'nom_arabe' => 'طبيب مقيم'],
            ['nom' => 'Interne', 'nom_arabe' => 'طبيب متدرب'],
            
            // Fonctions Paramédicales
            ['nom' => 'Surveillant Général', 'nom_arabe' => 'مراقب عام'],
            ['nom' => 'Surveillant de Service', 'nom_arabe' => 'مراقب المصلحة'],
            ['nom' => 'Infirmier Major', 'nom_arabe' => 'ممرض رئيسي'],
            ['nom' => 'Infirmier', 'nom_arabe' => 'ممرض'],
            ['nom' => 'Aide-Soignant', 'nom_arabe' => 'مساعد ممرض'],
            ['nom' => 'Sage-Femme', 'nom_arabe' => 'قابلة'],
            ['nom' => 'Technicien de Santé', 'nom_arabe' => 'تقني صحي'],
            
            // Fonctions Administratives
            ['nom' => 'Directeur', 'nom_arabe' => 'مدير'],
            ['nom' => 'Directeur Adjoint', 'nom_arabe' => 'مدير مساعد'],
            ['nom' => 'Chef de Division', 'nom_arabe' => 'رئيس قسم'],
            ['nom' => 'Chef de Service Administratif', 'nom_arabe' => 'رئيس مصلحة إدارية'],
            ['nom' => 'Attaché d\'Administration', 'nom_arabe' => 'ملحق إداري'],
            ['nom' => 'Secrétaire', 'nom_arabe' => 'كاتب'],
            ['nom' => 'Agent d\'Administration', 'nom_arabe' => 'عون إداري'],
            
            // Fonctions Techniques
            ['nom' => 'Ingénieur', 'nom_arabe' => 'مهندس'],
            ['nom' => 'Technicien Spécialisé', 'nom_arabe' => 'تقني متخصص'],
            ['nom' => 'Technicien', 'nom_arabe' => 'تقني'],
            ['nom' => 'Ouvrier Spécialisé', 'nom_arabe' => 'عامل متخصص'],
            
            // Fonctions de Soutien
            ['nom' => 'Agent de Service', 'nom_arabe' => 'عون خدمة'],
            ['nom' => 'Gardien', 'nom_arabe' => 'حارس'],
            ['nom' => 'Chauffeur', 'nom_arabe' => 'سائق'],
            ['nom' => 'Femme de Ménage', 'nom_arabe' => 'عاملة نظافة'],
            ['nom' => 'Cuisinier', 'nom_arabe' => 'طباخ']
        ];

        foreach ($fonctions as $fonction) {
            Fonction::create($fonction);
        }

        // Types de Congé
        $typesConge = [
            ['nom' => 'Congé Annuel', 'nom_arabe' => 'الإجازة السنوية', 'nbr_jours' => 30],
            ['nom' => 'Congé de Maladie', 'nom_arabe' => 'إجازة مرضية', 'nbr_jours' => 180],
            ['nom' => 'Congé de Maternité', 'nom_arabe' => 'إجازة الوضع', 'nbr_jours' => 98],
            ['nom' => 'Congé de Paternité', 'nom_arabe' => 'إجازة الأبوة', 'nbr_jours' => 3],
            ['nom' => 'Congé Exceptionnel', 'nom_arabe' => 'إجازة استثنائية', 'nbr_jours' => 10],
            ['nom' => 'Congé sans Solde', 'nom_arabe' => 'إجازة بدون راتب', 'nbr_jours' => 365],
            ['nom' => 'Congé de Formation', 'nom_arabe' => 'إجازة تكوين', 'nbr_jours' => 90],
            ['nom' => 'Congé de Pèlerinage', 'nom_arabe' => 'إجازة الحج', 'nbr_jours' => 30],
            ['nom' => 'Congé pour Événement Familial', 'nom_arabe' => 'إجازة حدث عائلي', 'nbr_jours' => 7],
            ['nom' => 'Congé d\'Accompagnement', 'nom_arabe' => 'إجازة مرافقة', 'nbr_jours' => 15]
        ];

        foreach ($typesConge as $type) {
            TypeConge::create($type);
        }

        // Types de Certificat
        $typesCertificat = [
            ['nom' => 'Certificat de Travail', 'nom_arabe' => 'شهادة عمل'],
            ['nom' => 'Certificat de Salaire', 'nom_arabe' => 'شهادة راتب'],
            ['nom' => 'Certificat de Stage', 'nom_arabe' => 'شهادة تدريب'],
            ['nom' => 'Certificat de Formation', 'nom_arabe' => 'شهادة تكوين'],
            ['nom' => 'Certificat Médical', 'nom_arabe' => 'شهادة طبية'],
            ['nom' => 'Certificat de Cessation de Service', 'nom_arabe' => 'شهادة انقطاع الخدمة'],
            ['nom' => 'Certificat de Reprise de Service', 'nom_arabe' => 'شهادة استئناف الخدمة'],
            ['nom' => 'Certificat de Bonne Conduite', 'nom_arabe' => 'شهادة حسن السيرة والسلوك'],
            ['nom' => 'Certificat de Non-Sanction', 'nom_arabe' => 'شهادة عدم المعاقبة'],
            ['nom' => 'Certificat de Fonction', 'nom_arabe' => 'شهادة مهام']
        ];

        foreach ($typesCertificat as $type) {
            TypeCertificate::create($type);
        }

        // Types de Stage
        $typesStage = [
            ['nom' => 'Stage de Formation Initiale', 'nom_arabe' => 'تدريب التكوين الأولي'],
            ['nom' => 'Stage de Formation Continue', 'nom_arabe' => 'تدريب التكوين المستمر'],
            ['nom' => 'Stage de Perfectionnement', 'nom_arabe' => 'تدريب التحسين'],
            ['nom' => 'Stage de Spécialisation', 'nom_arabe' => 'تدريب التخصص'],
            ['nom' => 'Stage d\'Adaptation', 'nom_arabe' => 'تدريب التأقلم'],
            ['nom' => 'Stage de Recyclage', 'nom_arabe' => 'تدريب إعادة التأهيل'],
            ['nom' => 'Stage Pratique', 'nom_arabe' => 'تدريب عملي'],
            ['nom' => 'Stage Théorique', 'nom_arabe' => 'تدريب نظري'],
            ['nom' => 'Stage à l\'Étranger', 'nom_arabe' => 'تدريب بالخارج'],
            ['nom' => 'Stage Universitaire', 'nom_arabe' => 'تدريب جامعي']
        ];

        foreach ($typesStage as $type) {
            TypeStage::create($type);
        }

        $this->command->info('Services, positions, and reference data seeded successfully!');
    }
}
