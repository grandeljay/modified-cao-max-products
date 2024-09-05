<?php

namespace Grandeljay\CaoMaxProducts;

use Grandeljay\Translator\Translations;

$translations = new Translations(__FILE__, Constants::MODULE_NAME);
$translations->add('TITLE', 'grandeljay - CAO Max Products');
$translations->add('TEXT_TITLE', 'CAO Max Products');
$translations->add('ALLOWED_QUANTITY_EXCEEDED', 'Le nombre maximal de pièces autorisé, soit <strong>%d</strong> pour <strong>%s</strong>, a été dépassé. Le nombre de pièces n\'a <strong>pas</strong> été ajouté au panier.');
$translations->define();
