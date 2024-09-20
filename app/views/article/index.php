<?php
ob_start();

if (isset($_POST["search"])) {
    require_once __DIR__ . "/../components/searchResult.php";
} else {
?>

    <div class="relative w-full max-sm:flex max-sm:flex-col font-thin">
        <div class="flex flex-col max-sm:justify-center max-sm:items-center  mb-4">
            <h1 class="text-2xl font-medium">Articles</h1>
            <p class="max-sm:text-start">Bienvenue ! Découvrez notre sélection d'articles soigneusement choisis pour répondre à tous vos besoins. Parcourez, explorez, et laissez-vous inspirer !😊</p>
        </div>
        <div class="w-full max-sm:flex max-sm:justify-center max-sm:px-4">
            <?php require_once __DIR__ . "/../components/search.php"; ?>
        </div>
        <div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 justify-items-center items-center gap-2 md:gap-4 lg:gap-6">
                <?php
                if (isset($_SESSION["message"])) {
                } else {
                    foreach ($articles as $article) : ?>
                        <?php require __DIR__ . "/../ui/cardArticle.php"; ?>
                <?php endforeach;
                } ?>
            </div>
        </div>

        <!-- Début de pagination -->
        <div class="mt-6">
            <?php require_once __DIR__ . "/../components/pagination.php"; ?>
        </div>

    </div>

<?php
    $content = ob_get_clean();
    $title = "Articles";

    require_once __DIR__ . "/../layout.php";
    unset($_SESSION["message"]);
}
?>