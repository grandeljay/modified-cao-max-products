<?php

namespace Grandeljay\CaoMaxProducts;

if (\rth_is_module_disabled(Constants::MODULE_NAME)) {
    return;
}

if (!isset($_POST['action']) || 'products_update' !== $_POST['action']) {
    return;
}

if (!isset($_POST['pID'])) {
    return;
}

if (isset($_POST['products_userfield'][10])) {
    $products_id           = $_POST['pID'];
    $products_userfield_10 = \trim($_POST['products_userfield'][10]);
    $products_entries      = \explode(';', $products_userfield_10);

    foreach ($products_entries as $products_entry) {
        $country_code_and_quantity = \explode(':', $products_entry);

        if (!isset($country_code_and_quantity[0], $country_code_and_quantity[1])) {
            continue;
        }

        $country_code = $country_code_and_quantity[0];
        $max_quantity = $country_code_and_quantity[1];

        \xtc_db_query(
            \sprintf(
                'REPLACE INTO `%s` (`product_id`, `country_code`, `max_quantity`)
                       VALUES (%d, "%s", %d)',
                \grandeljay_cao_max_products::class,
                $products_id,
                $country_code,
                $max_quantity
            )
        );
    }
} else {
    \xtc_db_query(
        \sprintf(
            'DELETE FROM `%s`
                   WHERE `product_id` = %d',
            \grandeljay_cao_max_products::class
        )
    );
}
