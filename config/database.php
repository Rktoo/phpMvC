<?php
namespace config\Database;
use PDO;

try {
    $db = new PDO("sqlite:" . DB_PATH);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $test = "Eto";
    // echo "Connexion à la base de donnée réussie.";
} catch (\PDOException $e) {
    die("Connexion à la base de donnée échouée : " . $e->getMessage());
}
