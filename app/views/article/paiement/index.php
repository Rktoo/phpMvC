<?php
ob_start();
$btnClass = "font-normal text-white my-2 mx-auto px-4 py-2 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2";
$paiementMethod = [
    "Visa" => "/public/images/paiement/visa.png",
    "MasterCard" => "/public/images/paiement/masterCard.png",
    "Paypal" => "/public/images/paiement/paypal.png",
    "Stripe" => "/public/images/paiement/stripe.png"
];
?>

<div class="flex flex-col gap-6 font-thin bg-gray-50 p-6 rounded-lg shadow-lg max-w-3xl mx-auto my-8">
    <div class="text-center">
        <h1 class="text-3xl font-semibold tracking-widest text-gray-700">Paiement</h1>
    </div>

    <div class="relative border-2 rounded-lg bg-white px-6 py-8 shadow-md">
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-gray-800">Liste des produits</h2>
        </div>

        <!-- Boucle sur la liste des articles sélectionnés -->
        <div class="flex flex-col gap-3 text-sm" id="_articlesPay">
            <!-- Contenu dynamique -->
        </div>

        <div class="flex justify-end items-center gap-4 mt-4">
            <p class="underline font-semibold text-gray-700">Total</p>
            <span class="text-end text-green-600 font-bold text-lg" id="_total"></span>
        </div>

        <div class="mt-6">
            <h3 class="text-lg font-semibold text-gray-800">Mode de paiement</h3>
            <ul class="mt-4 space-y-4">
                <?php
                foreach ($paiementMethod as $key => $pM) { ?>
                    <li id="<?= $key; ?>" class="flex justify-between items-center gap-4 w-full cursor-pointer">
                        <label for="<?= $pM ?>" class="w-full cursor-pointer text-gray-700">
                            <?= $key ?>
                        </label>
                        <div>
                            <img src="<?= $pM ?>" alt="<?= $key ?>" class="w-12 h-10 object-contain">
                        </div>
                        <input type="radio" name="choix" id="<?= $pM ?>" class="cursor-pointer" value="<?= $pM; ?>">
                    </li>
                <?php }
                ?>
            </ul>
        </div>

        <div class="mt-8 flex justify-end gap-4">
            <button class="bg-stone-600 hover:bg-stone-700 focus:ring-stone-500 <?= $btnClass; ?>" id="_discard">
                Annuler et enregistrer la liste
            </button>
            <button class="bg-green-600 hover:bg-green-700 focus:ring-green-500 <?= $btnClass; ?>">
                Valider
            </button>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
$title = "Paiement";

require_once __DIR__ . "/../../layout.php";
?>