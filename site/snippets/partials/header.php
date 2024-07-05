<!doctype html>
<html lang="de">
<head>
  <!-- check https://github.com/joshbuchea/HEAD for more <head>-related snippets -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <link rel="icon" type="image/svg+xml" href="/favicon.svg">

  <?php snippet('seo/head'); // kirby-plugin: tobimori/kirby-seo ?>

  <!-- TODO: keen-slider should only be loaded when block is present on page -->
  <?= js('/assets/js/keen-slider.js'); ?>

  <?= snippet('containersizes'); ?>
  <?= snippet('dynamic_css'); // injects styles based on config.php     ?>

  <?php
  // loop through all available blocks defined in config and load respective css
  $available_blocks = option('felixf.firekit.blocks');
  foreach ($available_blocks as $block) :
    echo css('media/plugins/felixf/firekit/css/' . $block['name'] . '.css');
  endforeach;
  ?>

  <?= css('/assets/css/normalize.css') ?>
  <?= css('assets/css/syntax_highlighting.css') ?>
  <?= css('/assets/css/variables.css') ?>
  <?= css('/assets/css/grid.css') ?>
  <?= css('/assets/css/' . option('felixf.firekit.header_style') . '.css') ?>
  <?= css('/assets/css/keen-slider.css') ?>
  <?= css('/assets/css/styles.css') ?>

  <?= css('/assets/css/custom.css') // this file should be used for client customisations ?>
  <?= js('/assets/js/unlazy-with-hashing.js', ['init' => true, 'defer' => true]); // lazyloading images?>
</head>

<body class="page-<?= $page->slug() ?>">

<header class="<?= $first_backgroundcolor ?>">
  <div class="content-wrapper content-regular">
    <div class="row">
      <div class="col col-xs-12 col-md-2 blocks-align-vcenter">
        <div class="blocks">
          <div class="block-logo">
            <a href="/" class="logo">🔥 Firekit</a>
          </div>
        </div>
      </div>
      <?= snippet('partials/simple_nav') ?>
    </div>
  </div>
  </div>
</header>

