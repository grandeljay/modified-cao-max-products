<?php

namespace Grandeljay\CaoMaxProducts;

use Grandeljay\Translator\Translations;

$translations = new Translations(__FILE__, Constants::MODULE_NAME);
$translations->add('TITLE', 'grandeljay - CAO Max Products');
$translations->add('TEXT_TITLE', 'CAO Max Products');
$translations->add('ALLOWED_QUANTITY_EXCEEDED', 'Se ha superado la cantidad máxima permitida de <strong>%d</strong> para <strong>%s</strong>. El número de unidades se ha ajustado al máximo posible..');
$translations->define();
