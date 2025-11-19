# 🎯 GUIDE RAPIDE - Gestion des Demandes

## 🔐 Comptes de Test

### Responsables (pour approbation)
```
Niveau 1: responsable1@grh.test / resp1
Niveau 2: responsable2@grh.test / resp2
Niveau 3: responsable3@grh.test / resp3
```

### Fonctionnaire Test
```
PPR: 1660747
Email: Developpement2015@gmail.com
Dates: 1989-02-19 (naissance) / 2011-12-31 (embauche)
```

---

## 🚀 URLs Principales

| Page | URL | Description |
|------|-----|-------------|
| **Création demande** | `/demandes/create` | Formulaire public pour fonctionnaires |
| **Consultation** | `/demandes/mine` | Connexion fonctionnaire (email + password) |
| **Liste admin** | `/demandes` | Gestion avec filtrage par niveau |
| **Détails** | `/demandes/{id}` | Vue complète d'une demande |
| **Modification** | `/demandes/{id}/edit` | Édition (Super Admin only) |
| **Mot de passe oublié** | `/demandes/forgot-password` | Récupération sécurisée |

---

## ✨ Fonctionnalités Clés

### 📋 Page `/demandes` (Liste)

✅ **Filtrage Intelligent par Niveau**
- Responsable1 → Voit niveau 0 uniquement
- Responsable2 → Voit niveau 1 uniquement  
- Responsable3 → Voit niveau 2 uniquement
- Super Admin → Voit tout

✅ **Filtres de Recherche**
- Nom, Prénom, CIN, PPR
- Type de demande
- Statut

✅ **Affichage Complet**
- Toutes les infos en un coup d'œil
- Formation sanitaire
- Détails du congé (dates)
- Barre de progression niveau
- Statut avec badges colorés

✅ **Actions Contextuelles**
- 👁️ Voir détails
- ✅ Approuver (si niveau correspond)
- 📄 Créer décision (niveau 3 uniquement)
- ✏️ Modifier (Super Admin)
- 🗑️ Supprimer (Super Admin)

---

## 🔄 Workflow d'Approbation

```
Demande créée (niveau 0)
    ↓
Responsable1 approuve → niveau 1
    ↓
Responsable2 approuve → niveau 2
    ↓
Responsable3 approuve → niveau 3 + Status "Approved"
    ↓
Responsable3 crée Décision → Décision générée
```

---

## 🎨 Permissions

| Permission | Qui peut ? |
|------------|-----------|
| `demandes.view` | Tous les responsables |
| `demandes.approve` | Responsables 1, 2, 3 |
| `demandes.decide` | Responsable 3 uniquement |
| `demandes.manage` | Super Admin uniquement |

---

## 🧪 Test Rapide

1. **Créer une demande**
   - Aller sur `/demandes/create`
   - PPR: 1660747
   - Créer mot de passe
   - Soumettre

2. **Approuver niveau 1**
   - Login: responsable1@grh.test / resp1
   - Page `/demandes` → Voir demande niveau 0
   - Cliquer ✅ → Passe à niveau 1

3. **Approuver niveau 2**
   - Login: responsable2@grh.test / resp2
   - Voir demande niveau 1
   - Approuver → Passe à niveau 2

4. **Approuver niveau 3 + Décision**
   - Login: responsable3@grh.test / resp3
   - Voir demande niveau 2
   - Approuver → Niveau 3
   - Cliquer 📄 → Décision créée

5. **Consulter (fonctionnaire)**
   - Page `/demandes/mine`
   - Email + password
   - Voir détails complets

---

## 📦 Modifications Apportées

### ✅ Contrôleur (DemandeController.php)
- Filtrage automatique par niveau utilisateur
- Méthodes show(), edit(), update(), destroy()
- Gestion permissions

### ✅ Vues
- `index.blade.php` - Liste améliorée avec tous détails
- `show.blade.php` - Vue détaillée en cartes
- `edit.blade.php` - Formulaire d'édition

### ✅ Routes
- GET `/demandes/{demande}` → show
- GET `/demandes/{demande}/edit` → edit  
- PUT `/demandes/{demande}` → update
- DELETE `/demandes/{demande}` → destroy

### ✅ Permissions & Rôles
- 5 permissions créées
- 3 rôles responsables configurés
- Attribution automatique

### ✅ Seeders
- PermissionSeeder - Permissions demandes
- ResponsableUsersSeeder - Comptes test

---

## 🎯 Prochaines Étapes

- [ ] Tester workflow complet
- [ ] Vérifier affichage sur mobile
- [ ] Configurer notifications email
- [ ] Remplacer math captcha par reCAPTCHA
- [ ] Ajouter export Excel des demandes

---

**Dernière mise à jour**: 22 octobre 2025
