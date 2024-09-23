```markdown
# HSP - Hospital Social Platform

HSP est une plateforme innovante permettant de mettre en relation les hôpitaux et les professionnels de santé avec des fonctionnalités de chat en ligne, d'actualités et de gestion d'offres d'emploi. Cette application vise à faciliter la communication et la collaboration entre différents acteurs du secteur médical.

## Fonctionnalités principales

- **Chat en ligne** : Messagerie en temps réel pour faciliter la communication entre les utilisateurs.
- **Actualités et annonces** : Système similaire à Twitter, où les utilisateurs peuvent publier des nouvelles et des offres d’emploi.
- **Groupes et utilisateurs** : Chaque utilisateur appartient à un ou plusieurs groupes (Étudiant, Médecin, Administrateur, Entreprise Partenaire) permettant des échanges ciblés.
- **Gestion des offres d'emploi** : Les utilisateurs peuvent postuler directement aux offres proposées par les hôpitaux ou entreprises partenaires.
- **Authentification sécurisée** : Utilisation de JetStream pour une authentification à deux facteurs (2FA) et la vérification des emails à la création d’un compte.
- **Réinitialisation de mot de passe** : Possibilité de réinitialiser son mot de passe via un email de récupération.
  
## Table des matières

- [Technologies utilisées](#technologies-utilisées)
- [Installation](#installation)
- [Configuration](#configuration)
- [Fonctionnalités détaillées](#fonctionnalités-détaillées)
- [Contributions](#contributions)
- [Licence](#licence)

## Technologies utilisées

- **Laravel** : Framework PHP puissant et flexible, permettant une architecture propre et évolutive.
- **JetStream** : Pour la gestion des fonctionnalités d'authentification, de vérification d'e-mail, de réinitialisation de mot de passe, et de 2FA.
- **Livewire** : Utilisé pour les interactions en temps réel avec l’interface utilisateur, notamment pour le chat.
- **Tailwind CSS** : Pour un design moderne et responsive.
- **MySQL** : Base de données relationnelle pour la gestion des utilisateurs, des groupes et des publications.

## Installation

1. **Cloner le dépôt** :
   ```bash
   git clone https://github.com/votre-utilisateur/HSP.git
   cd HSP
   ```

2. **Installer les dépendances** :
   ```bash
   composer install
   npm install
   ```

3. **Créer un fichier `.env`** :
   Copiez le fichier `.env.example` et renommez-le en `.env` :
   ```bash
   cp .env.example .env
   ```

4. **Générer la clé d'application** :
   ```bash
   php artisan key:generate
   ```

5. **Configurer la base de données** :
   Dans le fichier `.env`, configurez vos paramètres de base de données :
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=hsp_db
   DB_USERNAME=root
   DB_PASSWORD=secret
   ```

6. **Migrer les bases de données** :
   ```bash
   php artisan migrate
   ```

7. **Démarrer le serveur** :
   ```bash
   php artisan serve
   ```

8. **Compiler les assets** :
   ```bash
   npm run dev
   ```

Votre application est maintenant en cours d'exécution sur `http://localhost:8000`.

## Configuration

- **JetStream et 2FA** :
   JetStream est configuré pour permettre la gestion des utilisateurs avec la validation des emails et l'authentification à deux facteurs. Les utilisateurs peuvent activer le 2FA dans leurs paramètres de compte.

- **Email de confirmation** :
   Lors de la création d’un compte, un email de confirmation est envoyé à l’utilisateur. Si l’email n’est pas confirmé, l’utilisateur ne pourra pas accéder à certaines parties de la plateforme.

- **Réinitialisation du mot de passe** :
   En cas d’oubli de mot de passe, l’utilisateur peut demander un lien de réinitialisation via son email.

## Fonctionnalités détaillées

### Groupes d'utilisateurs

- **Étudiant** : Accès limité à certaines fonctionnalités, accès aux offres d'emploi et discussions.
- **Médecin** : Accès complet aux actualités médicales et aux offres d’emploi, ainsi qu’aux groupes de discussion entre professionnels.
- **Administrateur** : Gestion de la plateforme, modération des utilisateurs et des groupes.
- **Entreprise partenaire** : Publier des offres d'emploi et interagir avec les professionnels de santé.

### Chat en ligne

- Discussion en temps réel entre les membres d'un groupe ou directement entre utilisateurs.
- Historique des messages disponible pour chaque utilisateur.
  
### Gestion des offres

- Les entreprises partenaires et les hôpitaux peuvent publier des offres d'emploi, et les utilisateurs peuvent y postuler directement depuis l'application.
  
### Actualités et publications

- Chaque utilisateur peut publier des annonces, des actualités ou des informations importantes dans un fil d’actualité.
- Les publications peuvent être "likées" et commentées par les autres membres.

## Contributions

Nous accueillons volontiers les contributions de la communauté ! Pour contribuer :

1. **Forker** ce dépôt.
2. Créez votre branche de fonctionnalité :
   ```bash
   git checkout -b ma-nouvelle-fonctionnalité
   ```
3. **Committez** vos changements :
   ```bash
   git commit -m 'Ajouter une nouvelle fonctionnalité'
   ```
4. **Poussez** vos modifications :
   ```bash
   git push origin ma-nouvelle-fonctionnalité
