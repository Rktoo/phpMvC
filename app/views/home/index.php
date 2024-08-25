<?php
ob_start();

?>
<div class="flex flex-col items-center w-full h-[80vh] pb-10 ">
    <div class=" flex flex-col justify-center mt-6">
        <h1 class=" text-center text-lg">Bienvenue chez <span class="text-2xl font-semibold tracking-widest ">Informa<span class="text-yellow-400">T</span>ik</span></h1>
    </div>
    <div class="mt-10 mb-2">
        <p>Vous retrouverez ici tous les matériels informatiques.</p>
        <h2 class="text-center">Etes-vous :</h2>
    </div>
    <div class=" md:w-full ">
        <div class="w-full flex flex-col md:flex-row gap-2 justify-center items-start">
            <div class="group w-[300px] flex flex-col justify-center">
                <div class="w-full bg-cyan-600 text-white py-4 text-center hover:rounded-lg transition-all duration-150 ease-in-out cursor-pointer">
                    <h1>Commerçant</h1>
                </div>
                <div class="hidden group-hover:flex group-active:flex flex-col justify-center items-center text-sm md:text-md font-thin">
                    <p>Vous êtes bien au bon endroit.</p>
                    <button class="w-[300px] bg-green-400 hover:bg-green-500 active:bg-green-600 text-white p-2">
                        <a href="/contact">
                            <p>Collaborez avec nous pour promouvoir vos <strong>Produits/Marques</strong>.</p>
                        </a>
                    </button>
                </div>
            </div>
            <div class="group w-[300px]">
                <div class="bg-cyan-600 text-white py-4 text-center hover:rounded-lg transition-all duration-150 ease-in-out cursor-pointer">
                    <h1 class="">Acheteur</h1>
                </div>
                <div class="hidden group-hover:flex group-active:flex flex-col justify-center items-center text-sm md:text-md font-thin">
                    <p>Tous nos articles sont disponibles ici.</p>
                    <button class="w-[300px] bg-violet-400 hover:bg-violet-500 active:bg-violet-600 text-white p-2">
                        <a href="/articles">
                            <p>Voir tous les articles.</p>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="h-20">

    </div>
</div>
<?php

$content = ob_get_clean();
$title = "Accueil";

include __DIR__ . "/../layout.php";
