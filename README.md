### Documentation HSP - Plateforme de Services de Santé

## 1. Aperçu du Projet

HSP est une application web basée sur Laravel qui facilite la gestion des services de santé, des activités, des événements et de la communication entre les prestataires de soins de santé, les organisations et les utilisateurs.

### Caractéristiques Principales :
- Gestion des utilisateurs avec contrôle d'accès basé sur les rôles
- Gestion des événements pour les activités de santé
- Forum de discussion pour les professionnels de santé
- Système de tickets pour le support et les demandes
- Gestion des organisations et des établissements
- Offres d'emploi et candidatures
- Système de messagerie pour les communications internes

### Stack Technologique :
- Framework Laravel 8+ PHP
- Base de données MySQL
- Moteur de template Blade
- Laravel Jetstream pour l'authentification
- Livewire pour les interfaces dynamiques

## 2. Guide d'Installation

### Prérequis :
- PHP 8.0+
- Composer
- MySQL
- Node.js et NPM

### Étapes d'Installation :
1. Cloner le dépôt : `git clone https://github.com/votrenomdutilisateur/HSP.git`
2. Naviguer vers le répertoire du projet : `cd HSP`
3. Installer les dépendances PHP : `composer install`
4. Installer les dépendances JavaScript : `npm install && npm run dev`
5. Créer une copie du fichier .env : `cp .env.example .env`
6. Générer une clé d'application : `php artisan key:generate`
7. Configurer la base de données dans le fichier .env
8. Exécuter les migrations et les seeders : `php artisan migrate --seed`
9. Démarrer le serveur de développement : `php artisan serve`


### Fichiers Clés :
- `routes/web.php` : Contient toutes les routes web de l'application
- `routes/api.php` : Contient toutes les routes API de l'application
- `app/Models/` : Contient tous les modèles Eloquent
- `app/Http/Controllers/` : Contient tous les contrôleurs
- `resources/views/` : Contient tous les templates Blade
- `database/migrations/` : Contient toutes les migrations de base de données

## 3. Modules et Fonctionnalités

### Gestion des Utilisateurs :
- Gère différents types d'utilisateurs avec un contrôle d'accès basé sur les rôles
- Types d'utilisateurs : Administrateurs, Prestataires de soins, Organisations, Patients/Utilisateurs réguliers

### Gestion des Événements :
- Création et gestion d'événements de santé
- Inscription des participants
- Gestion des horaires
- Catégorisation et filtrage des événements

### Forum et Discussions :
- Création de sujets de discussion
- Réponses aux messages
- Catégorisation des discussions
- Outils de modération

### Système de Tickets :
- Création de tickets de support
- Attribution des tickets au personnel
- Suivi du statut des tickets
- Catégorisation par importance

### Offres d'Emploi :
- Publication d'offres d'emploi dans le domaine de la santé
- Candidature aux postes
- Gestion des candidatures
- Filtrage par spécialités

### Organisations et Établissements :
- Gestion des hôpitaux et cliniques
- Gestion des organisations de santé
- Gestion des spécialités médicales
- Services basés sur la localisation

## 4. Schéma de la Base de Données

Tables principales :
- users : Comptes utilisateurs et authentification
- roles : Rôles des utilisateurs (admin, prestataire, organisation, utilisateur)
- evenements : Événements et activités de santé
- activites : Activités liées aux événements
- forums : Forums de discussion
- posts : Messages du forum
- replies : Réponses aux messages du forum
- tickets : Tickets de support
- message_tickets : Messages dans les tickets
- offres : Offres d'emploi
- hopitals : Informations sur les hôpitaux
- specialites : Spécialités médicales
- organisations : Organisations de santé
- etablissements : Établissements de santé

Pour une documentation détaillée du schéma de la base de données, consultez : [https://dbdocs.io/itsaam/HSP-WEB](https://dbdocs.io/itsaam/HSP-WEB)

## 5. Authentification et Sécurité

### Authentification :
- Laravel Jetstream pour l'échafaudage de l'authentification
- Laravel Fortify pour l'authentification backend
- Vérification par email
- Support de l'authentification à deux facteurs
- Fonctionnalité de réinitialisation du mot de passe
- Fonctionnalité "Se souvenir de moi"

### Fonctionnalités de Sécurité :
- Protection CSRF
- Protection XSS
- Protection contre l'injection SQL
- Limitation de débit
- Contrôle d'accès basé sur les rôles
- Authentification par token API
