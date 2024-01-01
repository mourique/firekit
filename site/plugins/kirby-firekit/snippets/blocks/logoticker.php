<div class="block block-<?= $block->type() ?>">

    <div class="marquee">
        <div class="marquee__group">
            <?php $images = $block->images()->toFiles(); ?>
            <?php foreach ($images as $image): ?>
                <figure>
                    <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
                </figure>
            <?php endforeach; ?>
        </div>

        <div aria-hidden="true" class="marquee__group">
            <?php foreach ($images as $image): ?>
                <figure>
                    <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
                </figure>
            <?php endforeach; ?>
        </div>
    </div>

</div>