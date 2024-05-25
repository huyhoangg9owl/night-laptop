<?php

require_once "../../config/config.php";
require_once ROOT_PATH . "/utils/Account.php";

global $conn;

$id = $_GET["id"];

if (empty($id) || !isset($id)) {
    header("Location: /admin/account");
    exit();
}

$account = new Account();
$account->deleteAccount($id);

header("Location: /admin/account");
exit();
