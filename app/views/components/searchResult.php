<?php
ob_start();
?>
<div class=" font-thin">
    <div class="flex flex-col mb-4">
        <h1 class="text-2xl font-medium">Articles</h1>
        <p>Avec nous, vous faites toujours le bon choix !</p>
    </div>
    <div class="w-full">
        <?php require_once __DIR__ . "/../components/search.php"; ?>
    </div>
    <div class="cursor-pointer mb-2" id="remove_filter">
        <p class="font-normal text-cyan-600 hover:text-cyan-400">Effacer le filtre de recherche</p>
    </div>
    <div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 justify-items-center items-center gap-2 md:gap-4 lg:gap-6">
                <?php
                foreach([$articles] as $article){
                    if(!$article["name"]){ 
                        return;
                    } else {
                    require __DIR__ . "/../ui/cardArticle.php"; }
                    }
                ?>
                
        </div>
    </div>
            <!-- Début de pagination -->
    <div class="mt-6">
       <?php 
            require_once __DIR__ ."/../components/pagination.php";
       ?>
    </div>
</div>

<?php
$content = ob_get_clean();
$title = "Résultat de la recherche";

require_once __DIR__ . "/../layout.php";
?>