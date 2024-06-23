<header class="relative z-[1000] w-full max-w-full rounded-none border border-slate-300/30 bg-white bg-opacity-80 px-4 shadow-md backdrop-blur-2xl backdrop-saturate-200 duration-200 dark:border-slate-700/80 dark:bg-zinc-600">
    <div class="container mx-auto flex items-center justify-between px-8 py-4 lg:px-0">
        <a href="/">
            <h1 class="madimi-one-regular text-4xl">
                <span class="text-sky-400"><?= explode(" ", $seo_setting['title'])[0] ?? "" ?></span>
                <span class="card text-zinc-500 dark:text-white"><?= explode(" ", $seo_setting['title'])[1] ?? "" ?></span>
            </h1>
        </a>
        <div class="flex justify-center">
            <?php
            if ($account) : ?>
                <label for="account_toggle" class="relative flex flex-row items-center justify-center gap-2">
                    <img loading="lazy" class="h-8 w-8 rounded-full" src="<?= $account_profile['avatar'] ?>" alt="Avatar account" />
                    <h1 class="be-vietnam-pro-regular"><?= $account['username'] ?></h1>
                </label>
            <?php else : ?>
                <a href="/auth">
                    <svg class="size-6 fill-black dark:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
</header>