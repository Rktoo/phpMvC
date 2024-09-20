<?php

ob_start();

?>

<section class="md:relative flex justify-between flex-col md:flex-row md:items-center bg-white p-6 rounded-lg shadow-md mb-8 border-2 px-4 py-2 w-[320px] md:w-[600px] md:h-80">
    <div class=" md:w-1/2 flex flex-col md:flex-row md:justify-between md:items-center overflow-hidden">
        <h2 class="text-center text-2xl font-semibold mb-4">Register</h2>
        <div class="relative w-full flex justify-center md:mr-10">
            <img src="/public/images/articles/boitier_pc.avif" alt="image d'un boitier pc" class="w-20 h-20 md:w-40 md:h-40 shadow-2xl">
        </div>
       <?php 
            if(isset($_SESSION["registerSuccess"])){
                unset($_SESSION["registerError"]);
            echo '<div class="md:absolute md:top-4 md:left-10 text-center   text-xs mt-1" id="_success"><p class=" text-green-400 ">'.htmlspecialchars($_SESSION["registerSuccess"]).'</p></div>';}
            ?>

    </div>

    <form action="/register" method="post" class="space-y-4 md:w-1/2" id="r_informatikForm">
                    <?php 

        if(empty($_SESSION["registerSuccess"])){ ?>
        <div title="Votre nom">
            <label for="ruser_name" class="block text-sm font-medium text-gray-700">Nom</label>
            <input type="text" id="ruser_name" name="user_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm border-2 px-2 outline-none py-1" placeholder="Votre nom">
        </div>
        <div title="Votre adresse email">
            <label for="ruser_email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="ruser_email" name="user_email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm border-2 px-2 outline-none py-1" placeholder="Votre adresse email">
            <?php 
            if(isset($_SESSION["registerError"])){
            echo '<div class="text-start md:text-center text-red-400 text-xs mt-1" id="_rError">'.htmlspecialchars($_SESSION["registerError"]).'</div>';}
            ?>
        </div>
        <div title="Votre mot de passe" class="relative">
            <button type="button" class="absolute top-[1.7rem] right-0 w-[2] h-6 px-2 self-center outline-cyan-400 z-30" id="_mdp_eye" ><img class=" w-8 h-6 cursor-pointer text-gray-500 z-20" src="public\images\svg\s-eye.svg" /></button>
               <label for="ruser_password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password" id="ruser_password" name="user_password" class=" mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm border-2 px-2 outline-none py-1" placeholder="Votre mot de passe"></input>
        </div>

        <div class="flex flex-row justify-between items-center">
            <button type="submit" class="flex justify-center bg-cyan-600 w-36 text-center text-white px-4 py-2 rounded-md shadow-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 mb-4" id="_btnSubmit">S'enregistrer</button>
            <button type="button" class="font-thin text-xs text-black text-nowrap px-4 py-2 rounded-md mb-4">Vous avez déjà un compte ?<br /><a href="/login" class="text-cyan-600 hover:underline hover:underline-offset-2">Cliquez ici</a></button>

        </div>
        <?php } ?>
    </form>
</section>

<?php

$content = ob_get_clean();
$title = "Page d'enregistrement";

require __DIR__ . "/../authLayout.php";
?>