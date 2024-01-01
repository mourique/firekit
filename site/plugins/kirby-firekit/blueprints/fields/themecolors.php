<?php

$themecolors = option('themecolors');

$colors = [];

foreach ($themecolors as $color) {
    $colors[$color['name']] = $color['background'];
};

$field = [
    'type' => 'color',
    'label' => 'Hintergrundfarbe',
    'mode' => 'options',
    'options' => $colors,
    'width' => '1/2',
];

return $field;