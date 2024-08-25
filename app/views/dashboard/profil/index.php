<?php

ob_start();

?>

<div>
    <div class="flex flex-col justify-center items-center gap-4 my-4" id="_titre">
        <h1 class="text-center" >Espace Client</h1>
        <div>
            <div class="flex justify-center items-center mb-2 px-4 py-1 bg-slate-400 text-white ring-inset ring-4 ring-slate-300 ">
                <p class="uppercase"><?= $_SESSION["user"]?></p>
            </div>
        </div>
    </div>
    <?php require_once __DIR__ ."/../../components/dashboardCard.php"; ?>
</div>


<?php 

$content = ob_get_clean();
$title = "Votre espace";

require_once __DIR__ . "/../dashboardLayout.php";