<head>
    <!-- META TAG -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $seo_setting["description"] ?>">
    <meta name="keywords" content="<?= $seo_setting["keywords"] ?>">
    <meta name="author" content="<?= $seo_setting["author"] ?>">
    <meta name="theme-color" content="#000000">
    <meta property="og:image" content="/public/favicon.ico">
    <meta property="og:title" content="<?= $seo_setting["title"] ?>">
    <meta property="og:description" content="<?= $seo_setting["description"] ?>">
    <meta property="og:site_name" content="<?= $seo_setting["title"] ?>">
    <meta property="og:type" content="website">
    <!-- META TAG -->
    <!-- SCRIPT TAG -->
    <script src="/lib/js/jquery.js"></script>
    <script src="/lib/js/jquery_migrate.js"></script>
    <script src="/lib/js/tailwind.js"></script>
    <script src="/lib/js/preline.js"></script>
    <script src="/lib/js/ckeditor.js"></script>
    <script src="/config/tailwind.config.js"></script>
    <script src="/js/index.js" type="module"></script>
    <!-- SCRIPT TAG -->
    <!-- LINK TAG -->
    <link rel="shortcut icon" href="/public/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- LINK TAG -->
    <title>
        <?= (isset($subtitle) ? $subtitle . " | " : "") . $seo_setting["title"] ?>
    </title>
</head>