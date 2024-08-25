<?php
ob_start();
$btnClass = "font-normal text-white my-2 mx-auto px-4 py-1 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2";
$paiementMethod = ["Visa", "Paypal", "Stripe"];
;

?>

<div class="flex flex-col gap-2 font-thin ">
    <div class="">
        <h1 class="text-2xl text-center font-semibold tracking-widest">Paiement</h1>
    </div>
    <div class="relative min-w-[400px] min-h-[300px] border-2 rounded bg-slate-50 px-4 ">
        <div class="mt-4">
            <h1 class="text-start font-semibold">Liste des produits</h1>
        </div>
        <!-- Boucle sur la liste des articles sélectionner -->
        <div class="flex flex-col gap-2 text-xs " id="_articlesPay">

        </div>
        <div class="flex justify-end gap-4 mr-4 my-2">
            <p class="underline font-semibold">Total</p>
            <span class="text-green-500" id="_total" ></span>
        </div>
        <div>
            <h3 class="font-semibold">Mode de paiement</h3>
            <ul class="text-md">
                <?php
                foreach ($paiementMethod as $key => $pM) { ?>
                    <li id="<?= $key;?>" class="flex justify-between gap-2 w-full pr-2">
                        <label for="<?= $pM?>" class="w-[98%] cursor-pointer">
                    <?= $pM  ?></label>
                    <input type="radio" name="choix" id="<?= $pM?>" class="cursor-pointer" value="<?= $pM;?>">
                    </li>
                <?php }
                ?>
            </ul>
        </div>
        <div class="relative bottom-0 right-2 flex justify-end items-end gap-2">
            <div>
                <button class="bg-stone-600 hover:bg-stone-700 focus:ring-stone-500 <?= $btnClass; ?> " id="_discard">
                    Annuler et enregistrer la liste
                </button>
            </div>
            <div>
                <button class="bg-green-600 hover:bg-green-700 focus:ring-green-500  <?= $btnClass; ?>">
                    Valider
                </button>
            </div>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
$title = "Paiement";

require_once __DIR__ . "/../../layout.php";

?>