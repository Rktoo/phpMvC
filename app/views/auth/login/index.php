<?php

ob_start();

?>

<section
    class="md:relative flex justify-between flex-col md:flex-row md:items-center bg-white p-6 rounded-lg shadow-md mb-8 border-2 px-4 py-2 w-[400px] md:w-[600px]">
    <div class=" md:w-1/2 flex flex-col md:flex-row md:justify-between md:items-center overflow-hidden">
        <h2 class="text-center text-2xl font-semibold mb-4">Bienvenue</h2>
        <div class="relative w-full flex justify-center md:mr-10">
            <img src="/public/images/articles/pc_portable_hp.png" alt="image d'un boitier pc"
                class="w-28 h-20 md:w-40 md:h-24 shadow-2xl">
        </div>
        <?php 
            if($_SESSION["loginError"]){
            echo '<div class="md:absolute md:top-4 md:left-10 text-center   text-xs mt-1 text-red-400" id="_log_Error"><p class=" text-red-400 "></p> '.htmlspecialchars($_SESSION["loginError"]).'</p></div>';}

            
            ?>

    </div>
    <form action="/login" method="post" class="space-y-4 md:w-1/2" id="l_informatikForm">
        <div title="Votre adresse email">
            <label for="luser_email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="luser_email" name="user_email"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm border-2 px-2 outline-none py-1"
                placeholder="Votre adresse email">
        </div>
        <div title="Votre mot de passe" class="relative">
            <button type="button"
                class="absolute top-[1.7rem] right-0  w-[2] h-6 px-2 self-center outline-cyan-500 z-30"
                id="_mdp_eye"><img class=" w-8 h-6 cursor-pointer text-gray-500 z-20"
                    src="public\images\svg\s-eye.svg" /></button>
            <label for="luser_password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
            <input type="password" id="luser_password" name="user_password"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm border-2 px-2 outline-none py-1"
                placeholder="Votre mot de passe">
        </div>
        <div class="flex flex-row justify-between items-center md:w-full ">
            <button type="submit"
                class="w-1/2 bg-cyan-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:ring-offset-2 mb-4">Se
                connecter</button>
            <button type="button" class="w-1/2 font-thin text-xs text-nowrap text-black px-4 py-2 rounded-md mb-4">Pas
                encore de compte ?<br /> <a href="/register"
                    class="text-cyan-600 hover:underline hover:underline-offset-2 md:text-wrap">Cliquez ici</a></button>
        </div>
    </form>
</section>

<?php

$content = ob_get_clean();
$title = "Page de connexion";

require __DIR__ . "/../authLayout.php";
?>