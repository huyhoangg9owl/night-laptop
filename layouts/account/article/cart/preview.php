<aside class="col-span-5 w-full bg-gray-50 p-6 xl:col-span-3 dark:bg-black/40">
    <h2 class="font-manrope border-b border-gray-300 pb-8 text-3xl font-bold leading-10 text-black dark:text-white">
        Tóm tắt</h2>
    <div class="mt-8">
        <div class="flex items-center justify-between pb-6">
            <p class="text-lg font-normal leading-8 text-black dark:text-white"><?= count($cart) ?> sản phẩm</p>
            <p class="text-lg font-medium leading-8 text-black dark:text-white">
                <?= number_format($Cart->total(), 0, "", ",") ?> đ
            </p>
        </div>
        <form action="/services/account/cart/update" method="get" class="gap-0 max-xl:grid max-xl:grid-cols-2 max-xl:grid-rows-2 max-xl:gap-x-8">
            <label for="discount_code" class="order-1 col-span-1 row-span-1 mb-1.5 flex flex-col text-sm font-medium text-gray-400 transition-colors duration-300 has-[:focus]:text-black dark:has-[:focus]:text-white">
                <p class="mb-2">Mã giảm giá</p>
                <input type="text" id="discount_code" name="discount_code" class="shadow-xs peer block h-11 w-full rounded-lg border border-gray-300 bg-gray-200 py-2.5 pl-5 pr-11 text-base font-normal text-gray-900 placeholder-gray-500 focus:outline-gray-400 dark:bg-gray-400" placeholder="xxxx xxxx xxxx" disabled>
            </label>
            <button class="order-3 col-span-1 mt-4 h-fit w-full cursor-not-allowed rounded-lg bg-black px-4 py-2 text-center text-sm font-semibold text-white transition-all duration-500 hover:bg-black/80 max-xl:mt-0 max-xl:py-4" type="button">
                Áp dụng
            </button>
            <div class="order-2 col-span-1 row-span-1 flex items-center justify-between py-8">
                <p class="text-xl font-medium leading-8 text-black dark:text-white">Tổng cộng</p>
                <p class="text-xl font-semibold leading-8 text-indigo-600">
                    <?= number_format($Cart->total(), 0, "", ",") ?> đ
                </p>
            </div>
            <a href="/checkout" class="order-4 col-span-1 h-fit w-full rounded-xl bg-indigo-600 px-6 py-3 text-center text-lg font-semibold text-white transition-all duration-500 hover:bg-indigo-700">
                Thanh toán
            </a>
        </form>
    </div>
</aside>