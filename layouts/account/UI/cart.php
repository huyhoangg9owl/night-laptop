<div class="grid grid-cols-10 relative w-full h-full">
    <article class="bg-gray-100 dark:bg-black/20 w-full col-span-7 p-6">
        <h2 class="font-manrope font-bold text-3xl leading-10 text-black dark:text-white pb-8 border-b border-gray-300">
            Giỏ hàng</h2>
        <table class="w-full mt-6 border-b border-gray-300">
            <thead>
                <tr class="text-left">
                    <th class="font-normal text-base text-gray-600 dark:text-gray-400">Sản phẩm</th>
                    <th class="font-normal text-base text-gray-600 dark:text-gray-400">Giá</th>
                    <th class="font-normal text-base text-gray-600 dark:text-gray-400">Số lượng</th>
                    <th class="font-normal text-base text-gray-600 dark:text-gray-400">Tổng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="flex items-center gap-4 py-6">
                        <img src="https://via.placeholder.com/150" alt="Product" class="w-20 h-20 object-cover rounded-lg">
                        <div>
                            <h3 class="font-semibold text-lg text-black dark:text-white">Product Name</h3>
                            <p class="font-normal text-base text-gray-400 dark:text-gray-400">Product Description</p>
                        </div>
                    </td>
                    <td class="font-normal text-base text-gray-600 dark:text-white">$160.00</td>
                    <td class="font-normal text-base text-gray-600 dark:text-white">
                        <div class="bg-white border border-gray-200 rounded-lg dark:bg-neutral-900 dark:border-neutral-700 w-fit" data-hs-input-number='{"min": 1}'>
                            <div class="flex justify-between items-center w-fit">
                                <div class="py-2 px-3">
                                    <input class="p-0 bg-transparent border-0 text-gray-800 focus:ring-0 dark:text-white" type="text" value="1" data-hs-input-number-input="">
                                </div>
                                <div class="flex flex-col -gap-y-px divide-y divide-gray-200 border-s border-gray-200 dark:divide-neutral-700 dark:border-neutral-700">
                                    <button type="button" class="size-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-se-lg bg-gray-50 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700" data-hs-input-number-decrement="">
                                        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                        </svg>
                                    </button>
                                    <button type="button" class="size-7 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-ee-lg bg-gray-50 text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700" data-hs-input-number-increment="">
                                        <svg class="flex-shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14"></path>
                                            <path d="M12 5v14"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="font-normal text-base text-gray-600 dark:text-white">$160.00</td>
                </tr>
            </tbody>
        </table>

        <div class="ml-auto mt-6 w-fit">
            <button class="mr-4 text-center bg-green-600 rounded-xl py-3 px-6 font-semibold text-lg text-white transition-all duration-500 hover:bg-green-700">
                Cập nhật
            </button>
            <button class="text-center bg-gray-600 rounded-xl py-3 px-6 font-semibold text-lg text-white transition-all duration-500 hover:bg-gray-700">
                Hủy
            </button>
        </div>
    </article>
    <aside class="bg-gray-50 dark:bg-black/40 w-full col-span-3 p-6">
        <h2 class="font-manrope font-bold text-3xl leading-10 text-black dark:text-white pb-8 border-b border-gray-300">
            Tóm tắt</h2>
        <div class="mt-8">
            <div class="flex items-center justify-between pb-6">
                <p class="font-normal text-lg leading-8 text-black dark:text-white">3 sản phẩm</p>
                <p class="font-medium text-lg leading-8 text-black dark:text-white">$480.00</p>
            </div>
            <form>
                <label class="flex  items-center mb-1.5 text-gray-600 dark:text-gray-400 text-sm font-medium">Đơn vị giao hàng
                </label>
                <div class="flex pb-6">
                    <div class="relative w-full">
                        <div class=" absolute left-0 top-0 py-3 px-4">
                            <span class="font-normal text-base text-gray-300">Second Delivery</span>
                        </div>
                        <input type="text" class="block w-full h-11 pr-10 pl-36 min-[500px]:pl-52 py-2.5 text-base font-normal shadow-xs text-gray-900 bg-white border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-gray-400" placeholder="$5.00">
                        <button id="dropdown-button" data-target="dropdown-delivery" class="dropdown-toggle flex-shrink-0 z-10 inline-flex items-center py-4 px-4 text-base font-medium text-center text-gray-900 bg-transparent  absolute right-0 top-0 pl-2 " type="button">
                            <svg class="ml-2 my-auto" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.5L4.58578 5.08578C5.25245 5.75245 5.58579 6.08579 6 6.08579C6.41421 6.08579 6.74755 5.75245 7.41421 5.08579L11 1.5" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <div id="dropdown-delivery" aria-labelledby="dropdown-delivery" class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 absolute top-10 right-0">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Shopping</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Images</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">News</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Finance</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <label class="flex items-center mb-1.5 text-gray-400 text-sm font-medium">Mã giảm giá
                </label>
                <div class="flex pb-4 w-full">
                    <div class="relative w-full ">
                        <div class=" absolute left-0 top-0 py-2.5 px-4 text-gray-300">

                        </div>
                        <input type="text" class="block w-full h-11 pr-11 pl-5 py-2.5 text-base font-normal shadow-xs text-gray-900 bg-white border border-gray-300 rounded-lg placeholder-gray-500 focus:outline-gray-400 " placeholder="xxxx xxxx xxxx">
                        <button id="dropdown-button" data-target="dropdown" class="dropdown-toggle flex-shrink-0 z-10 inline-flex items-center py-4 px-4 text-base font-medium text-center text-gray-900 bg-transparent  absolute right-0 top-0 pl-2 " type="button">
                            <svg class="ml-2 my-auto" width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1.5L4.58578 5.08578C5.25245 5.75245 5.58579 6.08579 6 6.08579C6.41421 6.08579 6.74755 5.75245 7.41421 5.08579L11 1.5" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </button>
                        <div id="dropdown" class="absolute top-10 right-0 z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Shopping</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Images</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">News</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Finance</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="flex items-center border-b border-gray-200">
                    <button class="rounded-lg w-full bg-black py-2.5 px-4 text-white text-sm font-semibold text-center mb-8 transition-all duration-500 hover:bg-black/80">
                        Apply
                    </button>
                </div>
                <div class="flex items-center justify-between py-8">
                    <p class="font-medium text-xl leading-8 text-black dark:text-white">3 Items</p>
                    <p class="font-semibold text-xl leading-8 text-indigo-600">$485.00</p>
                </div>
                <button class="mt-4 w-full text-center bg-indigo-600 rounded-xl py-3 px-6 font-semibold text-lg text-white transition-all duration-500 hover:bg-indigo-700">
                    Checkout
                </button>
            </form>
        </div>
    </aside>
</div>