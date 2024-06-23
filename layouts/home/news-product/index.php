<section class="my-8 w-full">
    <article class="w-full text-2xl font-bold">
        Sản phẩm mới
    </article>
    <?php
    $conn->query("SELECT product.* FROM product INNER JOIN category ON product.category_id = category.id WHERE category.status = 1 GROUP BY product.id ORDER BY created_at DESC LIMIT 10");
    $carousel = $conn->fetch_all();
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