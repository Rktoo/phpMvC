<?php
session_start();
require "vendor/autoload.php";
define("DB_PATH", __DIR__ . "/data/database.db");

use Dotenv\Dotenv;
use core\App\App;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once "core/App.php";
require_once "core/controller.php";
require_once "config/config.php";
$uri = $_SERVER["REQUEST_URI"];

# Créee automatiquement le fichier data/database.db s'il n'existe pas
if ($uri === "/articles") {
    require_once "core/setup.php";
    require_once "config/database.php";
}

# Pour faire le seed
if ($uri === "/seedmyproject/autorize/true") {
    require_once "lib/seed.php";
}

$app = new App();
