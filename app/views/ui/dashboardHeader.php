<header class="relative top-0 h-[550px] bg-stone-800 w-40 rounded-br-lg text-white font-thin shadow-md z-40">
    <nav class=" flex flex-col justify-start items-center gap-2 py-4 px-4">
        <a href="/" title="Retour à la page d'accueil" class="w-full py-1" id="_logo">
            <h1 class="tracking-widest text-center text-lg  font-semibold">
                Informa<span class="text-yellow-400">T</span>ik
            </h1>
        </a>
        <div class="flex justify-between items-center gap-2">
            <h1>Espace client</h1>
            <div class="group flex justify-center items-center w-6 h-6 cursor-pointer rounded-full overflow-hidden active:scale-95" id="_minimize" title="Masquer la barre de navigation">
                <span class="bg-slate-400 group-hover:bg-slate-500 rounded-full  px-2 text-slate-200 transition-all duration-100 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-6 h-6" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M12.5 9.75A2.75 2.75 0 0 0 9.75 7H4.56l2.22 2.22a.75.75 0 1 1-1.06 1.06l-3.5-3.5a.75.75 0 0 1 0-1.06l3.5-3.5a.75.75 0 0 1 1.06 1.06L4.56 5.5h5.19a4.25 4.25 0 0 1 0 8.5h-1a.75.75 0 0 1 0-1.5h1a2.75 2.75 0 0 0 2.75-2.75Z" clip-rule="evenodd" />
                    </svg>
                </span>
            </div>
        </div>
        <?php 
    $uri = $_SERVER["REQUEST_URI"];

    if($uri === "/profil"){ ?>
        <div class="flex flex-col justify-center items-center text-xs cursor-pointer text-slate-400 hover:text-white " id="_menuHistorique">
            <h1>Historique</h1>
        </div>
        <div class="flex flex-col justify-center items-center text-xs cursor-pointer text-slate-400 hover:text-white" id="_menuParam">
            <h1>Paramètre</h1>
        </div>
<?php } elseif($uri === "/profil/remove-account") {?>
              <div class="flex flex-col justify-center items-center text-xs cursor-pointer text-slate-400 " id="">
            <h1 class="hover:text-white ">Etape de suppression</h1>
            <div class="mt-2" >
                <div class="hover:text-white text-slate-400" id="_et1">
                    <span>Etape 1</span>
                </div>
                <div class="flex justify-center items-center my-2">
                    <span class="scale-y-150">|</span>
                </div>
                <div class="hover:text-white text-slate-400" id="_et2">
                    <span>Etape 2</span>
                </div>
            </div>
        </div>

    <?php }; ?>
        <div class="absolute bottom-16 hover:font-normal transition-colors duration-200 ease-in-out cursor-pointer _logout">
            <a href="/logout">Se déconnecter</a>
        </div>
    </nav>
</header>
<div class="group absolute top-14 left-[-5px] hover:left-[-2px]  flex justify-center items-center w-8 h-6 cursor-pointer rounded-r-full overflow-hidden active:scale-95 " id="_maximize" title="Réafficher la barre de navigation">
    <span class="bg-slate-400 group-hover:bg-slate-500 rounded-full  px-2 text-slate-200 transition-all duration-100 ease-in-out">

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="w-10 h-6" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path fill-rule="evenodd" d="M3.5 9.75A2.75 2.75 0 0 1 6.25 7h5.19L9.22 9.22a.75.75 0 1 0 1.06 1.06l3.5-3.5a.75.75 0 0 0 0-1.06l-3.5-3.5a.75.75 0 1 0-1.06 1.06l2.22 2.22H6.25a4.25 4.25 0 0 0 0 8.5h1a.75.75 0 0 0 0-1.5h-1A2.75 2.75 0 0 1 3.5 9.75Z" clip-rule="evenodd" />
        </svg>


    </span>
</div>