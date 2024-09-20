<?php
ob_start();
$timestamp = $article["created_at"];
$articleDate = new DateTime("@$timestamp");

$randomNumber = random_int(1, 6);

?>

<div class="max-w-4xl mx-auto max-sm:px-2 sm:px-6 lg:px-8 ">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden border-2 rounded-tl-lg itemS" id="<?= $article["id"]; ?>">
        <div class="relative flex justify-center items-center">
            <img src="<?= BASE_URL . $article["image_url"]; ?>" alt="image <?= htmlspecialchars($article['name']) ?>" class="w-64 h-64 object-cover">
        </div>

        <div class="p-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-4"><?= htmlspecialchars($article['name']) ?></h1>

            <div class="text-2xl text-green-600 font-semibold mb-4">
                <?= number_format($article['prix'], 2, ',', ' ') ?> €
            </div>

            <div class="prose prose-lg max-w-none text-gray-700 mb-6">
                <?= nl2br(htmlspecialchars($article['description'])) ?>
            </div>
            <div class="flex flex-row justify-between items-center">
                <div class="text-gray-600 text-sm  ">
                    Ajouté le : <?= $articleDate->format("Y-m-d") ?>
                </div>
                <div>
                    <div class="relative flex  ">
                    <?php 
    for($i = 1; $i <=5 ; $i++) { ?>
<svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-5 text-stone-800 overflow-hidden " fill="<?= $i < $randomNumber ? "rgb(251 191 36) ":" none " ?>" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
  <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z"/>
</svg>

<?php }; ?>
</div>
                </div>
            </div>
            <div class="mt-8 flex space-x-4">
                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-medium py-2 px-4 rounded add_to_cart_button" id="singleButton">Ajouter</button>
                <a href="/articles?page=<?= isset($_SESSION["page"]) ?  $_SESSION["page"] : "1"; ?>" class="bg-gray-500 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded">
                    Retour à la boutique
                </a>
            </div>
        </div>
    </div>
    <div class="w-full h-20">

    </div>
</div>

<?php
$content = ob_get_clean();
$title = htmlspecialchars($article['name']);

require_once __DIR__ . "/../../layout.php";
