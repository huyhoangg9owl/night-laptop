<nav class="z-50 w-full max-w-full bg-white border rounded-none shadow-md h-max border-white/80 bg-opacity-80 backdrop-blur-2xl backdrop-saturate-200 dark:bg-zinc-600/80 dark:border-zinc-600/80 sticky top-0 left-0">
    <ul class="container flex flex-row flex-wrap items-center justify-center gap-x-6 mx-auto py-2">
        <?php
        global $brands;
        function Brands($brands): void
        {
            foreach ($brands as $brand) {
                $slug = $brand['slug'];
                $name = $brand['name'];
                $desc = $brand['desc'];
        ?>
                <li class="flex items-center relative">
                    <a href="/brand/<?= $slug ?>" class="text-gray-600 dark:text-white hover:text-gray-800 dark:hover:text-gray-200 py-1 font-semibold" title="<?= $desc ?>">
                        <?= $name ?>
                    </a>
                </li>
        <?php
            }
        }

        Brands($brands);
        ?>
    </ul>
</nav>