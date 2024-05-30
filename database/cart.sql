CREATE TABLE
    IF NOT EXISTS `cart` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `account_id` int (11) NOT NULL,
        `product_id` int (11) NOT NULL,
        `quantity` int (11) NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `account_id` (`account_id`),
        KEY `product_id` (`product_id`),
        CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
        CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8;