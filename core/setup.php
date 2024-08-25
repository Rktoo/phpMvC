<?php


function setupDatase()
{
    if (!file_exists(DB_PATH)) {
        echo "En cours de création de la base de donnée fictive.<br/>";
        $db = new PDO("sqlite:" . DB_PATH);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            echo "En cours de création des tables.<br/>";

            $db->exec("CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                u_name VARCHAR(30) NOT NULL,
                u_email VARCHAR(50) NOT NULL UNIQUE,
                u_password TEXT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )
            ");
            $db->exec("CREATE TABLE IF NOT EXISTS articles (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name VARCHAR(100) NOT NULL,
                description TEXT,
                prix FLOAT NOT NULL,
                stock INTEGER NOT NULL,
                image_url VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )");

            echo "Création de la base de donnée et des tables réussie.";
        } catch (PDOException $e) {
            echo "Erreur sur le setup de la base de donnée : " . $e->getMessage() . "<br/>";
        }
    }
    return;
}

setupDatase();
