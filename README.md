# ECF_Novembre
PixelVerse – FantasyRealm Online

Projet scolaire permettant d’utiliser un système complet de comptes utilisateurs, création de personnages, espace employé et espace administrateur.
Le site fonctionne avec un frontend HTML/CSS/JS et un backend en PHP/MySQL hébergé via XAMPP.

- Prérequis

XAMPP (Apache + MySQL)

Navigateur web

Éditeur de code (VS Code)

- Installation de la base de données

Télécharger XAMPP sur :
https://www.apachefriends.org/

Lancer Apache et MySQL

- Création de la base de données

Ouvrir phpMyAdmin :
http://localhost/phpmyadmin

Créer une nouvelle base sous le nom de "pixelverse"

- Tables MySQL à créer 

    pour les table users :
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    pseudo VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user','employee','admin') NOT NULL DEFAULT 'user',
    status VARCHAR(20) DEFAULT 'active'
);
    pour les table characters :
    
CREATE TABLE characters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    gender VARCHAR(20),
    class VARCHAR(50),
    weapon VARCHAR(50),
    description TEXT,
    portrait VARCHAR(255),
    color1 VARCHAR(7),
    color2 VARCHAR(7),
    status ENUM('pending','validated','refused') DEFAULT 'pending',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
    pour les table logs :
    
CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    action VARCHAR(255) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

- Deploiment du site on local 

  C:\xampp\htdocs\pixelverse\

- Ouvrir le site 

  http://localhost/pixelverse/

