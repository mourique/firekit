<div class="block block-<?= $block->type() ?> <?= e($block->hide_on_mobile()->toBool(), "hide-on-mobile") ?>">

    <?php

    /** @var \Kirby\Cms\Block $block */
    $caption = $block->caption();
    $crop = $block->crop()->isTrue();
    $link = $block->link();
    $ratio = $block->ratio()->or('auto');
    $image_height_mobile = $block->image_height_mobile()->or('auto');
    $image_max_height = $block->max_height()->or('auto');
    $image_max_width = $block->max_width()->or('auto');
    $src = null;
/*    $sizes = "(min-width: 1125px) calc(" . round(100 / (12 / $column->span()), 0) . "vw),
              100vw";*/
    if ($block->location() == 'web') {
        $src = $block->src()->esc();
    } elseif ($image = $block->image()->toFile()) {
        $alt = $image->alt();
        $src = $image->url();
    }
    ?>

    <?php if ($src): ?>
        <figure<?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>
                style="--padding-top:<?= $block->padding_top() ?>;--padding-right:<?= $block->padding_right() ?>;--padding-bottom:<?= $block->padding_bottom() ?>;--padding-left:<?= $block->padding_left() ?>;max-width:<?= $image_max_width ?>;">

            <?php if ($link->isNotEmpty()): ?><a href="<?= Str::esc($link->toUrl()) ?>"><?php endif; ?>

                <div class="img-wrapper" style="--image-height-mobile: <?= $image_height_mobile ?>vh">
                    <?= snippet('partials/modern_image_tag', [
                            "image" => $image,
                            "column_span" => $column->span(),
                            "ratio" => $ratio,
                            "dont_be_lazy" => "false" ]); ?>
                </div>

                <?php if ($caption->isNotEmpty()): ?>
                    <figcaption class="<?= $block->caption_size()->or('') ?>">
                        <?= str_replace("|", "&shy;", $caption) ?>
                    </figcaption>
                <?php endif; ?>

                <?php if ($link->isNotEmpty()): ?></a><?php endif ?>

        </figure>
    <?php endif ?>

</div>
