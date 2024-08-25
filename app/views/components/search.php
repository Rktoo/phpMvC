<div class="w-full my-4">
    <div class="messageInput mb-2 text-center text-red-400 "></div>
    <form action="/articles" class="flex flex-row gap-2" method="post" id="formulaireDeRecherche">
        <label for="search"></label>
        <input type="search" name="search" id="search" placeholder="Recherche" class="w-full px-4 py-2 outline-none focus:ring-2 border-2 rounded">
        <button type="submit" class="bg-cyan-600 text-white px-4 py-1 rounded-md shadow-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 active:scale-x-95">Rechercher</button>
    </form>
</div>
<?php if($_SESSION["message"]){?>
<div class="cursor-pointer mb-2" id="remove_filter">
<p class="font-normal text-cyan-600 hover:text-cyan-400">Retour à la page précédente</p>
    </div>
<div class="my-4">
    <p><?= $_SESSION["message"];?></p>
</div>
<?php }?>