<?php
require_once __DIR__ . "/../core/setup.php";
require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/data.php";

$faker = Faker\Factory::create("fr_FR");

$data = $materielsInformatique;

try {
    $sql = "DELETE FROM users";
    $db->exec($sql);
    $sql = "DELETE FROM articles";
    $db->exec($sql);

    $stmt = $db->prepare("INSERT INTO users (u_name, u_email, u_password, created_at) VALUES (:name, :email, :password, :created_at)");

    for ($i = 0; $i < 10; $i++) {
        $stmt->execute([
            ":name" => $faker->name,
            ":email" => $faker->unique()->email(),
            ":password" => password_hash(123456, PASSWORD_DEFAULT),
            ":created_at" => $faker->dateTimeBetween("-1 year")->getTimestamp(),
        ]);
    }

    $stmt = $db->prepare("INSERT INTO articles (name, description, prix, stock, image_url, created_at) VALUES (:name, :description, :prix, :stock, :image_url,:created_at)");


    foreach ($data as $key => $item) {
        $stmt->execute([
            ":name" => $item["name"],
            ":description" =>  $item["description"],
            ":prix" => $faker->randomFloat(2, 0, 200),
            ":stock" => random_int(0, 10),
            ":image_url" => $item["image_url"],
            ":created_at" => $faker->dateTimeBetween("-2 year")->getTimestamp(),
        ]);
    }

    print("Seed terminé avec succès.");
    usleep(400000);
    header("location: /");
} catch (PDOException $e) {
    die("Erreur sur les insertions fictives : " . $e->getMessage());
}
