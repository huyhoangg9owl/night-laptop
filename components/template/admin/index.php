<?php
session_start();
global $conn;

$query = "SELECT * FROM seo_setting ORDER BY created_at DESC";
$seo_setting = $conn->query($query);
$seo_setting = $conn->fetch_once();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META TAG -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Trang quản trị">
    <meta name="theme-color" content="#000000">
    <!-- META TAG -->
    <!-- SCRIPT TAG -->
    <script src="/lib/js/jquery.js"></script>
    <script src="/lib/js/chart.js"></script>
    <script src="/lib/js/chartjs-plugin-datalabels.js"></script>
    <script src="/lib/js/jquery_migrate.js"></script>
    <script src="/lib/js/tailwind.js"></script>
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
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css" />
    <!-- LINK TAG -->
    <title>
        <?= $seo_setting["title"] . " Admin" . (isset($subtitle) ? " | " . $subtitle : "") ?>
    </title>
</head>

<body class="w-full h-full min-h-dvh bg-slate-200 dark:bg-zinc-700 relative dark:text-white transition-colors duration-300 be-vietnam-pro-light grid grid-cols-[5rem_1fr]">
    <?php
    require_once ROOT_PATH . '/components/template/admin/navbar.php';
    ?>
    <main class="w-full h-full px-16 py-8">
        <?php
        require_once $body_component;
        ?>
    </main>
    <?php
    require_once ROOT_PATH . '/components/template/admin/footer.php';
    ?>
</body>

</html>
<?php
session_write_close();
