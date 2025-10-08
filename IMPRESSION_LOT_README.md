# 📋 Fonctionnalités d'Impression en Lot

## 🎯 Vue d'ensemble

Ce module ajoute des fonctionnalités complètes d'impression en lot pour les attestations de travail et la gestion des décisions de congé avec export Excel.

## ✨ Fonctionnalités Implémentées

### 1. 📄 **Attestations de Travail en Lot**
- **Sélection multiple** : Cochez plusieurs fonctionnaires pour générer leurs attestations
- **Recherche en temps réel** : Filtrez par nom, prénom ou PPR
- **Sélection rapide** : Boutons "Tout sélectionner" / "Tout désélectionner"
- **Génération PDF** : Un seul PDF contenant toutes les attestations sélectionnées
- **Format professionnel** : En-tête et pied de page officiels

### 2. 🏖️ **Gestion des Décisions de Congé**
- **Création de décisions** : Interface pour créer des décisions de congé
- **Informations complètes** :
  - Fonctionnaire (nom, prénom, PPR)
  - Type de congé et nombre de jours
  - Dates de début et fin
  - Numéro de décision
  - Remarques
- **Statuts** : Approuvé, En attente, Refusé

### 3. 📊 **Export Excel Complet**
- **Données détaillées** :
  - PPR, Nom, Prénom
  - Affectation et Formation Sanitaire
  - Service
  - Type de Congé
  - Nombre de jours
  - Dates (début, fin, décision)
  - Numéro de décision
  - Statut et remarques
- **Filtres** : Par type de congé et plage de dates
- **Format Excel** : Téléchargement direct avec formatage

### 4. 🖨️ **Impression des Décisions**
- **Impression individuelle** : Une décision à la fois
- **Impression en lot** : Sélection multiple avec cases à cocher
- **Format officiel** : Document PDF avec en-tête officiel
- **Contenu complet** : Toutes les informations légales requises

## 🚀 Accès aux Fonctionnalités

### Navigation
1. **Menu principal** → "Impression en Lot" → "Attestations & Congés"
2. **URL directe** : `/impression-lot`

### Onglets Disponibles
- **Attestations de Travail** : Génération en lot des attestations
- **Décisions de Congé** : Gestion et impression des décisions

## 📋 Guide d'Utilisation

### Attestations en Lot
1. Accédez à l'onglet "Attestations de Travail"
2. Utilisez la barre de recherche pour filtrer les fonctionnaires
3. Cochez les fonctionnaires souhaités
4. Cliquez sur "Générer les Attestations PDF"
5. Le PDF se télécharge automatiquement

### Décisions de Congé
1. Accédez à l'onglet "Décisions de Congé"
2. Cliquez sur "Nouvelle Décision" pour créer une décision
3. Remplissez le formulaire avec toutes les informations
4. Sauvegardez la décision
5. Utilisez les filtres pour l'export Excel ou l'impression

### Export Excel
1. Dans l'onglet "Décisions de Congé"
2. Sélectionnez les filtres souhaités (optionnel)
3. Cliquez sur "Exporter Excel"
4. Le fichier Excel se télécharge avec toutes les données

### Impression en Lot
1. Dans la liste des décisions
2. Cochez les décisions à imprimer
3. Cliquez sur "Imprimer Sélectionnées"
4. Le PDF avec toutes les décisions se génère

## 🗂️ Structure des Fichiers

### Contrôleurs
- `app/Http/Controllers/BatchPrintController.php` - Logique principale

### Modèles
- `app/Models/CongeDecision.php` - Modèle pour les décisions de congé

### Vues
- `resources/views/batch-print/index.blade.php` - Page principale
- `resources/views/batch-print/conge-decisions.blade.php` - Gestion des décisions

### Routes
- `/impression-lot` - Page principale
- `/impression-lot/attestations` - Génération attestations
- `/impression-lot/conge-decisions` - Gestion décisions
- `/impression-lot/export-conge-decisions` - Export Excel

### Base de Données
- `conge_decisions` - Table pour stocker les décisions de congé

## 🔧 Fonctionnalités Techniques

### Sécurité
- Validation complète des données
- Protection CSRF
- Authentification requise
- Transactions de base de données

### Performance
- Pagination des listes
- Recherche optimisée
- Index de base de données
- Chargement des relations

### PDF
- Génération avec TCPDF
- En-têtes et pieds de page personnalisés
- Format professionnel
- Support multi-pages

### Excel
- Export avec PhpSpreadsheet
- Formatage automatique
- Colonnes auto-dimensionnées
- Headers stylisés

## 📝 Notes Importantes

1. **Permissions** : Seuls les utilisateurs authentifiés peuvent accéder aux fonctionnalités
2. **Fichiers** : Les PDF sont générés à la volée (pas de stockage)
3. **Performance** : Optimisé pour traiter de grandes listes de fonctionnaires
4. **Compatibilité** : Compatible avec tous les navigateurs modernes
5. **Responsive** : Interface adaptée aux mobiles et tablettes

## 🔄 Intégration

Le module s'intègre parfaitement avec :
- Le système de gestion des fonctionnaires existant
- Les types de congé configurés
- Les formations sanitaires
- Le système d'authentification
- Les logs d'activité

## 🎨 Interface Utilisateur

- **Design cohérent** : Suit le style de l'application existante
- **Navigation intuitive** : Onglets clairs et boutons explicites
- **Feedback utilisateur** : Messages de succès/erreur
- **Indicateurs visuels** : Compteurs de sélection, badges de statut
- **Recherche en temps réel** : Filtrage instantané sans rechargement

Cette implémentation offre une solution complète et professionnelle pour la gestion des impressions en lot et des décisions de congé, répondant à tous les besoins exprimés.
