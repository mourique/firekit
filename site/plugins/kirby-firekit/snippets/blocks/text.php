<div class="block block-<?= $block->type() ?>">
    <?php /** @var \Kirby\Cms\Block $block */ ?>
    <div class="<?= $block->size() ?><?= e($block->centered()->toBool(), " -centered") ?>">
        <?= $block->text()->toHtml(); ?>
    </div>
</div>