<?php
$classButton = " text-white my-2 mx-auto px-4 py-1 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 ";

$classeBg = ["bg-amber-200/80", "bg-slate-200/80", "bg-pink-200/80", "bg-cyan-200/80", "bg-green-200/80"];

$randomKey = array_rand($classeBg);
$randomClasse = $classeBg[$randomKey];


?>

<div class="relative <?= $randomClasse; ?> backdrop-blur-md border-2 border-gray-300 rounded-lg flex gap-4 py-2 px-2 z-50" style="z-index: 30;">
    <div class="flex items-center ">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-8 h-6" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path d="M1.75 1.002a.75.75 0 1 0 0 1.5h1.835l1.24 5.113A3.752 3.752 0 0 0 2 11.25c0 .414.336.75.75.75h10.5a.75.75 0 0 0 0-1.5H3.628A2.25 2.25 0 0 1 5.75 9h6.5a.75.75 0 0 0 .73-.578l.846-3.595a.75.75 0 0 0-.578-.906 44.118 44.118 0 0 0-7.996-.91l-.348-1.436a.75.75 0 0 0-.73-.573H1.75ZM5 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM13 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z" />
        </svg>
    </div>
    <div class="flex flex-col justify-between gap-1">
        <p></p>
        <div class="flex justify-center items-center -mt-2">
            <div class="w-6 h-6  text-center font-semibold bg-gray-700 text-white ring ring-green-600 rounded-full" id="count_item">0</div>
        </div>
    </div>
    <div class="absolute bottom-[-15px] right-0 cursor-pointer bg-slate-200 border-2 border-gray-300 flex justify-center items-center rounded active:scale-y-95 transition-all duration-150 ease-in-out z-10" id="__showCartItem">
        <svg class="w-4 h-4 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3l7 7 7-7M5 13l7 7 7-7"></path>
        </svg>
    </div>
    <div class="absolute right-0 <?= $randomClasse; ?> bg-cy backdrop-blur-md py-2 px-4 rounded-lg border-2 transition-all duration-150 ease-in-out border-gray-300 overflow-y-auto overflow-x-hidden opacity-0 min-h-24 max-h-72 w-48" style="top:-30px ;z-index:-1; overflow-y: auto; overflow-x: hidden;" id="cartItem">
        <div class="mb-2">
            <?php

            if (str_contains($_SERVER["REQUEST_URI"], "/articles/") || str_contains($_SERVER["REQUEST_URI"], "/about") || str_contains($_SERVER["REQUEST_URI"], "/contact")) { ?>
                <h1 class="text-center">Retour à vos achats</h1>
            <?php
            } else {
            ?>
                <div>
                    <h1 class="text-center">Vos achats</h1>
                    <div id="spinner"></div>
                </div>
            <?php } ?>
        </div>
        <div class="flex flex-col gap-2 text-xs font-thin" id="_carts">
            <!-- Injection des articles -->
        </div>
        <div class="flex justify-between">
            <?php
            if (str_contains($_SERVER["REQUEST_URI"], "/articles/") || str_contains($_SERVER["REQUEST_URI"], "/about") || str_contains($_SERVER["REQUEST_URI"], "/contact")) { ?>
                <button class="<?= $classButton ?>" id="_back" style="background-color: green;">Retour</button>
            <?php
            } else {
            ?>
                <div class="flex items-center justify-center cursor-pointer" style="margin-right: -1rem;" id="_clear_" title="Effacer tous les articles">
                    <!-- Trash button -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-8 h-6 text-red-600" fill="currentColor" aria-hidden="true" data-slot="icon" id="trash">
                        <path fill-rule="evenodd" d="M5 3.25V4H2.75a.75.75 0 0 0 0 1.5h.3l.815 8.15A1.5 1.5 0 0 0 5.357 15h5.285a1.5 1.5 0 0 0 1.493-1.35l.815-8.15h.3a.75.75 0 0 0 0-1.5H11v-.75A2.25 2.25 0 0 0 8.75 1h-1.5A2.25 2.25 0 0 0 5 3.25Zm2.25-.75a.75.75 0 0 0-.75.75V4h3v-.75a.75.75 0 0 0-.75-.75h-1.5ZM6.05 6a.75.75 0 0 1 .787.713l.275 5.5a.75.75 0 0 1-1.498.075l-.275-5.5A.75.75 0 0 1 6.05 6Zm3.9 0a.75.75 0 0 1 .712.787l-.275 5.5a.75.75 0 0 1-1.498-.075l.275-5.5a.75.75 0 0 1 .786-.711Z" clip-rule="evenodd" />
                    </svg>
                </div>
                <button id="_pay" class="<?= $classButton ?> " style="margin-right: -0.1rem;" title="Procéder au paiement" >Payer</button>

            <?php } ?>
        </div>
    </div>
</div>
</div>
</div>