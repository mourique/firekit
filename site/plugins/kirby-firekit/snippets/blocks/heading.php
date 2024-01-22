<div class="block block-<?= $block->type() ?>">

<?php /** @var \Kirby\Cms\Block $block */ ?>

    <?php if ($block->subline() != "") : ?>
        <div role="doc-subtitle"><?= $block->subline(); ?></div>
    <?php endif; ?>

<<?= $level = $block->level()->or('h2') ?> class="<?= $block->size()->or('') ?><?= e($block->centered()->toBool(), "-centered") ?> <?= e($block->sticky()->toBool(), "sticky-headline") ?>">

    <?= str_replace("|", "&shy;", $block->text()); ?>
</<?= $level ?>>

</div>