<div class="block block-<?= $block->type() ?> <?= e($block->only_on_hover()->toBool(), 'diashow-only-on-hover', 'diashow-automatic') ?>">

    <?php $block_id = "id" . substr(base_convert(md5($block->id()), 16, 32), 0, 12); ?>
    <?php $ratio = $block->aspect_ratio()->or('auto'); ?>
    <?php $sizes = "(min-width: 1125px) calc(" . round(100 / (12 / $column->span()), 0) . "vw), 100vw"; ?>
    <div id="<?= $block_id ?>" class="fadein"
         style="--aspect-ratio: <?= $ratio ?>;--image_height_mobile:<?= $block->image_height_mobile() ?>svh">
        <?php $images = $block->images()->toFiles(); ?>
        <?php foreach ($images as $image): ?>
            <picture class="slide<?= $images->indexOf($image) === 0 ? ' showing' : '' ?>">
                <source
                        data-srcset="<?= $image->srcset('webp') ?>"
                        sizes="<?= $sizes ?>"
                        type="image/webp"
                        data-lazyload

                >
                <img
                        style="aspect-ratio: <?= $ratio ?>;"
                        src="<?= $image->placeholderUri() ?>"
                        data-src="<?= $image->url() ?>"
                        data-srcset="<?= $image->srcset() ?>"
                        sizes="<?= $sizes ?>"
                        width="<?= $image->resize(1800)->width() ?>"
                        height="<?= $image->resize(1800)->height() ?>"
                        data-lazyload
                        lazyload=""
                        alt="<?= $image->alt() ?>"
                >
            </picture>

        <?php endforeach; ?>
    </div>

    <script type="text/javascript">
        var <?= $block_id ?>_diashow = document.querySelectorAll('#<?= $block_id ?>');

        var <?= $block_id ?>_slides = document.querySelectorAll('#<?= $block_id ?> .slide');
        var <?= $block_id ?>_currentSlide = 0;

        <?php if ($block->only_on_hover()->toBool() == false) : ?>

        var <?= $block_id ?>_slideInterval = setInterval(<?= $block_id ?>_nextSlide, 3500);

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

        /*pauseOnHover.onmouseenter = () => {
          autoplay = true;
          if (!autoPlay) {
            autoplay = true;
                  timer = setInterval(function()  {
<?= $block_id ?>_nextSlide();
    }, 1000);
  }
}*/


        var totalDistance = 0;
        var oldCursorX, oldCursorY;

        pauseOnHover.onmousemove = (e) => {
            autoplay = true;
            if (!autoPlay) {
                autoplay = true;
                /*    timer = setInterval(function exampleFunction() {
                      return exampleFunction;
                    }(), 1000);*/
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
        /*
        pauseOnHover.onmouseleave = () => {

          autoplay = false;
          timer && clearInterval(timer)

        }
        */

        <?php endif; ?>

    </script>
</div>