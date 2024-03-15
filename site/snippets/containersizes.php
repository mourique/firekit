<?php if(option('firekit.containersizes')) : ?>
<style>
  <?php $containersizes = option('firekit.containersizes'); ?>
    <?php foreach ($containersizes as $size) :?>
  .content-<?= $size['slug'] ?> .content-wrapper { max-width: <?= $size['max-width'] ?>; width: <?= $size['width'] ?>; }
    <?php endforeach; ?>
</style>
<?php endif; ?>