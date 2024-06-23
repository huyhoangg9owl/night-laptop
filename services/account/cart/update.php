<?php
if (isset($_POST["product"])) {
    require_once "../../../config/config.php";
    require_once ROOT_PATH . "/utils/Account.php";
    $Account = new Account();

    foreach ($_POST["product"] as $product) {
        $product_id = $product["id"];
        $quantity = $product["quantity"];
        $Account->updateCart($product_id, $quantity);
    }
}

header("Location: /account/cart");
exit;
