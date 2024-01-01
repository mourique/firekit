<?php
return [
    'languages' => true,
    'panel' => [
        'css' => 'assets/css/custom-panel.css'
    ],
    'thumbs' => [
        'srcsets' => [
            'default' => [
                '300w' => ['width' => 300],
                '600w' => ['width' => 600],
                '900w' => ['width' => 900],
                '1200w' => ['width' => 1200],
                '1800w' => ['width' => 1800]
            ],
            'webp' => [
                '300w' => ['width' => 300, 'format' => 'webp'],
                '600w' => ['width' => 600, 'format' => 'webp'],
                '900w' => ['width' => 900, 'format' => 'webp'],
                '1200w' => ['width' => 1200, 'format' => 'webp'],
                '1800w' => ['width' => 1800, 'format' => 'webp']
            ],
        ]
    ],
    /* define the brand colors here, lowercase letters */
    'themecolors' => [
        ['name' => 'bordeaux',  'background' => '#CFDBD5',  'foreground' => '#333533' ],
        ['name' => 'magnolia',  'background' => '#E8EDDF',  'foreground' => '#444444' ],
        ['name' => 'sparrow',  'background' => '#242423',  'foreground' => '#E8EDDF' ],
        ['name' => 'carbon',    'background' => '#F5CB5C',  'foreground' => '#242423' ]
    ],
    /* define the width of content here, well be used in kirby panel and in css */
    'containersizes' => [
        ['name' => 'Standard',      'slug' => 'regular',    'width' => '90vw',  'max-width' => 'max(60vw, 1500px)' ],
        ['name' => 'Randlos',       'slug' => 'full',       'width' => '100%',  'max-width' => '100%' ],
        ['name' => 'Volle Breite',  'slug' => 'max',        'width' => '98vw',  'max-width' => '2200px' ],
        ['name' => 'Schmal',        'slug' => 'small',      'width' => '90vw',  'max-width' => 'max(50vw, 1000px)' ],
        ['name' => 'Breit',         'slug' => 'large',      'width' => '98vw',  'max-width' => '1700px' ]
    ]
];