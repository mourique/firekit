<?php

return [
        'debug' => true, // only use debug when in local test environment

    'languages' => true,
    'panel' => [
        'css' => '../assets/css/custom-panel.css'
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
    'felixf.firekit' => [
        // the header style needs to be created as a css file,
        // currently only 'header_on_top'
        'header_style' => 'header_on_top',

        'blocks' => [

            /* this would be nicer:
            'heading' => ['subheadline' => true, 'label_de' => 'Überschrift', 'label_en' => 'Heading'],
            */

            ['name' => 'heading', 'subheadline' => true, 'label_de' => 'Überschrift', 'label_en' => 'Heading'],
            ['name' => 'text', 'label_de' => 'Text', 'label_en' => 'Text'],
            ['name' => 'image', 'label_de' => 'Bild', 'label_en' => 'Image'],
            ['name' => 'quote', 'label_de' => 'Zitat', 'label_en' => 'Quote'],
            ['name' => 'button', 'label_de' => 'Button', 'label_en' => 'Button'],
            ['name' => 'accordion', 'label_de' => 'Accordion', 'label_en' => 'Accordion'],
            ['name' => 'datablock', 'label_de' => 'Datenblock', 'label_en' => 'Datablock'],
            ['name' => 'diashow', 'label_de' => 'Diashow', 'label_en' => 'Slideshow'],
            ['name' => 'imageslider', 'label_de' => 'Bildslider', 'label_en' => 'Imageslider'],
            ['name' => 'linklist', 'label_de' => 'Linkliste', 'label_en' => 'Linklist'],
            ['name' => 'linkslider', 'label_de' => 'Linkslider', 'label_en' => 'Linkslider'],
            ['name' => 'logoticker', 'label_de' => 'Logoticker', 'label_en' => 'Logoticker'],
            ['name' => 'pagination', 'label_de' => 'Pagination', 'label_en' => 'Pagination'],
        ],
        /* define the width of content here, well be used in kirby panel and in css */
        'containersizes' => [
            ['name' => 'Standard', 'slug' => 'regular', 'width' => '90vw', 'max-width' => 'max(60vw, 1500px)'],
            ['name' => 'Randlos', 'slug' => 'full', 'width' => '100%', 'max-width' => '100%'],
            ['name' => 'Volle Breite', 'slug' => 'max', 'width' => '98vw', 'max-width' => '2200px'],
            ['name' => 'Schmal', 'slug' => 'small', 'width' => '90vw', 'max-width' => 'max(50vw, 1000px)'],
            ['name' => 'Breit', 'slug' => 'large', 'width' => '98vw', 'max-width' => '1700px']
        ],
        /* define the brand colors here, lowercase letters */
        'themecolors' => [
/*            [
                'name'          => 'default',

                'first-front'   => '#111111',
                'first-back'    => '#ffffff',
                'second-front'  => '#333333',
                'second-back'   => '#eeeeee',
                'third-front'   => '#333333',
                'third-back'    => '#fcefd8'

            ],*/
            [
                'name'          => 'primary',

                'first-front'   => '#333333',
                'first-back'    => '#fcefd8',
                'second-front'  => '#ffffff',
                'second-back'   => '#333333',
                'third-front'   => '#111111',
                'third-back'    => '#f3b241'

            ], [
                'name'          => 'secondary',

                'first-front'   => '#EBF4F6',
                'first-back'    => '#071952',
                'second-front'  => '#EBF4F6',
                'second-back'   => '#37B7C3',
                'third-front'   => '#071952',
                'third-back'    => '#37B7C3'

            ]
        ],
    ]
];