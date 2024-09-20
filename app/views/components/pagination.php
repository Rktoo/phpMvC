<nav aria-label="Page navigation" class="max-sm:text-sm">
            <ul class="flex justify-center">
                <?php if ($currentPage > 1): ?>
                    <li class="max-sm:hidden"><a href="?page=1" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700">Première</a></li>
                    <li><a href="?page=<?= $currentPage - 1 ?>" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700">Précédente</a></li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li>
                        <a href="?page=<?= $i ?>" class="px-4 py-2  <?= $i === $currentPage ? 'bg-cyan-600 text-white' : 'bg-gray-200 hover:bg-gray-300 text-gray-700' ?>">
                            <?= $i ?>
                        </a>
                    </li>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages): ?>
                    <li><a href="?page=<?= $currentPage + 1 ?>" class="px-4 py-2 bg-gray-200 hover:bg-gray-300  text-gray-700 ">Suivante</a></li>
                    <li class="max-sm:hidden "><a href="?page=<?= $totalPages ?>" class="px-4 py-2 
                    bg-gray-200 hover:bg-gray-300 text-gray-700">Dernière</a></li>
                <?php endif; ?>
            </ul>
        </nav>