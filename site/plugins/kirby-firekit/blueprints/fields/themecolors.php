<?php

$themecolors = option('felixf.firekit.themecolors');

$colors = [];

foreach ($themecolors as $color) {
    $colors[$color['name']] = $color['first-back'];
};

$field = [
    'type' => 'color',
    'label' => 'Hintergrundfarbe',
    'mode' => 'options',
    'options' => $colors,
    'width' => '1/2',
];

return $field;