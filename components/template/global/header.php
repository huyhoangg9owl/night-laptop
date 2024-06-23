<header class="relative z-[1000] w-full max-w-full rounded-none border border-slate-300/30 bg-white bg-opacity-80 px-4 shadow-md backdrop-blur-2xl backdrop-saturate-200 duration-200 dark:border-slate-700/80 dark:bg-zinc-600">
    <div class="container mx-auto flex items-center justify-between px-8 py-4 lg:px-0">
        <a href="/">
            <h1 class="madimi-one-regular text-4xl">
                <span class="text-sky-400">9</span><span class="card text-zinc-500 dark:text-white">LapTop</span>
            </h1>
        </a>
        <form action="/search" method="get" class="w-1/2 rounded border border-gray-200 p-2 pl-6 md:block dark:border-gray-400/80 relative">
            <label class="peer">
                <input type="search" name="q" class="w-full border-none bg-transparent text-gray-600 focus:outline-none dark:text-white" placeholder="Tìm kiếm sản phẩm..." id="search" />
            </label>
            <ul class="absolute bottom-0 left-0 right-0 translate-y-full w-full min-h-40 max-h-96 overflow-y-auto bg-white rounded-b-md hidden shadow-lg" id="search_result">
            </ul>
        </form>
        <ul class="grid grid-cols-4 grid-rows-1 place-items-center gap-5 md:grid-cols-3">
            <li class="flex justify-center md:hidden">
                <a href="/search">
                    <?php
                    Icon("search", "text-gray-600 dark:text-gray-300");
                    ?>
                </a>
            </li>
            <li class="flex flex-col justify-center">
                <?php require_once ROOT_PATH . '/components/toggle_theme.php'; ?>
            </li>
            <li class="flex justify-center">
                <a href="/account/cart" class="relative">
                    <?php Icon("cart", "text-gray-600 dark:text-white") ?>
                    <?php
                    $cart_valid = $Account->Cart();
                    if ($cart_valid) :
                    ?>
                        <span class="absolute -right-2 -top-1 size-2 rounded-full bg-red-500"></span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="flex justify-center">
                <?php
                if ($account) : ?>
                    <label for="account_toggle" class="relative cursor-pointer">
                        <img loading="lazy" class="h-8 w-8 rounded-full" src="<?= $account_profile['avatar'] ?>" alt="Avatar account" />
                        <input type="checkbox" name="account_toggle" id="account_toggle" class="peer/account_toggle hidden" />
                        <div class="absolute right-0 top-0 mt-12 hidden w-48 origin-top-right animate-[sweepIn_.25s_linear] overflow-hidden rounded-md border border-gray-200 bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none peer-checked/account_toggle:block dark:border-gray-400/80 dark:bg-zinc-600">
                            <?php if ($account_profile['role']) : ?>
                                <a href="/admin" class="block px-4 py-2 text-sm text-gray-700 transition-colors duration-300 hover:bg-sky-600 hover:font-bold hover:text-white dark:text-gray-300">Trang Admin</a>
                            <?php endif; ?>
                            <a href="/account" class="block px-4 py-2 text-sm text-gray-700 transition-colors duration-300 hover:bg-sky-600 hover:font-bold hover:text-white dark:text-gray-300">Tài khoản</a>
                            <a href="/services/account/logout" class="block px-4 py-2 text-sm text-gray-700 transition-colors duration-300 hover:bg-red-600 hover:font-bold hover:text-white dark:text-gray-300">Đăng xuất</a>
                        </div>
                    </label>
                <?php else : ?>
                    <a href="/auth">
                        <svg class="size-6 fill-black dark:fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z" />
                        </svg>
                    </a>
                <?php endif; ?>
            </li>
        </ul>
    </div>
</header>

<script>
    const search = document.getElementById('search');
    const search_result = document.getElementById('search_result');

    search.addEventListener('input', async function() {
        const response = await fetch(`/search?q=${search.value}`, {
            headers: {
                'Content-Type': 'application/json'
            }
        });
        const products = await response.json();

        if (products.length === 0) {
            search_result.classList.add('hidden');
            return;
        }

        search_result.classList.remove('hidden');


        search_result.innerHTML = products.map(product => {
            const desc = new DOMParser().parseFromString(product.description, 'text/html').body.textContent;
            return `
            <li>
                <a href="/product/${product.id}" class="flex items-center justify-between hover:bg-gray-200 border-b border-b-gray-200 p-4">
                    <img class="h-12 w-12" src="${product.image_url ?? "/public/favicon.ico"}" alt="Product image" />
                    <div class="flex-1 ml-4">
                        <h3 class="text-lg font-semibold">${product.name}</h3>
                        <div class="text-gray-500 line-clamp-1">${desc}</div>
                    </div>
                </a>
            </li>
        `
        }).join('');
    });
</script>

<?php
$no_nav = $no_nav ?? false;
if (!$no_nav) require_once ROOT_PATH . '/components/navbar.php';
?>