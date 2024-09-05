<?php

namespace Grandeljay\CaoMaxProducts;

use Grandeljay\Translator\Translations;

$translations = new Translations(__FILE__, Constants::MODULE_NAME);
$translations->add('TITLE', 'grandeljay - CAO Max Products');
$translations->add('TEXT_TITLE', 'CAO Max Products');
$translations->add('ALLOWED_QUANTITY_EXCEEDED', 'The maximum permitted quantity of <strong>%d</strong> for <strong>%s</strong> has been exceeded. The quantity has <strong>not</strong> been added to the shopping cart.');
$translations->define();
