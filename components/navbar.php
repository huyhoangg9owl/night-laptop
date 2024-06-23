<nav class="sticky left-0 top-0 z-[999] h-max w-full max-w-full rounded-none border border-white/80 bg-white bg-opacity-80 shadow-md backdrop-blur-2xl backdrop-saturate-200 dark:border-zinc-600/80 dark:bg-zinc-600/80">
    <ul class="container mx-auto flex flex-row flex-wrap items-center justify-center gap-x-6 py-2">
        <?php
        foreach ($categories as $category_navbar) {
            $slug = $category_navbar['slug'];
            $name = $category_navbar['name'];
        ?>
            <li class="relative flex items-center">
                <a href="/category/<?= $slug ?>" class="py-1 font-semibold text-gray-600 hover:text-gray-800 dark:text-white dark:hover:text-gray-200">
                    <?= $name ?>
                </a>
            </li>
        <?php }
        ?>
    </ul>
</nav>