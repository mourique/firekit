<?= snippet('partials/header') ?>

  <main>

    <?php foreach ($page->layout()->toLayouts() as $layout): ?>

      <?php $collapse_on_mobile = $layout->collapse_on_mobile()->toBool(); ?>

      <section id="<?= $layout->section_id() ?>"  class="<?= implode(" ", $layout->section_classes()) ?>"  style="<?= implode(" ", $layout->section_styles()) ?>">

        <div class="content-wrapper">

          <?php if ($collapse_on_mobile) : ?>
            <input type="checkbox" class="collapsible-row-toggle" id="toggle_<?= $layout->section_id() ?>">
          <?php endif; ?>

          <div class="row <?= e($collapse_on_mobile, "collapsible collapsed") ?>">

            <?php if ($collapse_on_mobile) : ?>
              <a class="collapsible-anchor" id="<?= $layout->section_id() ?>"></a>
            <?php endif; ?>

            <?php foreach ($layout->columns() as $column): ?>
              <div class="col col-xs-12 col-md-<?= $column->span() ?>">
                <div class="blocks">

                  <?php foreach ($column->blocks() as $block): ?>
                    <?= snippet('blocks/' . $block->type(), [ 'block' => $block, 'column' => $column, 'layout' => $layout ]); ?>
                  <?php endforeach ?>

                </div>
              </div>
            <?php endforeach ?>

          </div>

          <?php if ($collapse_on_mobile) : ?>
            <label class="collapsible-row-label"  for="toggle_<?= $layout->section_id() ?>"  data-href="#<?= $layout->section_id() ?>">
              <span class="open">mehr lesen</span>
              <span class="close">zuklappen</span>
            </label>
          <?php endif; ?>
        </div>

      <?= snippet('section_backgroundimage', ['layout' => $layout]) ?>

      </section>

    <?php endforeach ?>

  </main>

<?= snippet('partials/footer') ?>