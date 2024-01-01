<?php if ($layout->backgroundimage()->isNotEmpty()) : ?>
  <div class="section-background background-<?= str_replace("_", "-", $layout->backgroundimage_position()) ?>"
       style="background-position: <?= $layout->backgroundimage_vertical_position()->or('center') ?>;z-index:0;">
    <div class="section-background-image">
      <?php $backgroundimage = $layout->backgroundimage()->toFile() ?>
      <picture>
        <source
          data-srcset="<?= $backgroundimage->srcset('webp') ?>"
          type="image/webp"
          data-lazyload
        >
        <img
          src="<?= $backgroundimage->placeholderUri() ?>"
          data-src="<?= $backgroundimage->resize(400)->url() ?>"
          data-lazyload
          data-srcset="<?= $backgroundimage->srcset() ?>"
          width="<?= $backgroundimage->resize(1800)->width() ?>"
          height="<?= $backgroundimage->resize(1800)->height() ?>"
          alt="<?= $backgroundimage->alt() ?>"
        >
      </picture>
    </div>
  </div>
<?php endif; ?>