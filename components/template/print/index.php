<?php
require_once ROOT_PATH . '/utils/Account.php';
require_once ROOT_PATH . '/utils/Category.php';
global $conn;

session_start();
$no_header = $no_header ?? false;
$no_footer = $no_footer ?? false;

$query = "SELECT * FROM seo_setting ORDER BY created_at DESC";
$seo_setting = $conn->query($query);
$seo_setting = $conn->fetch_once();

if (isset($account)) {
    global $account;
} else {
    $Account = new Account();
    $account_profile = $Account->getAccountProfile();
    $account = $Account->getAccount();
}

$categories = new Category();
$categories = $categories->getCategories();
?>
<!DOCTYPE html>
<html lang="en" class="light h-full">
<?php require_once ROOT_PATH . '/components/template/global/head.php' ?>

<body class="be-vietnam-pro-light relative h-full min-h-dvh w-full transition-colors duration-300">
    <?php
    if (!isset($body_component)) global $body_component;
    if (!$no_header) require_once ROOT_PATH . '/components/template/print/header.php';
    require_once $body_component;
    ?>
    <button id="scroll-to-top" class="fixed bottom-4 right-4 hidden rounded-full bg-slate-300 p-2 shadow-md dark:bg-zinc-800">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </button>
    <?php
    if (!$no_footer) require_once 'components/template/global/footer.php';
    session_write_close();
    ?>
</body>

</html>