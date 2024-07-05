<!doctype html>
<html lang="de">
<head>
  <!-- check https://github.com/joshbuchea/HEAD for more <head>-related snippets -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

  <title><?= $site->title() ?></title>

  <!-- this should probably be replaced with a kirby-seo -->
  <meta name="author" content="Your name">
  <meta name="description" content="Brief description">
  <meta property="og:title" content="Your Page Title">
  <meta property="og:description" content="Brief description">
  <meta property="og:image" content="/some-image.png">
  <meta property="og:url" content="/this-page.html">
  <meta property="og:site_name" content="Your Site Name">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:image:alt" content="image description">


  <?= js('/assets/js/loadeer.js', ['init' => true, 'defer' => true]) ?>
  <?= js('/assets/js/keen-slider.js') ?>

  <?= snippet('containersizes'); ?>

  <?= snippet('dynamic_css'); // injects styles based on config.php    ?>

  <?php
  // loop through all available blocks defined in config and load respective css
  $available_blocks = option('felixf.firekit.blocks');
  foreach ($available_blocks as $block) :
    echo css('media/plugins/felixf/firekit/css/' . $block['name'] . '.css');
  endforeach;
  ?>

  <?= css('/assets/css/normalize.css') ?>
  <?= css('/assets/css/variables.css') ?>
  <?= css('/assets/css/grid.css') ?>
  <?= css('/assets/css/header.css') ?>
  <?= css('/assets/css/' . option('felixf.firekit.header_style') . '.css') ?>
  <?= css('/assets/css/keen-slider.css') ?>
  <?php // css('/assets/css/block-factory.css') ?>
  <?= css('/assets/css/styles.css') ?>

  <link rel="icon" type="image/svg+xml" href="/favicon.svg">

  <?= js('/assets/js/unlazy-with-hashing.js', ['init' => true, 'defer' => true]); // lazyloading images    ?>

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

