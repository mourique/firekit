<?php
Kirby::plugin('felixf/firekit', [
    'root' => '/home/felixfde/public_html/firekit.felixf.de',
    'options' => [
        'blocks' => [
            ['name' => 'accordion', 'label_de' => 'Accordion', 'label_en' => 'Accordion'],
            ['name' => 'button', 'label_de' => 'Button', 'label_en' => 'Button'],
            ['name' => 'datablock', 'label_de' => 'Datenblock', 'label_en' => 'Datablock'],
            ['name' => 'diashow', 'label_de' => 'Diashow', 'label_en' => 'Slideshow'],
            ['name' => 'heading', 'subheadline' => true, 'label_de' => 'Überschrift', 'label_en' => 'Heading'],
            ['name' => 'image', 'label_de' => 'Bild', 'label_en' => 'Image'],
            ['name' => 'imageslider', 'label_de' => 'Bildslider', 'label_en' => 'Imageslider'],
            ['name' => 'linklist', 'label_de' => 'Linkliste', 'label_en' => 'Linklist'],
            ['name' => 'linkslider', 'label_de' => 'Linkslider', 'label_en' => 'Linkslider'],
            ['name' => 'list', 'label_de' => 'Liste', 'label_en' => 'list'],
            ['name' => 'logoticker', 'label_de' => 'Logoticker', 'label_en' => 'Logoticker'],
            ['name' => 'pagination', 'label_de' => 'Pagination', 'label_en' => 'Pagination'],
            ['name' => 'quote', 'label_de' => 'Zitat', 'label_en' => 'Quote'],
            ['name' => 'text', 'label_de' => 'Text', 'label_en' => 'Text'],
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
    ],
    'layoutMethods' => [
        'section_id' => function () {
            return "id" . substr(base_convert(md5($this->id()), 16, 32), 0, 12);
        },
        'scoped_styles' => function () { // is embeded into the <section>

            $element_styles = [];

            $minheightvar = "--section-min-height:";
            if ($this->minheight()->isNotEmpty()) :
                $element_styles[] = $minheightvar . $this->minheight() . ";";
            else :
                $element_styles[] = $minheightvar . "1fr 1fr" . ";";
            endif;

            $themecolors = option('felixf.firekit.themecolors');

            $lowercase_layoutcolor = strtolower($this->themecolors()->toString());

            $config_color = array_search($lowercase_layoutcolor, array_column($themecolors, 'first-back'));

            if ($config_color != "") {
                $color = $themecolors[$config_color];
            }

            $element_styles[] = "--first-front:" . $color['first-front'] . ";";
            $element_styles[] = "--first-back:" . $color['first-back'] . ";";
            $element_styles[] = "--second-front:" . $color['second-front'] . ";";
            $element_styles[] = "--second-back:" . $color['second-back'] . ";";
            $element_styles[] = "--third-front:" . $color['third-front'] . ";";
            $element_styles[] = "--third-back:" . $color['third-back'] . ";";

            $styleblock = "<style>section#" . $this->section_id() . "{" . implode("", $element_styles) . "}</style>";

            return $styleblock;

        },
        'section_classes' => function () {
            $section_classes = [];

            $themecolors = option('felixf.firekit.themecolors');
            $lowercase_layoutcolor = strtolower($this->themecolors()->toString());
            $config_color = array_search($lowercase_layoutcolor, array_column($themecolors, 'first-back'));
            if ($config_color != "") :
                $color = $themecolors[$config_color];
                $color_name = "color-" . $color['name'];
                $foreground_color = $color['first-front'];
                array_push($section_classes, $color_name);
            endif;

            array_push($section_classes, $this->colored_area());
            array_push($section_classes, $this->colored_secondary());

            array_push($section_classes, $this->vertical_align());

            if ($this->backgroundimage()->isNotEmpty()) :
                array_push($section_classes, "has-background-image");
                $bgimgpos = "has-background-" . str_replace("_", "-", $this->backgroundimage_position());
                array_push($section_classes, $bgimgpos);
            endif;

            if ($this->padding() == "top_padding") :
                array_push($section_classes, "no-bottom-padding");
            elseif ($this->padding() == "bottom_padding") :
                array_push($section_classes, "no-top-padding");
            elseif ($this->padding() == "") :
                array_push($section_classes, "no-top-padding");
                array_push($section_classes, "no-bottom-padding");
            endif;

            if ($this->bordertop()->toBool()) :
                array_push($section_classes, "border-on-top");
            endif;

            if ($this->containersizes()->isNotEmpty()) :
                $contentwidth = "content-" . str_replace("_", "-", $this->containersizes());
                array_push($section_classes, $contentwidth);
            endif;

            if ($this->verticalcenter()->toBool()) :
                array_push($section_classes, "vertically-centered");
            endif;

            if ($this->columns_as_sections_on_mobile()->toBool()) :
                array_push($section_classes, "column-spacing-like-section");
            endif;

            return $section_classes;
        }
    ],
    'icons' => [
        /*
            https://remixicon.com
            https://getkirby.com/docs/reference/plugins/extensions/icons
        */
    ],
    'blueprints' => [
        'fields/themecolors' => function ($kirby) {
            return include __DIR__ . '/blueprints/fields/themecolors.php';
        },
        'fields/containersizes' => function ($kirby) {
            return include __DIR__ . '/blueprints/fields/containersizes.php';
        },
    ],
    'snippets' => [
        'block_factory_css' => __DIR__ . '/snippets/block_factory_css.php',
    ],
    'translations' => [
        'en' => [

        ],
        'de' => [

        ],
        // more languages
    ],
    'hooks' => [
        'system.loadPlugins:after' => function () {
            // access any Kirby object using kirby(), site() or page()
            $available_blocks = kirby()->option('felixf.firekit.blocks');

            foreach ($available_blocks as $block) :
                kirby()->extend([
                    'blueprints' => ['blocks/' . $block['name'] => __DIR__ . '/blueprints/blocks/' . $block['name'] . '.yml'],
                    'snippets' => ['blocks/' . $block['name'] => __DIR__ . '/snippets/blocks/' . $block['name'] . '.php'],
                    'translations' => [
                        'en' => ['field.blocks.' . $block['name'] . '.name' => $block['label_en']],
                        'de' => ['field.blocks.' . $block['name'] . '.name' => $block['label_de']],
                    ]], kirby()->plugin('felixf/firekit'));
            endforeach;

        }
    ]
]);

