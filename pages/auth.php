<?php
require_once ROOT_PATH . '/utils/account.php';
$account = new Account();

if ($account->getAccount()) {
    header('Location: /account');
    exit();
}

$body_component = 'layouts/auth/index.php';
$no_header = true;
$no_footer = true;

$type = 0;

$title = [
    'Đăng nhập',
    'Đăng ký'
];

$error_message = [
    'empty' => 'Vui lòng điền đầy đủ thông tin',
    'invalid' => 'Thông tin không hợp lệ',
    'exist' => 'Tài khoản đã tồn tại',
    'not_exist' => 'Tài khoản không tồn tại',
    'wrong' => 'Sai mật khẩu'
];

if (isset($_SESSION['auth_type']) || isset($_GET['t'])) {
    $type = $_SESSION['auth_type'] ?? $_GET['t'];
}

if (isset($_SESSION['auth_error'])) {
    $error = $_SESSION['auth_error'];
}

if (isset($error)) {
    $error_message = $error_message[$error];
}

$subtitle = $title[$type];

require_once 'components/template/index.php';
