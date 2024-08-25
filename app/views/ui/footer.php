<footer class="fixed backdrop-blur-md bottom-0 w-full border-t-2 z-50">
    <div class="max-w-6xl flex items-center mx-auto px-10 font-thin h-10 transition-all duration-100 ease-in-out <?php
                                                                                                                    $uri = $_SERVER["REQUEST_URI"];
                                                                                                                    if ($uri === "/register" || $uri === "/login") {
                                                                                                                        echo " text-white";
                                                                                                                    } else {
                                                                                                                        echo " text-stone-700";
                                                                                                                    }
                                                                                                                    ?>">
        <p><strong class="font-normal">&copy;<?= date("Y") ?></strong>. Tous droits réservés.</p>
    </div>
</footer>