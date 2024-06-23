DROP TABLE IF EXISTS `order`;

CREATE TABLE IF NOT EXISTS `order` (
    `id` int (11) NOT NULL AUTO_INCREMENT,
    `payment_id` varchar (255) DEFAULT NULL,
    `account_id` int (11) NOT NULL,
    `product_id` int (11) NOT NULL,
    `name_reciver` varchar (255) NOT NULL,
    `address` varchar (255) NOT NULL,
    `phone` varchar (255) NOT NULL,
    `quantity` int (11) NOT NULL,
    `total` int (11) NOT NULL,
    `payment_type` int (11) NOT NULL DEFAULT 1 CHECK (payment_type IN (1, 2)),
    `payment_status` int (11) NOT NULL DEFAULT 1 CHECK (payment_status IN (0, 1, 2)),
    `status` int (11) NOT NULL DEFAULT 1 CHECK (status IN (0, 1, 2, 3)),
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `account_id` (`account_id`),
    FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
    FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;