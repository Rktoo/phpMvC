<?php
$user = $_SESSION["user"];
$token = $_SESSION["_token"];

$base = BASE_URL;
if($user || $token){
    header("location: {$base}");
} 


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Authentification Page"; ?></title>
    <link rel="icon" href="<?= BASE_URL; ?>public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= BASE_URL; ?>public/assets/css/app.css">
</head>

<body class="bg-slate-800 antialiased ">
    <header class="text-white">
        <div class="max-w-6xl mx-auto md:mt-[8rem] px-10">
            <div class="flex flex-col justify-center mb-4" style="margin-top: 4rem;">
                 <a href="/" title="Retour à la page d'accueil" class="w-full py-1" id="_logo">
         <h1 class="tracking-widest text-center text-lg  font-semibold">
                    Informa<span class="text-yellow-400">T</span>ik
                </h1>
                </a>
                <h1 class="text-xl text-center"><?php
                                    $uri = $_SERVER["REQUEST_URI"];
                                    if ($uri === "/register") {
                                        echo "Joignez-vous à nous et collaborons ensemble.";
                                    } elseif ($uri === "/login") {
                                        echo "Nous avons hâte de vous revoir.";
                                    } else {
                                        echo "Qui que vous soyez, vous êtes le bienvenue.";
                                    }
                                    ?>
                </h1>
            </div>
        </div>
    </header>
    <main class="max-w-6xl mx-auto px-10 flex justify-center items-center  text-black ">
        <?= $content; ?>
    </main>
    <div class="mb-8 text-transparent">Juste pour régulariser la hauteur. Et sera masqué par la suite</div>
    <?php require_once __DIR__ . "/../ui/footer.php"; ?>

    <script type="module" src="<?= BASE_URL ?>public/assets/js/_auth.js"></script>
    <script>
        window.baseUrl = <?= json_encode($base); ?>;
		<?php if(isset($_SESSION["registerError"])){?>
		const rError = <?= json_encode($_SESSION["registerError"]); 
			?>;
		window.localStorage.setItem("rError", rError) ;
<?php } else { ?>
	window.localStorage.removeItem("rError");
	<?php } ?>;
    </script>
</body>

</html>