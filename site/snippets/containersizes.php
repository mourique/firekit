<?php if(option('containersizes')) : ?>
<style>
  <?php $containersizes = option('containersizes'); ?>
    <?php foreach ($containersizes as $size) :?>
  .content-<?= $size['slug'] ?> .content-wrapper { max-width: <?= $size['max-width'] ?>; width: <?= $size['width'] ?>; }
    <?php endforeach; ?>
</style>
<?php endif; ?>