<?php

namespace Grandeljay\CaoMaxProducts;

use Grandeljay\Translator\Translations;

$translations = new Translations(__FILE__, Constants::MODULE_NAME);
$translations->add('TITLE', 'grandeljay - CAO Max Products');
$translations->add('TEXT_TITLE', 'CAO Max Products');
$translations->add('ALLOWED_QUANTITY_EXCEEDED', 'È stata superata la quantità massima consentita di <strong>%d</strong> per <strong>%s</strong>. La quantità <strong>non è</strong> stata aggiunta al carrello.');
$translations->define();
