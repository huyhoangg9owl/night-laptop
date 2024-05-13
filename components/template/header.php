<header class="w-full max-w-full bg-white border rounded-none shadow-md border-slate-300/30 bg-opacity-80 backdrop-blur-2xl backdrop-saturate-200 dark:bg-zinc-600 dark:border-slate-700/80 duration-200 px-4 relative z-[1000]">
    <div class="container flex items-center justify-between mx-auto py-4 px-8 lg:px-0">
        <a href="/">
            <h1 class="text-4xl madimi-one-regular">
                <span class="text-sky-400">9</span><span class="text-zinc-500 dark:text-white card">LapTop</span>
            </h1>
        </a>
        <form action="/search" method="get"
              class="md:block hidden w-1/2 p-2 pl-6 rounded border border-gray-200 dark:border-gray-400/80">
            <label>
                <input type="search" name="q"
                       class="w-full text-gray-600 dark:text-white bg-transparent border-none focus:outline-none"
                       placeholder="Tìm kiếm sản phẩm..."/>
            </label>
        </form>
        <ul class="grid place-items-center md:grid-cols-3 grid-cols-4 grid-rows-1 gap-5">
            <li class="flex justify-center md:hidden">
                <a href="/search">
                    <?php
                    $class_icon = "text-gray-600 dark:text-gray-300";
                    $name_icon = "search";
                    require ROOT_PATH . "/components/icons/index.php";
                    ?>
                </a>
            </li>
            <li class="flex flex-col justify-center">
                <?php
                require_once ROOT_PATH . '/components/toogle_theme.php';
                ?>
            </li>
            <li class="flex justify-center">
                <a href="/account/cart" class="relative">
                    <?php
                    $class_icon = "text-gray-600 dark:text-white";
                    $name_icon = "cart";
                    require ROOT_PATH . "/components/icons/index.php";
                    ?>
                    <span class="size-2 absolute -top-1 -right-2 bg-red-500 rounded-full"></span>
                </a>
            </li>
            <li class="flex justify-center">
                <?php
                global $account;
                global $account_profile;

                if ($account) : ?>
                    <label for="account_toggle" class="relative cursor-pointer">
                        <img loading="lazy" class="h-8 w-8 rounded-full" src="<?= $account_profile['avatar'] ?>"
                             alt="Avatar account">
                        <input type="checkbox" name="account_toggle" id="account_toggle"
                               class="hidden peer/account_toggle"/>

                        <div class="peer-checked/account_toggle:block hidden absolute top-0 right-0 w-48 mt-12 origin-top-right bg-white dark:bg-zinc-600 border border-gray-200 dark:border-gray-400/80 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none overflow-hidden animate-[sweepIn_.25s_linear]">
                            <a href="/account"
                               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-sky-600 hover:text-white hover:font-bold transition-colors duration-300">Tài
                                khoản</a>
                            <a href="/services/account/logout"
                               class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-red-600 hover:text-white hover:font-bold transition-colors duration-300">Đăng
                                xuất</a>
                        </div>
                    </label>
                <?php else : ?>
                    <a href="/auth">
                        <svg class="size-6 fill-black dark:fill-white" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 512 512">
                            <path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z"/>
                        </svg>
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</header>

<?php
$no_nav = $no_nav ?? false;
if (!$no_nav) require_once ROOT_PATH . '/components/navbar.php';
?>