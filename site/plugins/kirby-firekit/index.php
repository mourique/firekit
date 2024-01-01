<?php
Kirby::plugin('felixf/firekit', [
    'layoutMethods' => [
        'section_id' => function () {
            return "id" . substr(base_convert(md5($this->id()), 16, 32), 0, 12);
        },
        'section_styles' => function () {
            $section_styles = [];
            $section_styles[] = "--background-color:" . $this->themecolors() . ";";

            $foreground_color = "";
            $themecolors = option('themecolors');
            $lowercase_layoutcolor = strtolower($this->themecolors()->toString());
            $config_color = array_search($lowercase_layoutcolor, array_column($themecolors, 'background'));
            if ($config_color != "") :
                $color = $themecolors[$config_color];
                $color_name = "color-" . $color['name'];
                $foreground_color = $color['foreground'];
            endif;
            $section_styles[] = "--color:" . $foreground_color . ";";

            $minheightvar = "--section-min-height:";
            if ($this->minheight()->isNotEmpty()) :
                $section_styles[] = $minheightvar . $this->minheight() . ";";
            else :
                $section_styles[] = $minheightvar . "1fr 1fr" . ";";
            endif;

            return $section_styles;
        },
        'section_classes' => function () {
            $section_classes = [];
            $section_classes[] = $this->colored_area();
            $section_classes[] = $this->vertical_align();

            if ($this->backgroundimage()->isNotEmpty()) :
                array_push($section_classes, "has-background-image");
                $bgimgpos = "has-background-" . str_replace("_", "-", $this->backgroundimage_position());
                array_push($section_classes, $bgimgpos);
            endif;
            if ($this->padding() == "top_padding") :
                array_push($section_classes, "no-bottom-padding");
            elseif ($this->padding() == "bottom_padding") :
                array_push($section_classes, "no-top-padding");
            endif;
            if ($this->bordertop()->toBool()) :
                array_push($section_classes, "border-on-top");
            endif;
            if ($this->containersizes()->isNotEmpty()) :
                $contentwidth = "content-" . str_replace("_", "-", $this->containersizes());
                array_push($section_classes, $contentwidth);
            endif;
            if ($this->columns_as_sections_on_mobile()->toBool()) :
                array_push($section_classes, "column-spacing-like-section");
            endif;
            if ($this->colored_columns() == "colored_cols") :
                array_push($section_classes, "blocks--boxed");
            endif;
            return $section_classes;
        }
    ],
    /*
        https://remixicon.com
        https://getkirby.com/docs/reference/plugins/extensions/icons
    */
    'icons' => [

    ],
    'blueprints' => [
        'fields/themecolors' => function ($kirby) {
            return include __DIR__ . '/blueprints/fields/themecolors.php';
        },
        'fields/containersizes' => function ($kirby) {
            return include __DIR__ . '/blueprints/fields/containersizes.php';
        },
        'blocks/text' => __DIR__ . '/blueprints/blocks/text.yml',
        'blocks/heading' => __DIR__ . '/blueprints/blocks/heading.yml',
        'blocks/image' => __DIR__ . '/blueprints/blocks/image.yml',
        'blocks/button' => __DIR__ . '/blueprints/blocks/button.yml',
        'blocks/datablock' => __DIR__ . '/blueprints/blocks/datablock.yml',
        'blocks/diashow' => __DIR__ . '/blueprints/blocks/diashow.yml',
        'blocks/linklist' => __DIR__ . '/blueprints/blocks/linklist.yml',
        'blocks/logoticker' => __DIR__ . '/blueprints/blocks/logoticker.yml',
        'blocks/imageslider' => __DIR__ . '/blueprints/blocks/imageslider.yml',
        'blocks/linkslider' => __DIR__ . '/blueprints/blocks/linkslider.yml',
        'blocks/pagination' => __DIR__ . '/blueprints/blocks/pagination.yml',
        // more blueprints
    ],
    'snippets' => [
        'blocks/text' => __DIR__ . '/snippets/blocks/text.php',
        'blocks/heading' => __DIR__ . '/snippets/blocks/heading.php',
        'blocks/image' => __DIR__ . '/snippets/blocks/image.php',
        'blocks/button' => __DIR__ . '/snippets/blocks/button.php',
        'blocks/datablock' => __DIR__ . '/snippets/blocks/datablock.php',
        'blocks/diashow' => __DIR__ . '/snippets/blocks/diashow.php',
        'blocks/linklist' => __DIR__ . '/snippets/blocks/linklist.php',
        'blocks/logoticker' => __DIR__ . '/snippets/blocks/logoticker.php',
        'blocks/imageslider' => __DIR__ . '/snippets/blocks/imageslider.php',
        'blocks/linkslider' => __DIR__ . '/snippets/blocks/linkslider.php',
        'blocks/quote' => __DIR__ . '/snippets/blocks/quote.php',
        'blocks/list' => __DIR__ . '/snippets/blocks/list.php',
        'blocks/pagination' => __DIR__ . '/snippets/blocks/pagination.php',
        // more snippets
    ],
    'translations' => [
        'en' => [
            'field.blocks.text.name' => 'Text',
            'field.blocks.heading.name' => 'Heading',
            'field.blocks.image.name' => 'Image',
            'field.blocks.button.name' => 'Button',
            'field.blocks.datablock.name' => 'Datablock',
            'field.blocks.diashow.name' => 'Diashow',
            'field.blocks.linklist.name' => 'Linklist',
            'field.blocks.logoticker.name' => 'Logoticker',
            'field.blocks.imageslider.name' => 'Imageslider',
            'field.blocks.linkslider.name' => 'Linkslider',
            'field.blocks.pagination.name' => 'Pagination',
            // more block names
        ],
        'de' => [
            'field.blocks.text.name' => 'Text',
            'field.blocks.heading.name' => 'Überschrift',
            'field.blocks.image.name' => 'Bild',
            'field.blocks.button.name' => 'Button',
            'field.blocks.datablock.name' => 'Datablock',
            'field.blocks.linklist.name' => 'Linkliste',
            'field.blocks.logoticker.name' => 'Logoticker',
            'field.blocks.imageslider.name' => 'Imageslider',
            'field.blocks.linkslider.name' => 'Linkslider',
            'field.blocks.pagination.name' => 'Seitenlinks',
            // more block names

        ],
        // more languages
    ]
]);