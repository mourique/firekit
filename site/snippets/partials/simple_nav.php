<?php $items = $pages->listed(); ?>
<?php if ($items->isNotEmpty()): ?>
  <div class="col col-xs-12 col-md-10 blocks-align-vcenter blocks-align-right">
  <div class="blocks">
    <div class="block-nav">
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
          <a<?php e($item->isOpen(), ' class="active"') ?>
            href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
        <?php endforeach ?>
      </nav>
    </div>
  </div>
<?php endif ?>