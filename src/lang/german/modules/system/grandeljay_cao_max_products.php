<?php

namespace Grandeljay\CaoMaxProducts;

use Grandeljay\Translator\Translations;

$translations = new Translations(__FILE__, Constants::MODULE_NAME);
$translations->add('TITLE', 'grandeljay - CAO Max Products');
$translations->add('TEXT_TITLE', 'CAO Max Products');
$translations->add('ALLOWED_QUANTITY_EXCEEDED', 'Die maximal erlaubte Stückzahl in Höhe von <strong>%d</strong> für <strong>%s</strong> wurde überschritten. Die Stückzahl wurde aufs mögliche maximum gesetzt.');
$translations->define();
