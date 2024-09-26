<?php
$user = null;
$token = null;
if (isset($_SESSION["user"]) && isset($_SESSION["_token"])) {
    $user = $_SESSION["user"];
    $token = $_SESSION["_token"];
}
$base = BASE_URL;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Mon Blog"; ?></title>
    <link rel="icon" href="<?= BASE_URL; ?>public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= BASE_URL; ?>public/assets/css/app.css">
    <link rel="stylesheet" href="<?= BASE_URL; ?>public/assets/css/toolpitCss.css">

</head>

<body class="bg-stone-50" id="_body">

    <?php include_once __DIR__ . "/ui/header.php";

    if (isset($_SESSION["loginSuccess"])) {
        echo '<div class="text-center   text-xs font-thin tracking-widest mt-6 text-green-400" id="_log_Success"><p class=" text-green-400 "></p> ' . htmlspecialchars($_SESSION["loginSuccess"]) . '</p>
            <p class=" text-slate-800 " id="_citation"></p>
            </div>';
    }

    ?>

    <main class="relative flex justify-center max-w-6xl mx-auto px-10 mt-6">
        <!-- Cart -->

        <div class="fixed top-[8.5rem] md:top-[7rem] right-6 md:right-14 z-50">
            <?php
            if ($_SERVER["REQUEST_URI"] == "/" || preg_match('/^\/paiement\/(\d+)$/', $_SERVER["REQUEST_URI"], $matches)) {
            } else {

                require_once __DIR__ . "/components/cart.php";
            }
            ?>
        </div>
        <!-- content -->
        <?= $content; ?>
    </main>
    <div class="h-20" id="_h20"></div>
    <?php include_once __DIR__ . "/ui/footer.php"; ?>
    <div class="hidden" id="base_url"><?= BASE_URL; ?></div>

    <script>
        <?php if (isset($articles)) { ?>
            window.articles = <?= json_encode($allArticles); ?>;
        <?php } ?>
    </script>
    <script type="module" src="<?= BASE_URL; ?>public/assets/js/main.js"></script>
    <?php
    if (preg_match('/^\/paiement\/(\d+)$/', $_SERVER["REQUEST_URI"], $matches)) { ?>
        <script src="<?= BASE_URL; ?>public/assets/js/_paiement.js"></script>
    <?php }; ?>


    <script>
        <?php
        if (isset($_SESSION["user"]) && isset($_SESSION["_token"])) { ?>
            window.user = "_connecTed";
        <?php } else { ?>
            window.user = "_disconnecTed";
        <?php } ?>
    </script>
</body>

</html>