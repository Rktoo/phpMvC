<?php
$user = $_SESSION["user"];
$token = $_SESSION["_token"];

$base = BASE_URL;
if(!$user || !$token){
    header("location: {$base}login");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Espace client"?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/app.css">
    <link rel="icon" href="<?= BASE_URL ?>public/favicon.ico">
</head>
<body class="bg-slate-100">
    <div class="flex">
    <?php require_once __DIR__ . "/../ui/dashboardHeader.php"; ?>

    <main class="relative flex justify-center max-w-6xl mx-auto px-10 mt-2 mb-10 ">
        <?= $content; ?>
    </main>
</div>
    <?php require_once __DIR__ . "/../ui/footer.php"; ?>

    <script src="<?= BASE_URL ?>public/assets/js/dashboard.js" type="module" defer></script>
</body>
</html>