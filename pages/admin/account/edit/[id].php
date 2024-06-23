<?php
global $router;
require_once ROOT_PATH . "/utils/Account.php";

$Account = new Account();

$account_profile = $Account->getAccountProfile();

if ($account_profile) {
    $role = $account_profile['role'];
    if ($role) {
        $params = $router->getParams();
        $id = $params['id'];
        if (is_numeric($id)) {
            $id = intval($id);
            $account = $Account->getAccount($id);
            if (!$account) {
                header("Location: /not-found");
                exit();
            }
            $account_payment = $Account->getAccountPayment($id);
            $account_profile = $Account->getAccountProfile($id);
            $body_component = ROOT_PATH . '/layouts/admin/account/edit.php';
            require_once ROOT_PATH . '/components/template/admin/index.php';
        } else {
            header("Location: /not-found");
            exit();
        }
    } else {
        header("Location: /not-found");
        exit();
    }
} else {
    header("Location: /not-found");
    exit();
}
