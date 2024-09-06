<?php

namespace Grandeljay\CaoMaxProducts;

/**
 * @author Jay Trees
 */

/** Prerequisites */
if (\rth_is_module_disabled(Constants::MODULE_NAME)) {
    return;
}

if (!isset($_SESSION['customer_country_id'], $_POST['products_id'], $_POST['cart_quantity'])) {
    return;
}

require \sprintf(
    '%s/%s/modules/system/%s.php',
    \DIR_WS_LANGUAGES,
    $_SESSION['language'],
    \grandeljay_cao_max_products::class
);

/** Get country code */
$country_code_query = \xtc_db_query(
    \sprintf(
        'SELECT *
           FROM `%s`
          WHERE `countries_id` = %d',
        \TABLE_COUNTRIES,
        $_SESSION['customer_country_id']
    )
);
$country_code_data  = \xtc_db_fetch_array($country_code_query);
$country_code       = $country_code_data['countries_iso_code_2'];

/** Get iterations */
$iterations = \min(
    \count($_POST['cart_quantity']),
    \count($_POST['products_id']),
    \count($_POST['old_qty'])
);

for ($i = 0; $i < $iterations; $i++) {
    /** Get product id */
    $products_id = (int) $_POST['products_id'][$i];

    /** Get product max quantity */
    $products_max_quantity_query = \xtc_db_query(
        \sprintf(
            'SELECT *
            FROM `%s`
            WHERE `product_id`   = %d
                AND `country_code` = "%s"',
            \grandeljay_cao_max_products::class,
            $products_id,
            $country_code
        )
    );
    $products_max_quantity_data  = \xtc_db_fetch_array($products_max_quantity_query);

    if (!\is_array($products_max_quantity_data)) {
        continue;
    }

    $products_max_quantity = (int) $products_max_quantity_data['max_quantity'];

    /** Get product quantity in cart */
    $products_in_cart = (int) $_POST['old_qty'][$i];

    /** Get product quantity to add to cart */
    $products_quantity = (int) $_POST['cart_quantity'][$i];

    /** Determine if maximum threshold is reached */
    if ($products_quantity <= $products_max_quantity) {
        continue;
    }

    /** Prevent adding quantity to cart */
    unset($_POST['products_id'][$i]);
    unset($_POST['cart_quantity'][$i]);
    unset($_POST['old_qty'][$i]);

    /** Reduce quantity in cart */
    foreach ($_SESSION['cart']->contents as $products_id_with_options => &$products_data) {
        \preg_match('/\d+/', $products_id_with_options, $products_id_matches);

        if (isset($products_id_matches[0]) && (int) $products_id_matches[0] === $products_id) {
            $products_data['qty'] = $products_max_quantity;

            break;
        }
    }

    /** Output message */
    $messageStack->add_session(
        'global',
        \sprintf(
            '<div class="warning_message"><i class="fas fa-exclamation-triangle"></i>&nbsp;%s</div>',
            \sprintf(
                \constant(Constants::MODULE_NAME . '_ALLOWED_QUANTITY_EXCEEDED'),
                $products_max_quantity,
                \xtc_get_products_name($products_id)
            )
        )
    );
}
