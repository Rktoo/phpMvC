<?php

ob_start();

?>

<div class="font-thin text-xs">
    <div class="my-4">
    <h1 class="text-center text-lg font-semibold">Suppression du compte</h1>
    </div>
    <div class="relative flex flex-row overflow-hidden">
    <div class="flex flex-col gap-2 border-2 py-4 px-2 bg-slate-50 w-[400px]" id="_etap1">
        <h1>
            Avant de continuer, nous aimerons connaitre la raison de votre décision
        </h1>
        <textarea name="motif" id="motif" class="w-full border-2 outline-none p-2 min-h-12" placeholder="Votre raison..." ></textarea>
        <div class="w-full"></div>
        <div class="flex flex-row justify-between">
            <div class="flex items-center gap-2 justify-start">
            <input type="checkbox" class="ml-1" name="checkbox" id="checkbox">
            <label for="checkbox">Ne pas donner d'avis</label>
            </div>
            <div>
                <a href="/profil">
            <button type="button" class="bg-stone-400 hover:bg-stone-600 text-white font-semibold px-2 py-1 outline-1 outline-stone-700 rounded">Annuler</button>
            </a>
            <button type="button" class="bg-green-400 hover:bg-green-600 text-white font-semibold px-2 py-1 outline-1 outline-green-700 rounded" id="_removeSuiv">Suivant</button>
            </div>
        </div>
    </div>
    <form class="absolute flex flex-col gap-2 border-2 py-4 px-2 bg-slate-50 w-[400px] h-[142px] -z-50" id="_etap2" action="/profil/remove-account" method="POST">
        <h1>
            Par mesure de sécurité, merci de mettre votre mot de passe.
        </h1>
        <input name="email_suppression" id="email_suppression" class="w-full border-2 outline-none p-2  hidden" placeholder="Email" value="<?= $_SESSION["uemail"];?>"></input>
        <input type="password" name="mdp_suppression" id="mdp_suppression" class="w-full border-2 outline-none p-2" placeholder="Mot de passe"></input>

        <div class="_result"></div>
        <div class="flex flex-row justify-end">
            <div class="">
            <button type="button" class="bg-stone-400 hover:bg-stone-600 text-white font-semibold px-2 py-1 outline-1 outline-stone-700 rounded" id="_removePre">Précedent</button>
            <button type="submit" class="bg-red-400 hover:bg-red-600 text-white font-semibold px-2 py-1 outline-1 outline-red-700 rounded">Confirmer la suppression</button>
            </div>
        </div>
</form>
    </div>
</div>

<?php

$content = ob_get_clean();
$title = "Suppression du compte";

require_once __DIR__ ."/../../dashboardLayout.php";