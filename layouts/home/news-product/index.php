<section class="w-full my-8">
    <article class="w-full flex items-end justify-between">
        <h1 class="text-2xl font-bold">Sản phẩm mới</h1>
        <a href="/products/news" class="text-sky-500 underline">Tất cả</a>
    </article>
    <?php
    $carousel = [];
    $name_carousel = 'news-product';
    $carousel_config = [
        "indicators" => false,
        "controls" => true,
        "items_model" => ROOT_PATH . '/layouts/home/news-product/product-card.php',
        "carousel_css" => "py-2"
    ];
    require ROOT_PATH . '/components/carousel.php';
    ?>
</section>