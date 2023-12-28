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

  <?= css('assets/css/grid.css') ?>
  <?= css('assets/css/keen-slider.css') ?>
  <?= css('assets/css/block-factory.css') ?>
  <?= css('assets/css/styles.css') ?>

  <link rel="icon" type="image/svg+xml" href="/favicon.svg">

  <!-- Preload moused-over pages with https://fasterthanlight.net/ * https://github.com/weebney/tachyon -->
  <script type="module" defer>/* tachyon 2.0.1 */
    var e = document.body.dataset;
    const o = "tachyonWhitelist" in e, n = "tachyonSameOrigin" in e, a = e.tachyonTimer || 50;
    let r = null;

    function i() {
      r = r ? null : this;
      const t = "tachyon";
      var e = document.getElementById(t);
      e ? e.remove() : setTimeout(() => {
        var e;
        r === this && ((e = document.createElement("link")).id = t, e.href = this.href, e.rel = "prerender", document.head.appendChild(e))
      }, a)
    }

    function t(t) {
      var e;
      t.dataset && (e = "tachyon" in t.dataset, "A" !== t.tagName || !t.href || e != o && !n || n && !e && t.origin !== window.location.origin || ["mouseover", "mouseout", "touchstart", "touchend"].forEach(e => t.addEventListener(e, i, {passive: !0})))
    }

    new MutationObserver(e => e.forEach(e => e.addedNodes.forEach(t))).observe(document.body, {
      childList: !0,
      subtree: !0
    }), document.querySelectorAll("a").forEach(t);</script>
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
  <div class="content-wrapper content-max">
    <nav>
      <a href="/" class="logo">
        🔥 Firekit
      </a>
    </nav>
  </div>
</header>