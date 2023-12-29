<?php if(option('containersizes')) : ?>
<style>
  <?php $containersizes = option('containersizes'); ?>
    <?php foreach ($containersizes as $size) :?>
  .content-wrapper.content-<?= $size['slug'] ?> { max-width: <?= $size['max-width'] ?>; width: <?= $size['width'] ?>; }
    <?php endforeach; ?>
</style>
<?php endif; ?>