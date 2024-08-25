# E-Commerce PHP MVC by Rkoot

Bienvenue dans mon dépôt de **phpMvc2024** ! Ce projet est un exemple de mise en œuvre d'une application PHP, avec une structure simple pour le développement local.

## Table des matières

- [Description](#description)
- [Fonctionnalités](#fonctionnalités)
- [Installation](#installation)
- [Configuration](#configuration)
- [Utilisation](#utilisation)
- [Contribuer](#contribuer)
- [Licence](#licence)

## Description

Ce projet est une application PHP E-commerce conçue pour démontrer comment configurer et exécuter une application PHP en utilisant uniquement le serveur web intégré de PHP, sans avoir recours à des solutions comme XAMPP ou WAMP. Il est structuré pour être facile à déployer et à utiliser dans un environnement de développement.
Ceci constitue un moyen efficace pour s'initier au MVC.

## Fonctionnalités

- Serveur web intégré PHP pour le développement local
- Structure MVC (Modèle-Vue-Contrôleur)
- Connexion à une base de données SQLite
- Interface utilisateur simple et épurée
- Gestion des erreurs et des exceptions

## Installation

1. **Clonez le dépôt** :

   ```bash
   git clone https://github.com/Rktoo/phpMvC.git
   cd phpMvC

2. **Installer les dépendances nécessaires** :
    ```bash
    composer install

## Configuration
1. **Créer un fichier .env à la racine du projet et renseignez le chemin de la base de donnée** :
    ```bach
    touch .env

PROJECT_NAME="phpMvc2024"
DB_PATH="/data/database.db"

2. **Créer le dossier data à la racine. Le fichier database.db sera crée automatiquement après**

3. **Lancez le serveur** :
    php -S localhost:8000 -t public

3. **Naviguer à l'URL : http://localhost:8000//seedmyproject/autorize/true pour créer le fichier database.db et faire le seed de la base de donnée.**


## Contribuer
1. **Forkez le dépôt.**
2. **Créez une branche pour vos modifications** :
#### git checkout -b ma-nouvelle-fonctionnalité
3. **Faites vos modifications et commitez-les et poussez les sur votre fork**
4. **Ouvrez une Pull Request sur GitHut.**

## LICENCE
1. **Ce projet est sous la licent MIT.**

# Merci pour votre visite et bonne utilisation ! 

