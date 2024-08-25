<?php
ob_start();
?>

<div class="w-full flex justify-center items-center">
    <h1 class="text-xl font-thin"><strong>Oups</strong>. <span class="text-lg font-thin">La page que vous recherchez est introuvable.</span></h1>
</div>

<?php

$content = ob_get_clean();
$title = "Page introuvable";

require_once __DIR__ . "/layout.php";
