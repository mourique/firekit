<?php $sizes = "(min-width: 1125px) calc(" . round(100 / (12 / $column_span), 0) . "vw), 100vw";  ?>
<picture>
  <source data-thumbhash="<?= $image->thumbhash() ?>" data-srcset="<?= $image->srcset('webp') ?>" sizes="<?= $sizes ?>" type="image/webp" >

  <?php if ($dont_be_lazy) : ?>
    <img style="object-position: <?= $image->focus() ?>; --aspect-ratio:<?= $ratio ?>;" src="<?= $image->url() ?>" data-srcset="<?= $image->srcset() ?>" sizes="<?= $sizes ?>" data-sizes="auto" alt="<?= $image->alt() ?>" >
  <?php else : ?>
    <img style="object-position: <?= $image->focus() ?>; --aspect-ratio:<?= $ratio ?>;" data-thumbhash="<?= $image->thumbhash() ?>" data-src="<?= $image->url() ?>" loading="lazy" decoding="async" data-srcset="<?= $image->srcset() ?>" sizes="<?= $sizes ?>" data-sizes="auto" alt="<?= $image->alt() ?>" >
  <?php endif;  ?>
</picture>