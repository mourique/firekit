<div class="block block-<?= $block->type() ?>">

<?php /** @var \Kirby\Cms\Block $block */ ?>
<<?= $level = $block->level()->or('h2') ?> class="<?= $block->size()->or('') ?> <?= e($block->centered()->toBool(), "-centered") ?> <?= e($block->no_cap()->toBool(), "-no-cap") ?> <?= e($block->sticky()->toBool(), "sticky-headline") ?>">
    <?= str_replace("|", "&shy;", $block->text()); ?>

</<?= $level ?>>

</div>