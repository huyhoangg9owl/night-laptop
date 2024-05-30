<aside class="w-1/4 h-fit sticky top-5 left-0 bg-white dark:bg-zinc-600 p-6 max-xl:hidden">
    <div class="flex flex-row items-center gap-4">
        <img loading="lazy" src="<?= $account_profile['avatar'] ?>" alt="Avatar account" class="size-20 rounded-full">
        <div class="w-full h-full">
            <h1 class="text-2xl font-bold"><?= $account["username"] ?></h1>
            <p class="text-gray-500"><?= $account["email"] ?></p>
        </div>
    </div>
    <ul class="mt-8 py-10 border-t">
        <?php
        foreach ($url_aside as $url => $title) {
            $class = $path_url === $url ? "bg-sky-500 dark:bg-sky-700 text-white font-semibold" : "text-gray-500 dark:text-gray-400 hover:bg-sky-500 hover:dark:bg-sky-700 hover:text-white hover:font-semibold transition-colors duration-500";
        ?>
            <li>
                <a href="<?= $url ?>" class="block p-4 <?= $class ?>"><?= $title ?></a>
            </li>
        <?php
        }
        ?>
    </ul>
    <span class="font-normal text-sm text-gray-400 italic">Shift + T để thấy bất ngờ</span>
</aside>

<aside class="w-full h-fit sticky top-0 left-0 z-50 bg-white dark:bg-zinc-600 bg-opacity-80 shadow-md backdrop-blur-2xl backdrop-saturate-200 hidden rounded-lg overflow-hidden max-xl:block">
    <ul class="grid grid-cols-4 border-b border-b-gray-200 dark:border-b-gray-400">
        <?php
        foreach ($url_aside as $url => $title) {
            $class = $path_url === $url ? "bg-sky-500 dark:bg-sky-700 text-white font-semibold" : "text-gray-500 dark:text-gray-400 hover:bg-sky-500 hover:dark:bg-sky-700 hover:text-white hover:dark:text-white hover:font-semibold transition-colors duration-500";
        ?>
            <li>
                <a href="<?= $url ?>" class="block p-4 text-center <?= $class ?>"><?= $title ?></a>
            </li>
        <?php
        }
        ?>
    </ul>
    <span class="font-normal text-sm text-center my-2 block text-gray-400 italic">Shift + T để thấy bất ngờ</span>
</aside>