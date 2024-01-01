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

  <?= js('assets/js/loadeer.js', ['init' => true, 'defer' => true]) ?>
  <?= js('assets/js/keen-slider.js') ?>


  <?= snippet('containersizes'); ?>

  <?= css('assets/css/variables.css') ?>
  <?= css('assets/css/grid.css') ?>
  <?= css('assets/css/keen-slider.css') ?>
  <?= css('assets/css/block-factory.css') ?>
  <?= css('assets/css/styles.css') ?>

  <link rel="icon" type="image/svg+xml" href="/favicon.svg">

  <!-- Preload moused-over pages with https://fasterthanlight.net/ * https://github.com/weebney/tachyon -->
  <?= js('assets/js/tachyon.js', ['type' => 'module', 'defer' => true]) ?>
</head>

<body class="page-<?= $page->slug() ?>">
<?php
$layouts = $page->layout()->toLayouts();
$first_backgroundcolor = 'transparent';
if ($layouts->isNotEmpty()) :
  if ($layouts->first()->backgroundcolor()->isNotEmpty()) :
    $first_backgroundcolor = $page->layout()->toLayouts()->first()->backgroundcolor();
  endif;
endif;
?>

<header
  class="<?= $first_backgroundcolor ?>">
  <div class="content-wrapper content-regular">
    <nav>
      <a href="/" class="logo">
        🔥 Firekit
      </a>
    </nav>
  </div>
</header>
