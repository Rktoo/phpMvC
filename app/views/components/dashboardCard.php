<?php

$paramOptions = ["Modifier votre nom", "Changer votre mot de passe", "Supprimer votre compte"];

?>
<div class="flex flex-col gap-8">
    <section class="w-72 h-auto md:w-80 lg:w-[30rem] rounded-xl bg-stone-800 shadow-xl text-white" id="_dasboardSectionContainer">
        <div class="flex flex-col gap-2 p-4">
            <h1 class="" id="_dashboarSectionTitle">Historique</h1>
            <p class="text-start font-thin text-xs underline underline-offset-2" id="_dashboardSectionParagraphe">Vous verrez ici l'historique de vos activités.</p>
            <ul class="text-xs text-slate-400">
                <?php
                for ($i = 0; $i <= 2; $i++) { ?>
                    <li class="hover:text-slate-50 cursor-pointer"><?= 2022 + $i ?></li>
                <?php } ?>
            </ul>
        </div>
    </section>
    <section class="w-72 h-auto md:w-80 lg:w-[30rem] rounded-xl bg-stone-800 shadow-xl text-white" id="_dasboardSectionParamContainer">
        <div class="flex flex-col gap-2 p-4">
            <h1 class="" id="_dashboarSectionParamTitle">Paramètre</h1>
            <p class="text-start font-thin text-xs underline underline-offset-2" id="_dashboardSectionParamParagraphe ">Gestion du profil</p>
            <ul class="text-xs text-slate-400">
                <?php
                foreach ($paramOptions as $key => $option) { ?>
                    <li class="hover:text-slate-50 cursor-pointer ">
                        <div class="flex flex-col gap-1">
                            <div class="flex flex-row md:justify-between gap-2 optionsLi my-2">
                                <div class="font-semibold text-green-400">
                                    <?= $option; ?>
                                </div>
                                <div>
                                    <svg class="w-5 h-4 mr-1 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3l7 7 7-7M5 13l7 7 7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            <?php require __DIR__ . "/dashboardForm.php"; ?>
                        </div>
                    </li>
                <?php }; ?>
            </ul>
        </div>
    </section>

</div>