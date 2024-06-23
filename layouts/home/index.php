<main class="w-full min-h-dvh relative p-4 container mx-auto">
    <?php
    $json = file_get_contents(ROOT_PATH . '/fake/new_banners.json');
    $carousel = json_decode($json, true);

    $name_carousel = "banner";
    require ROOT_PATH . '/components/carousel.php';
    require_once ROOT_PATH . '/layouts/home/news-product/index.php';
    ?>
    <article class="w-full p-4 bg-sky-200 text-black rounded text-center mb-8">
        <h1>Chỗ này để banner quảng cáo nhà tài trợ mà chưa có tài trợ :( Liên hệ tài trợ <a href="https://fb.com/9owlsama" target="_blank" class="text-sky-600">tại đây!</a></h1>
    </article>
    <?php
    require_once ROOT_PATH . '/layouts/home/sponsors.php';
    require_once ROOT_PATH . '/layouts/home/reviews.php';
    ?>
</main>