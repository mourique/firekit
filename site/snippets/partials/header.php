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

  <?= snippet('dynamic_css'); // injects styles based on config.php  ?>

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

  <?= js('/assets/js/unlazy-with-hashing.js', ['init' => true, 'defer' => true]); // lazyloading images  ?>

</head>

<body class="page-<?= $page->slug() ?>">
<?php
$first_backgroundcolor = "transparent";
$layouts = $page->layout()->toLayouts();
if ($layouts->isNotEmpty()) :
  $themecolors = option('felixf.firekit.themecolors');
  $lowercase_layoutcolor = strtolower($layouts->first()->themecolors()->toString());
  $config_color = array_search($lowercase_layoutcolor, array_column($themecolors, 'first-back'));
  /*$layouts->first()->colored_area();
  */
  $layouts->first()->element_styles('section');

  if ($config_color != "") :
    $color = $themecolors[$config_color];
    $first_backgroundcolor = $layouts->first()->colored_area() . "-" . $color['name'];
  endif;
endif;
?>

<header
  class="<?= $first_backgroundcolor ?>">
  <div class="content-wrapper content-regular">
    <a href="/" class="logo">🔥 Firekit</a>
    <?php $items = $pages->listed(); ?>
    <?php if ($items->isNotEmpty()): ?>
      <label id="menu-button" for="main-menu">

      <span class="menu-text"> Menü</span>
        <div class="hamburger hamburger--squeeze">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
      </label>
      <input type="checkbox" id="main-menu" class="visually-hidden">

      <nav>
        <?php foreach ($items as $item): ?>
          <a<?php e($item->isOpen(), ' class="active"') ?> href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
        <?php endforeach ?>
      </nav>
    <?php endif ?>
  </div>
</header>

