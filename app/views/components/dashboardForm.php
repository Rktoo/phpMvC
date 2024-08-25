

<div id="_div" class="hidden">
    <?php
    if (strstr($option, "Supprimer")) { ?>
        <div class="flex flex-row justify-between items-center text-white">
            <p>Cette action est irreversible</p>
            <button type="button" class="bg-red-500 hover:bg-red-600 text-white px-2 rounded-lg h-[1.8rem]" id="_removeAccount">Continuer</button>
        </div>

    <?php } else { ?>

        <?php
        if (strstr($option, "Modifier")) { ?>
            <form action="/profil/edit-name" method="post" class="flex flex-col items-center justify-start gap-1 text-stone-800 hover:text-slate-600" id="_modifForm">
                <div class="w-full flex flex-col justify-start">
                    <input type="text" name="user_emailL1" id="user_emailL1" class="opacity-0 hidden" value="<?= $_SESSION["uemail"]; ?>">
                    <label for="user_nameM" class="text-slate-200">Nom</label>
                    <input type="text" name="user_nameM" id="user_nameM" class="w-full px-2 py-1 my-2 outline-none rounded-lg ring-2 text-stone-800 ring-slate-400" value="<?= $_SESSION["user"]; ?>">
                </div>
                <div class="flex justify-start">
                    <button type="submit" class="self-start bg-cyan-600 hover:bg-cyan-700 text-white px-2 rounded-lg h-[1.8rem]">Enregistrer</button>
                </div>
            </form>
        <?php } else { ?>
            <form action="/profil/modifier-mot-de-passe" method="post" class="flex flex-col items-center justify-start gap-1 text-stone-800 hover:text-slate-600" id="_modifPassForm">
                <div class="w-full">
                    <label for="old_mdp" class="text-white">Tapez votre ancien mot de passe</label>
                    <span class="text-white hidden"></span>
                    <input type="password" name="old_mdp" id="old_mdp" class="w-full px-2 py-1 my-2 outline-none rounded-lg ring-2 ring-slate-400 !text-stone-800" value="" placeholder="Votre ancien mot de passe">
                </div>
                <div class="w-full">
                    <input type="email" name="user_emailL2" id="user_emailL2" class="opacity-0 hidden" value="<?= $_SESSION["uemail"]; ?>">
                    <label for="user_mdp" class="text-white">Tapez votre nouveau mot de passe</label>
                    <span for="user_mdp" class="text-white hidden">Mot de passe</span>
                    <input type="password" name="user_mdp" id="user_mdp" class="w-full px-2 py-1 my-2 outline-none rounded-lg ring-2 ring-slate-400 !text-stone-800" value="" placeholder="Votre nouveau mot de passe">
                </div>
                <div class="w-full">
                    <label for="user_cmdp" class="text-white">Confirmez votre nouveau mot de passe</label>
                    <span id="unknown" class="hidden">Confirmation de mot de passe</span>
                    <input type="password" name="user_cmdp" id="user_cmdp" class="w-full px-2 py-1 my-2 outline-none rounded-lg ring-2 ring-slate-400 text-stone-800" value="" placeholder="Confirmez votre nouveau mot de passe">
                </div>
                <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white px-2 rounded-lg h-[1.8rem]">Enregistrer</button>
            </form>
        <?php }; ?>
    <?php }; ?>
</div>