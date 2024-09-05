<?php

namespace Grandeljay\CaoMaxProducts;

class Installer
{
    public static function install(): void
    {
        self::createTable();
    }

    public static function createTable(): void
    {
        \xtc_db_query(
            \sprintf(
                'DROP TABLE IF EXISTS `%s`',
                \grandeljay_cao_max_products::class
            )
        );

        \xtc_db_query(
            \sprintf(
                'CREATE TABLE `%s` (
                    `product_id`   INT      NOT NULL,
                    `country_code` TINYTEXT NOT NULL,
                    `max_quantity` INT      NOT NULL,
                    UNIQUE INDEX `product_id_country_code` (`product_id`, `country_code`(2)),
                    INDEX `product_id` (`product_id`)
                )',
                \grandeljay_cao_max_products::class
            )
        );
    }
}
