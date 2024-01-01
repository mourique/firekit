      						<div class="block block-<?= $block->type() ?>">

<?php /** @var \Kirby\Cms\Block $block */ ?>
<blockquote>
    <?= $site->resolveUUIDS($block->text()->toHtml()); ?>
  <?php if ($block->citation()->isNotEmpty()): ?>
  <footer>
    <?= $block->citation() ?>
  </footer>
  <?php endif ?>
</blockquote>

                            </div>