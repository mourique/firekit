<div class="block block-<?= $block->type() ?> <?= e($block->hide_on_mobile()->toBool(), "hide-on-mobile") ?>">

    <?php

    /** @var \Kirby\Cms\Block $block */
    $caption = $block->caption();
    $crop = $block->crop()->isTrue();
    $link = $block->link();
    $ratio = $block->ratio()->or('auto');
    $image_height_mobile = $block->image_height_mobile()->or('auto');
    $src = null;
    $sizes = "(min-width: 1125px) calc(" . round(100 / (12 / $column->span()), 0) . "vw),
              100vw";
    if ($block->location() == 'web') {
        $src = $block->src()->esc();
    } elseif ($image = $block->image()->toFile()) {
        $alt = $image->alt();
        $src = $image->url();
    }
    ?>

    <?php if ($src): ?>
        <figure<?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>
                style="--padding-top:<?= $block->padding_top() ?>;--padding-right:<?= $block->padding_right() ?>;--padding-bottom:<?= $block->padding_bottom() ?>;--padding-left:<?= $block->padding_left() ?>;">

            <?php if ($link->isNotEmpty()): ?><a href="<?= Str::esc($link->toUrl()) ?>"><?php endif; ?>

                <div class="img-wrapper" style="--image-height-mobile: <?= $image_height_mobile ?>vh">
                    <picture>
                        <source
                                data-srcset="<?= $image->srcset('webp') ?>"
                                sizes="<?= $sizes ?>"
                                type="image/webp"
                                data-lazyload
                        >
                        <img
                                style="--aspect-ratio:<?= $ratio ?>;"
                                src="<?= $image->placeholderUri() ?>"
                                data-src="<?= $image->resize(400)->url() ?>"
                                data-lazyload
                                decoding="async"
                                data-srcset="<?= $image->srcset() ?>"
                                sizes="<?= $sizes ?>"
                                data-sizes="auto"
                                width="<?= $image->resize(1800)->width() ?>"
                                height="<?= $image->resize(1800)->height() ?>"
                                alt="<?= $alt->esc() ?>"
                        >
                    </picture>

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
