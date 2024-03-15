<?php

$block_id       = "id" . substr(base_convert(md5($block->id()), 16, 32), 0, 12);
$ratio          = $block->aspect_ratio();
$mobile_ratio   = $block->mobile_aspect_ratio();

$block_classes = [];
$block_classes[] = "block-".$block->type();

if ($block->only_on_hover()->toBool()) :
    $block_classes[] = "diashow-only-on-hover";
else :
    $block_classes[] = "diashow-automatic";
endif;

?>

<style>
#<?= $block_id ?>, #<?= $block_id ?> img{ aspect-ratio: <?= $ratio ?>; }
@media screen and (max-width: 768px) { #<?= $block_id ?>, #<?= $block_id ?> img{ aspect-ratio: <?= $mobile_ratio ?>; } }
</style>

<div id="<?= $block_id ?>" class="block <?= implode(' ', $block_classes); ?>" >
    <?php $images = $block->images()->toFiles(); ?>

    <?php foreach ($images as $image): ?>
        <?php $is_first_image =  $images->indexOf($image) === 0; ?>
        <div class="slide<?= $images->indexOf($image) === 0 ? ' showing' : '' ?>">
            <?= snippet('partials/modern_image_tag', [ "image" => $image,  "column_span" => $column->span(),  "ratio" => $ratio,  "dont_be_lazy" => $is_first_image ]); ?>
        </div>
        <?php endforeach; ?>
    </div>
    <script type="text/javascript">
        var <?= $block_id ?>_diashow = document.querySelectorAll('#<?= $block_id ?>');

        var <?= $block_id ?>_slides = document.querySelectorAll('#<?= $block_id ?> .slide');
        var <?= $block_id ?>_currentSlide = 0;

        <?php if ($block->only_on_hover()->toBool() == false) : ?>
            var <?= $block_id ?>_slideInterval = setInterval(<?= $block_id ?>_nextSlide, <?= $block->duration()->or('3500') ?>);
        <?php endif; ?>

        function <?= $block_id ?>_nextSlide() {
            <?= $block_id ?>_slides[<?= $block_id ?>_currentSlide].className = 'slide';
            <?= $block_id ?>_currentSlide = (<?= $block_id ?>_currentSlide + 1) % <?= $block_id ?>_slides.length;
            <?= $block_id ?>_slides[<?= $block_id ?>_currentSlide].className = 'slide showing';
        }

        <?php if ($block->only_on_hover()->toBool()) : ?>

        var timer;
        var autoPlay = false;

        var pauseOnHover = document.getElementById('<?= $block_id ?>');


        var totalDistance = 0;
        var oldCursorX, oldCursorY;

        pauseOnHover.onmousemove = (e) => {
            autoplay = true;
            if (!autoPlay) {
                autoplay = true;
                var cursorThreshold = 100;

                if (oldCursorX) totalDistance += Math.sqrt(Math.pow(oldCursorY - e.clientY, 2) + Math.pow(oldCursorX - e.clientX, 2));
                if (totalDistance >= cursorThreshold) {
                    console.log("Mouse moved 100px!");
                    <?= $block_id ?>_nextSlide();

                    totalDistance = 0;
                }

                oldCursorX = e.clientX;
                oldCursorY = e.clientY;

            }
        }

        <?php endif; ?>

    </script>
</div>