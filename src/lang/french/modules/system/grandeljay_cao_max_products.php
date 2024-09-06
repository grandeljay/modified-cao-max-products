<?php

namespace Grandeljay\CaoMaxProducts;

use Grandeljay\Translator\Translations;

$translations = new Translations(__FILE__, Constants::MODULE_NAME);
$translations->add('TITLE', 'grandeljay - CAO Max Products');
$translations->add('TEXT_TITLE', 'CAO Max Products');
$translations->add('ALLOWED_QUANTITY_EXCEEDED', 'Le nombre maximal de pièces autorisé de <strong>%d</strong> pour <strong>%s</strong> a été dépassé. Le nombre de pièces a été fixé au maximum possible.');
$translations->define();
