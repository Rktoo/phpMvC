<?php
ob_start();

?>

<div class="flex sm:flex-row flex-col gap-4">
    <section class="bg-white p-6 rounded-lg shadow-md mb-8 border-2 px-4 py-2">
        <h2 class="text-2xl font-semibold mb-4">Formulaire de Contact</h2>
        <form action="#" method="post" class="space-y-4 ">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-2 px-2 outline-none py-1" placeholder="Votre nom">
            </div>
            <div>
                <label for="tva_number" class="block text-sm font-medium text-gray-700">Numéro TAV</label>
                <input type="text" id="tva_number" name="tva_number" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-2 px-2 outline-none py-1" placeholder="Votre numéro TVA">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-2 px-2 outline-none py-1" placeholder="Votre adresse email">
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" name="message" rows="4" required class="mt-1 block w-full min-h-14 max-h-64 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-2 px-2 outline-none py-1" placeholder="Votre message" ></textarea>
            </div>
            <button type="submit" class="bg-cyan-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2">Envoyer</button>

        </form>
    </section>

    <section class="bg-white rounded-lg shadow-md border-2 px-4 py-2">
        <h2 class="text-2xl font-semibold mb-4">Informations de Contact</h2>
        <p class="mb-4 font-thin">Vous pouvez nous contacter en utilisant les informations suivantes :</p>
        <ul class="space-y-2">
            <li class="flex items-center">
                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2a2 2 0 012-2zM5 8h2a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2a2 2 0 012-2z"></path>
                </svg>
                <p>Adresse : 123 Rue Exemple, Alsace, Pays du commerce</p>
            </li>
            <li class="flex items-center">
        
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-5 h-5 text-blue-600" fill="currentColor" aria-hidden="true" data-slot="icon">
  <path fill-rule="evenodd" d="m3.855 7.286 1.067-.534a1 1 0 0 0 .542-1.046l-.44-2.858A1 1 0 0 0 4.036 2H3a1 1 0 0 0-1 1v2c0 .709.082 1.4.238 2.062a9.012 9.012 0 0 0 6.7 6.7A9.024 9.024 0 0 0 11 14h2a1 1 0 0 0 1-1v-1.036a1 1 0 0 0-.848-.988l-2.858-.44a1 1 0 0 0-1.046.542l-.534 1.067a7.52 7.52 0 0 1-4.86-4.859Z" clip-rule="evenodd"/>
</svg>

                <p>Téléphone : +33 1 23 45 67 89</p>
            </li>
            <li class="flex items-center">
                <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M3 9h18m-18 4h18m-18 4h18m-18 4h18"></path>
                </svg>
                <p>Email : <a href="mailto:contact@entreprise.com" class="text-cyan-600">contact@InformaTik.com</a></p>
            </li>
        </ul>
    </section>
</div>
<?php

$content = ob_get_clean();
$title = "Contact";

require_once __DIR__ . "/../layout.php";
