<?php

$classHoverGroup = " transition-all duration-200 ease-in-out ";
if((int)$article["stock"] > 0){
    $classHoverGroup .= " group-hover:scale-125 group-hover:rounded-lg group-hover:border-4 group-hover:border-amber-400 group-hover:translate-y-8";
}

?>

<div class=" relative grid grid-cols-1 border-4 rounded-tl-lg  <?= (int)($article["stock"]) < 1 ? "bg-gray-200" : ""; ?> itemS " id="<?= $article["id"]; ?>">
    <?php
    if ((int)($article["stock"]) < 1) { ?>
        <div class="absolute bottom-0 left-6 rotate-6 bg-red-600/75 border-slate-200/75 border-8 w-[80%] h-[90%] flex justify-center items-center z-30">
            <p class="text-center text-white text-xl font-semibold">Rupture de stock</p>
        </div>

    <?php }; ?>

    <div class="group flex justify-center items-center h-40">
        <a href="/articles/<?= htmlspecialchars($article["id"]); ?>">
            <img src="<?= BASE_URL . $article["image_url"]; ?>" alt="<?= $article["name"] ?>" class="<?= ((int)$article["stock"] > 1) ? $classHoverGroup . " w-36 h-36" : " w-36 h-36 " . $classHoverGroup; ?>" />
        </a>
    </div>
    <div class=" flex flex-col items-center px-4 py-2">
        <div class="flex items-start justify-between gap-2">
            <h1 class="text-center text-md font-medium"><?= $article["name"] ?></h1>
            <p class="text-md text-green-600 font-semibold text-nowrap"><?= number_format($article["prix"], 2, ",") ?> €</p>
        </div>
        <div class="flex flex-row justify-between items-center flex-nowrap gap-2 mt-2">
            <a href="/articles/<?= $article["id"]; ?>">
                <button type="button" class="bg-green-600 text-white px-4 py-1 rounded-md shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">Voir</button></a>
            <button type="button" class="bg-cyan-600 text-white px-4 py-1 rounded-md shadow-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 add_to_cart_button" id="singleCard">Ajouter</button>

        </div>
    </div>
</div>