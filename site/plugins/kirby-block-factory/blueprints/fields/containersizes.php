<?php

$containersizes = option('containersizes');

$sizes = [];

foreach ($containersizes as $size) {
    $sizes[$size['slug']] = $size['name'];
};

$field = [
    'type' => 'select',
    'label' => 'Inhaltsbreite',
    'mode' => 'options',
    'required' => 'true',
    'default' => 'regular',
    'options' => $sizes,
    'width' => '1/2',
];

return $field;