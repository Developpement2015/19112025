# 📋 Système de Gestion des Demandes - Documentation

## 🎯 Vue d'ensemble

Le système de gestion des demandes permet aux fonctionnaires de soumettre des demandes (congés, attestations, etc.) et met en place un workflow d'approbation à 3 niveaux.

---

## 👥 Comptes Utilisateurs

### Comptes de Test Responsables

| Email | Mot de passe | Rôle | Niveau | Permissions |
|-------|--------------|------|--------|-------------|
| `responsable1@grh.test` | `resp1` | responsable1 | Niveau 1 | Voir et approuver niveau 0→1 |
| `responsable2@grh.test` | `resp2` | responsable2 | Niveau 2 | Voir et approuver niveau 1→2 |
| `responsable3@grh.test` | `resp3` | responsable3 | Niveau 3 | Voir, approuver niveau 2→3, créer décisions |

### Fonctionnaire Test

- **PPR**: 1660747
- **Email**: Developpement2015@gmail.com
- **Date de naissance**: 1989-02-19
- **Date d'embauche**: 2011-12-31

---

## 🔄 Workflow d'Approbation

### Processus en 3 Niveaux

```
┌─────────────────────────────────────────────────────────────────┐
│  Fonctionnaire soumet une demande                               │
│  ↓ Status: pending, Level: 0                                    │
└─────────────────────────────────────────────────────────────────┘
                            ↓
┌─────────────────────────────────────────────────────────────────┐
│  NIVEAU 1 - Responsable1 approuve                               │
│  ✓ Voit seulement les demandes niveau 0                         │
│  ✓ Approuve: Level passe à 1                                    │
└─────────────────────────────────────────────────────────────────┘
                            ↓
┌─────────────────────────────────────────────────────────────────┐
│  NIVEAU 2 - Responsable2 approuve                               │
│  ✓ Voit seulement les demandes niveau 1                         │
│  ✓ Approuve: Level passe à 2                                    │
└─────────────────────────────────────────────────────────────────┘
                            ↓
┌─────────────────────────────────────────────────────────────────┐
│  NIVEAU 3 - Responsable3 approuve                               │
│  ✓ Voit seulement les demandes niveau 2                         │
│  ✓ Approuve: Level passe à 3, Status: approved                  │
│  ✓ Peut créer une Décision officielle                           │
└─────────────────────────────────────────────────────────────────┘
```

---

## 📱 Fonctionnalités par Page

### 🏠 Page `/demandes` - Liste des Demandes

#### Filtrage Automatique par Niveau

- **Super Admin**: Voit TOUTES les demandes
- **Responsable1**: Voit uniquement les demandes `niveau 0` en attente
- **Responsable2**: Voit uniquement les demandes `niveau 1` en attente
- **Responsable3**: Voit uniquement les demandes `niveau 2` en attente

#### Filtres de Recherche

- Nom
- Prénom
- CIN
- PPR
- Type de demande (congé/attestation/autre)
- Statut (en attente/approuvé/rejeté)

#### Informations Affichées

| Colonne | Description |
|---------|-------------|
| # | ID de la demande |
| Fonctionnaire | Nom complet + email |
| CIN / PPR | Badges avec identifiants |
| Formation | Formation sanitaire affectée |
| Type | Type de demande avec badge coloré |
| Détails | Dates pour congés, etc. |
| Statut | Badge avec état actuel |
| Niveau | Barre de progression (0-3) |
| Date | Date et heure de création |
| Actions | Boutons d'action selon permissions |

#### Actions Disponibles

| Action | Icône | Permission | Condition |
|--------|-------|------------|-----------|
| **Voir** | 👁️ | Aucune | Toujours disponible |
| **Approuver** | ✅ | `demandes.approve` | Si niveau correspond |
| **Créer Décision** | 📄 | `demandes.decide` | Si niveau 3 atteint |
| **Modifier** | ✏️ | `demandes.manage` | Super Admin uniquement |
| **Supprimer** | 🗑️ | `demandes.manage` | Super Admin uniquement |

---

### 👁️ Page `/demandes/{id}` - Détails de la Demande

Affichage complet en cartes :

1. **Informations du Fonctionnaire**
   - Nom complet
   - CIN, PPR
   - Email
   - Formation sanitaire

2. **Statut de la Demande**
   - Type (badge coloré)
   - Statut actuel
   - Barre de progression niveau
   - Dates de soumission/modification

3. **Détails Spécifiques**
   - **Pour Congé**: dates début/fin, lieu, adresse, remplaçant, nombre de jours
   - **Pour Autre**: description complète

4. **Décision** (si créée)
   - Numéro de décision
   - Date de décision
   - Contenu

5. **Actions**
   - Tous les boutons contextuels selon permissions

---

### ✏️ Page `/demandes/{id}/edit` - Modification

**Permission requise**: `demandes.manage` (Super Admin uniquement)

Formulaire complet avec :
- Informations personnelles modifiables
- Formation sanitaire
- Type de demande (lecture seule)
- Champs spécifiques selon type (dates, description, etc.)

---

## 🔐 Permissions du Module

| Permission | Description | Rôles ayant accès |
|------------|-------------|-------------------|
| `demandes.view` | Voir les demandes | Tous les responsables |
| `demandes.create` | Créer une demande | Public (fonctionnaires) |
| `demandes.approve` | Approuver les demandes | responsable1, 2, 3 |
| `demandes.decide` | Créer des décisions | responsable3 uniquement |
| `demandes.manage` | Modifier/Supprimer | Super Admin uniquement |

---

## 🧪 Scénario de Test

### 1. Créer une Demande
- Aller sur: `http://192.168.1.38:8806/demandes/create`
- Remplir avec PPR 1660747
- Créer un mot de passe
- Soumettre

### 2. Approbation Niveau 1
- Se connecter avec `responsable1@grh.test` / `resp1`
- Aller sur `/demandes`
- Voir seulement les demandes niveau 0
- Cliquer sur ✅ pour approuver
- La demande passe au niveau 1

### 3. Approbation Niveau 2
- Se déconnecter et se connecter avec `responsable2@grh.test` / `resp2`
- Aller sur `/demandes`
- Voir seulement les demandes niveau 1
- Approuver
- La demande passe au niveau 2

### 4. Approbation Niveau 3 + Décision
- Se déconnecter et se connecter avec `responsable3@grh.test` / `resp3`
- Aller sur `/demandes`
- Voir seulement les demandes niveau 2
- Approuver → niveau 3, status approved
- Cliquer sur 📄 pour créer la décision
- Décision créée automatiquement

### 5. Consultation Fonctionnaire
- Aller sur `http://192.168.1.38:8806/demandes/mine`
- Se connecter avec l'email et mot de passe du fonctionnaire
- Voir l'état actuel de la demande avec tous les détails

---

## 🎨 Codes Couleurs

| Élément | Couleur | Classe Bootstrap |
|---------|---------|------------------|
| Congé | Vert | `bg-success` |
| Attestation | Bleu | `bg-primary` |
| Autre | Orange | `bg-warning` |
| Approuvé | Vert | `bg-success` |
| Rejeté | Rouge | `bg-danger` |
| En attente | Orange | `bg-warning` |
| CIN | Gris | `bg-secondary` |
| PPR | Bleu clair | `bg-info` |

---

## 📊 Structure des Données

### Table `demandes`

```sql
- id (auto)
- ppr (string)
- nom (string)
- prenom (string)
- cin (string)
- password (hashed)
- email_fonctionnaire (string)
- nom_formation_sanitaire_id (foreign key nullable)
- type_demande (enum: conge, attestation, autre)
- data (JSON - contient dates, lieu, etc.)
- status (enum: pending, approved, rejected)
- approval_level (0-3)
- decision_id (foreign key nullable)
- timestamps
```

### Table `decisions`

```sql
- id (auto)
- numero_decision (string)
- date_decision (date)
- contenu (text nullable)
- timestamps
```

---

## 🚀 Liens Rapides

- **Page publique de création**: `/demandes/create`
- **Consultation fonctionnaire**: `/demandes/mine`
- **Récupération mot de passe**: `/demandes/forgot-password`
- **Liste admin**: `/demandes` (nécessite authentification)
- **Gestion des rôles**: `/utilisateurs` (Super Admin)

---

## ✅ Checklist de Mise en Production

- [ ] Vérifier que les 3 comptes responsables existent
- [ ] Tester le workflow complet 0→1→2→3
- [ ] Vérifier les permissions pour chaque rôle
- [ ] Tester la modification/suppression (Super Admin)
- [ ] Configurer l'envoi d'emails pour notifications
- [ ] Ajouter une limite de taux (rate limiting) sur création
- [ ] Implémenter reCAPTCHA au lieu de math captcha
- [ ] Configurer les sauvegardes de base de données
- [ ] Documenter pour les utilisateurs finaux

---

**Date de création**: 22 octobre 2025  
**Version**: 1.0  
**Auteur**: Système GRH
