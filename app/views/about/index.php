<?php
ob_start();

?>

<div>
    <section class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Qui Nous Sommes</h2>
        <p class="mb-4 font-thin">Nous sommes une entreprise innovante dédiée à fournir des solutions de qualité pour nos clients. Depuis notre création en [année], nous avons été à la pointe de l'innovation, en utilisant les dernières technologies pour résoudre les problèmes complexes.</p>
        <p class="mb-4 font-thin">Notre équipe est composée de professionnels passionnés et expérimentés qui travaillent ensemble pour atteindre l'excellence. Nous croyons en l'importance de l'intégrité, de la collaboration et de l'innovation dans tout ce que nous faisons.</p>
    </section>

    <section class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Notre Mission</h2>
        <p class="mb-4 font-thin">Notre mission est de fournir des produits et des services qui améliorent la vie de nos clients et contribuent à un avenir meilleur. Nous nous engageons à offrir des solutions adaptées aux besoins spécifiques de chaque client et à dépasser leurs attentes.</p>
        <p class="mb-4 font-thin">Nous travaillons sans relâche pour maintenir des normes élevées de qualité et d'intégrité dans toutes nos opérations. En mettant l'accent sur l'innovation et l'amélioration continue, nous visons à être le leader de notre secteur.</p>
    </section>

    <section class="mb-8">
        <h2 class="text-2xl font-semibold mb-4">Notre Équipe</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white rounded shadow-lg border">
                <img src="<?= BASE_URL ?>public/images/img_1_.jpg" alt="Membre de l'équipe" class="w-full  h-64 md:h-32 object-left-top rounded-t mb-4">
                <div class="px-2 pb-2">
                    <h3 class="text-xl font-semibold">Xavier Dumatin</h3>
                    <p class="text-gray-600">Commercial</p>
                    <p class="mt-2 font-thin">En charge des ventes et qui reste en contact avec les clients.</p>
                </div>
            </div>

        </div>
    </section>

    <section>
        <h2 class="text-2xl font-semibold mb-4">Contactez-Nous</h2>
        <p class="mb-4 font-thin">Pour plus d'informations sur nos services ou pour toute question, n'hésitez pas à nous contacter. Nous serons ravis de vous aider.</p>
        <p>Email : <a href="mailto:contact@entreprise.com" class="text-blue-600">contact@entreprise.com</a></p>
        <p>Téléphone : +33 1 23 45 67 89</p>
    </section>
</div>
<?php

$content = ob_get_clean();
$title = "A propos";

require_once __DIR__ . "/../layout.php";
