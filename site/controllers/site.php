<?php

return function ($kirby, $page) {

    $first_backgroundcolor = "transparent";

    $layouts = $page->layout()->toLayouts();

    if ($layouts->isNotEmpty()) :
        $themecolors = $kirby->option('felixf.firekit.themecolors');
        $lowercase_layoutcolor = strtolower($layouts->first()->themecolors()->toString());
        $config_color = array_search($lowercase_layoutcolor, array_column($themecolors, 'first-back'));

        $layouts->first()->element_styles('section');

        if ($layouts->first()->is_colored()->isTrue() && $config_color!= "") :
            $color = $themecolors[$config_color];

            $first_backgroundcolor = $layouts->first()->colored_area() . "-" . $color['name'];
        endif;

    endif;

    return [
        'first_backgroundcolor' => $first_backgroundcolor,
    ];
};