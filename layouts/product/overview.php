<div class="w-full px-4 sm:px-6 lg:px-0">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mx-auto max-md:px-2 ">
        <div class="w-full max-lg:mx-auto">
            <img src="<?= $product_image['image_url'] ?? "/public/favicon.ico" ?>" alt="<?= $product['name'] ?>" class="max-lg:mx-auto lg:ml-auto w-full rounded-md shadow-lg dark:shadow-gray-600 max-w-[750px]">
        </div>
        <div class="data w-full lg:pr-8 pr-0 xl:justify-start justify-center flex items-center max-lg:pb-10 xl:my-2 lg:my-5 my-0">
            <div class="data w-full max-w-xl">
                <p class="text-lg font-medium leading-8 text-indigo-600 dark:text-indigo-500 mb-4">
                    <a href="/category/<?= $category['name'] ?>" class="hover:text-indigo-400 transition-colors duration-300"><?= $category['name'] ?></a>
                    /
                    <?= $product['name'] ?>
                </p>
                <h2 class="font-manrope font-bold text-3xl leading-10 text-gray-900 dark:text-white mb-2 capitalize">
                    <?= $product['name'] ?>
                </h2>
                <div class="flex flex-col sm:flex-row sm:items-center mb-6">
                    <h6 class="font-manrope font-semibold text-2xl leading-9 text-gray-900 dark:text-white pr-5 sm:border-r border-gray-200 mr-5">
                        <?= number_format($product['price'], 0, "", ",") ?> đ
                    </h6>
                    <div class="flex items-center gap-2">
                        <div class="flex items-center gap-1">
                            <?php
                            Icon("star", "fill-yellow-400");
                            Icon("star", "fill-yellow-400");
                            Icon("star", "fill-yellow-400");
                            Icon("star", "fill-yellow-400");
                            Icon("star", "fill-gray-400");
                            ?>
                        </div>
                        <span class="pl-2 font-normal leading-7 text-gray-500 dark:text-gray-300 text-sm "><?= count($Product->getReviews($product_id)); ?> đánh giá</span>
                    </div>
                </div>

                <form class="grid grid-cols-1 sm:grid-cols-2 gap-3 py-8" action="/services/product/add_cart" method="get">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                    <div class="flex items-center justify-center w-full" data-group="quantity">
                        <button type="button" class="group py-4 px-6 border border-gray-400 rounded-l-full bg-white transition-all duration-300 hover:bg-gray-50" data-action="minus">
                            <?php Icon("minus", "size-6 stroke-gray-400 group-hover:stroke-black transition-colors duration-300"); ?>
                        </button>
                        <input type="number" name="quantity" class="font-semibold text-gray-900 cursor-pointer text-base px-6 py-4 w-full sm:max-w-[118px] outline-0 border-y border-gray-400 bg-transparent placeholder:text-gray-900 text-center bg-white hover:bg-gray-50" placeholder="1" value="1">
                        <button type="button" class="group py-4 px-6 border border-gray-400 rounded-r-full bg-white transition-all duration-300 hover:bg-gray-50" data-action="plus">
                            <?php Icon("plus", "size-6 fill-gray-400 group-hover:fill-black transition-colors duration-300"); ?>
                        </button>
                    </div>
                    <?php if ($account) : ?>
                        <?php if ($Product->getQuantityAvailable($product['id']) > 0) : ?>
                            <button class="group py-4 px-5 rounded-full bg-indigo-50 text-indigo-600 font-semibold text-lg w-full flex items-center justify-center gap-2 transition-all duration-500 hover:bg-indigo-100" type="submit">
                                <?php Icon("cart"); ?>
                                Thêm giỏ hàng
                            </button>
                        <?php endif; ?>
                    <?php endif; ?>
                </form>
                <?php
                if ($Product->getQuantityAvailable($product['id']) < 1) :
                ?>
                    <button class="text-center w-full px-5 py-4 rounded-[100px] bg-gray-700 font-semibold text-lg text-white cursor-not-allowed" type="button">
                        Hết hàng
                    </button>
                <?php endif;
                ?>
            </div>
        </div>
    </div>
</div>