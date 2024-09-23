# Projet Blog PHP

Ce projet est un site web de blog simple développé en PHP. Il permet aux utilisateurs de se connecter, de publier des articles avec des images, et de visualiser des articles existants.

## Fonctionnalités

### 1. Page de Connexion
- Permet aux utilisateurs de se connecter en utilisant leur identifiant et mot de passe.
- Option de "Se souvenir de moi" pour garder l'utilisateur connecté.

### 2. Page d'A propos
- Contient des informations statiques sur le site.

### 3. Ajout d'Article
- Formulaire permettant aux utilisateurs de créer un nouvel article en fournissant un titre, un contenu et une image.
- Les fichiers image sont vérifiés pour ne pas dépasser 1 Mo et doivent être de type image.

### 4. Traitement de l'Ajout d'Article
- Gère l'envoi du formulaire de création d'article, en enregistrant les données dans la base de données après validation et upload de l'image.

### 5. Visualisation d'un Article
- Affiche un article spécifique basé sur son ID passé en paramètre GET.
- Vérifie l'existence de l'article avant l'affichage.

### 6. Déconnexion
- Permet aux utilisateurs de se déconnecter, détruisant la session et supprimant le cookie de connexion.

## Structure des Fichiers

- `fonctions.php`: Contient des fonctions utilitaires comme la 
