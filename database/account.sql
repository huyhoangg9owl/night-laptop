-- MariaDB
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE `account`;
TRUNCATE TABLE `account_profile`;
TRUNCATE TABLE `account_payment_info`;

CREATE TABLE IF NOT EXISTS `account`
(
    `id`         int(11)      NOT NULL AUTO_INCREMENT,
    `username`   varchar(255) NOT NULL,
    `email`      varchar(255) NOT NULL,
    `password`   varchar(255) NOT NULL,
    `created_at` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `username` (`username`),
    UNIQUE KEY `email` (`email`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `account_profile`
(
    `id`         int(11)      NOT NULL AUTO_INCREMENT,
    `account_id` int(11)      NOT NULL,
    `role`       int(11)      NOT NULL DEFAULT 0 CHECK (role IN (0, 1)),
    `avatar`     varchar(255) NOT NULL DEFAULT '/assets/images/default-avatar.png',
    `created_at` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

CREATE TABLE IF NOT EXISTS `account_payment_info`
(
    `id`           int(11)      NOT NULL AUTO_INCREMENT,
    `account_id`   int(11)      NOT NULL,
    `phone_number` varchar(255) NOT NULL,
    `address`      varchar(255) NOT NULL,
    `payment_type` int(11)      NOT NULL DEFAULT 1 CHECK (payment_type IN (1, 2, 3, 4)),
    `created_at`   timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`   timestamp    NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
