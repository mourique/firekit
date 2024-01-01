<div class="block block-<?= $block->type() ?>">

    <?php $block_id = "id" . substr(base_convert(md5($block->id()), 16, 32), 0, 12); ?>

    <div id="<?= $block_id ?>">
        <?php $items = $block->list()->toStructure(); ?>
        <?php foreach ($items as $item): ?>

            <a href="<?= $item->link()->toUrl() ?>" class="linklist-item">
                <?php
                $image = $item->image()->toFile()
                ?>

                <picture>
                    <source
                            srcset="<?= $image->srcset(
                                [
                                    '400w' => ['width' => 400, 'format' => 'webp'],
                                    '800w' => ['width' => 800, 'format' => 'webp'],
                                    '1200w' => ['width' => 1200, 'format' => 'webp']
                                ]
                            ) ?>"
                            type="image/webp"
                    >
                    <img
                            class="rellax"
                            src="<?= $image->placeholderUri() ?>"
                            data-src="<?= $image->resize(400)->url() ?>"
                            data-lazyload
                            srcset="<?= $image->srcset(
                                [
                                    '400w' => ['width' => 400],
                                    '800w' => ['width' => 800],
                                    '1200w' => ['width' => 1200]
                                ]
                            ) ?>"
                            width="<?= $image->resize(1200)->width() ?>"
                            height="<?= $image->resize(1200)->height() ?>"
                            alt="<?= $item->title() ?>"
                    >
                </picture>
                <span><?= $item->title()->html() ?></span>
            </a>

        <?php endforeach ?>
    </div>

    <script type="text/javascript">
        var tooltips = document.querySelectorAll('.linklist-item img');

        // Get the parent div element
        const <?= $block_id ?> = document.querySelector('#<?= $block_id ?>');

        // Add a mousemove event listener to the parent div
        <?= $block_id ?>.addEventListener('mousemove', (event) => {
            // Get the bounding rectangle of the parent div
            const rect = <?= $block_id ?>.getBoundingClientRect();

            // Get the x and y coordinates of the mouse pointer relative to the viewport
            const x = event.clientX;
            const y = event.clientY;

            // Get the x and y coordinates of the mouse pointer relative to the parent div
            const relativeX = x - rect.left - 100;
            const relativeY = y - rect.top + 20;
            for (var i = 0; i < tooltips.length; i++) {
                tooltips[i].style.left = relativeX + 'px';
                tooltips[i].style.top = relativeY + 'px';
            }
        });
    </script>

</div>