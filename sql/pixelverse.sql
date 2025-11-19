CREATE DATABASE IF NOT EXISTS pixelverse;
USE pixelverse;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    pseudo VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('user','employee','admin') NOT NULL DEFAULT 'user',
    status VARCHAR(20) DEFAULT 'active'
);

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

CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    action VARCHAR(255) NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

