<?php
require_once ROOT_PATH . '/utils/account.php';

global $body_component;
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
    $account = new Account();
    $account_profile = $account->getAccountProfile();
    $account = $account->getAccount();
}
?>
<!DOCTYPE html>
<html lang="en" class="light h-full">
<?php require_once 'components/template/head.php' ?>

<body class="w-full min-h-dvh h-full bg-slate-200 dark:bg-zinc-700 relative dark:text-white transition-colors duration-300 be-vietnam-pro-light">
<?php
if (!$no_header) require_once 'components/template/header.php';
require_once $body_component;
?>
<button id="scroll-to-top"
        class="fixed bottom-4 right-4 p-2 bg-slate-300 dark:bg-zinc-800 rounded-full shadow-md hidden">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 text-white w-6" fill="none" viewBox="0 0 24 24"
         stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>
<?php
if (!$no_footer) require_once 'components/template/footer.php';
session_write_close();
?>
</body>

</html>