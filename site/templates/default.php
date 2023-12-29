<?= snippet('partials/header') ?>

  <main>

<?php foreach ($page->layout()->toLayouts() as $layout): ?>


  <?php $layout_id = "id" . substr(base_convert(md5($layout->id()), 16, 32), 0, 12); ?>

  <?php if ($layout->backgroundimage()->isNotEmpty()) : ?>
    <?php $backgroundimage = "has-background-image has-background-" . str_replace("_", "-", $layout->backgroundimage_position()) ?>
  <?php else : ?>
    <?php $backgroundimage = "" ?>
  <?php endif ?>

  <?php if ($layout->padding() == "top_padding, bottom_padding") : ?>
    <?php $top_padding = "" ?>
    <?php $bottom_padding = "" ?>
  <?php elseif ($layout->padding() == "top_padding") : ?>
    <?php $top_padding = "" ?>
    <?php $bottom_padding = "no-bottom-padding" ?>
  <?php elseif ($layout->padding() == "bottom_padding") : ?>
    <?php $top_padding = "no-top-padding" ?>
    <?php $bottom_padding = "" ?>
  <?php endif; ?>

    <?php if ($layout->bordertop()->toBool()) : ?>
      <?php $bordertop = "border-on-top" ?>
    <?php else : ?>
      <?php $bordertop = "" ?>
    <?php endif ?>

    <?php if ($layout->containersizes()->isNotEmpty()) : ?>
      <?php $contentwidth = "content-" . str_replace("_", "-", $layout->containersizes()) ?>
    <?php else : ?>
      <?php $contentwidth = "" ?>
    <?php endif ?>

    <?php if ($layout->verticalcenter()->toBool()) : ?>
      <?php $verticalcenter = "vertically-centered" ?>
    <?php else : ?>
      <?php $verticalcenter = "" ?>
    <?php endif ?>

    <?php if ($layout->minheight()->isNotEmpty()) : ?>
      <?php $minheight = "--section-min-height: " . $layout->minheight() ?>
    <?php else : ?>
      <?php $minheight = "--section-min-height: 1fr 1fr" ?>
    <?php endif ?>

    <?php if ($layout->columns_as_sections_on_mobile()->toBool()) : ?>
      <?php $columns_spacing = "column-spacing-like-section"; ?>
    <?php else : ?>
      <?php $columns_spacing = ""; ?>

    <?php endif; ?>

    <?php
    $themecolors = option('themecolors');
    $lowercase_layoutcolor = strtolower($layout->themecolors()->toString());
    $config_color = array_search($lowercase_layoutcolor, array_column($themecolors, 'background'));
    if ($config_color != "") :
      $color = $themecolors[$config_color];

      $foreground_color = $color['foreground'];
      else :
      $foreground_color = "";
    endif;
    ?>
    <section id="<?= $layout_id ?>"
             class="<?= $columns_spacing ?> <?= $top_padding ?> <?= $bottom_padding ?> <?= $backgroundimage ?> <?= $bordertop ?> "
             style="--background-color:<?= $layout->themecolors() ?>;--color:<?= $foreground_color ?>;<?= $minheight ?>;">

      <div class="content-wrapper <?= $contentwidth ?>">

        <?php if ($layout->collapse_on_mobile()->toBool()) : ?>
          <input type="checkbox" class="collapsible-row-toggle" id="toggle_<?= $layout_id ?>">
        <?php endif; ?>

        <div
          class="row <?= $verticalcenter ?> <?= e($layout->collapse_on_mobile()->toBool(), "collapsible collapsed") ?>">

          <?php if ($layout->collapse_on_mobile()->toBool()) : ?>
            <a class="collapsible-anchor" id="<?= $layout_id ?>"></a>
          <?php endif; ?>

          <?php foreach ($layout->columns() as $column): ?>
            <div class="col col-xs-12 col-md-<?= $column->span() ?>">
              <div class="blocks">
                <?php foreach ($column->blocks() as $block): ?>
                  <?=
                  snippet('blocks/' . $block->type(), [
                    'block' => $block,
                    'column' => $column,
                    'layout' => $layout
                  ]);
                  ?>
                <?php endforeach ?>
              </div>
            </div>
          <?php endforeach ?>
        </div>

        <?php if ($layout->collapse_on_mobile()->toBool()) : ?>
          <label class="collapsible-row-label" for="toggle_<?= $layout_id ?>" data-href="#<?= $layout_id ?>">
            <span class="open">mehr lesen</span>
            <span class="close">zuklappen</span>
          </label>
        <?php endif; ?>
      </div>

      <?php if ($layout->backgroundimage()->isNotEmpty()) : ?>
        <div class="section-background background-<?= str_replace("_", "-", $layout->backgroundimage_position()) ?>"
             style="background-position: <?= $layout->backgroundimage_vertical_position()->or('center') ?>;z-index:0;">
          <div class="section-background-image">
            <?php $backgroundimage = $layout->backgroundimage()->toFile() ?>
            <picture>
              <source
                data-srcset="<?= $backgroundimage->srcset('webp') ?>"
                type="image/webp"
                data-lazyload
              >
              <img
                src="<?= $backgroundimage->placeholderUri() ?>"
                data-src="<?= $backgroundimage->resize(400)->url() ?>"
                data-lazyload
                data-srcset="<?= $backgroundimage->srcset() ?>"
                width="<?= $backgroundimage->resize(1800)->width() ?>"
                height="<?= $backgroundimage->resize(1800)->height() ?>"
                alt="<?= $backgroundimage->alt() ?>"
              >
            </picture>
          </div>
        </div>
      <?php endif; ?>

    </section>
    <?php endforeach ?>

    </main>

    <?= snippet('partials/footer') ?>