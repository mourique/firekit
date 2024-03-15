<?= snippet('partials/header') ?>

  <main>
    <?php foreach ($page->layout()->toLayouts() as $layout): ?>

      <?php $collapse_on_mobile = $layout->collapse_on_mobile()->toBool(); ?>
      <?php $show_floating_box = $layout->add_floating_box()->toBool(); ?>

      <section id="<?= $layout->section_id() ?>" class="<?= implode(" ", $layout->section_classes()) ?>">

        <?= $layout->scoped_styles()?>

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
                    <?= snippet('blocks/' . $block->type(), ['block' => $block, 'column' => $column, 'layout' => $layout]); ?>
                  <?php endforeach ?>

                </div>
              </div>
            <?php endforeach ?>

          </div>

          <?php if ($collapse_on_mobile) : ?>
            <label class="collapsible-row-label" for="toggle_<?= $layout->section_id() ?>"
                   data-href="#<?= $layout->section_id() ?>">
              <span class="open">mehr lesen</span>
              <span class="close">zuklappen</span>
            </label>
          <?php endif; ?>

          <?php if ($show_floating_box) : ?>
            <div class="floating_box"
                 style="<?= implode(" ", $layout->element_styles('float')) ?> --margin-top:<?= $layout->floating_box_top() ?>;
                   --margin-right:<?= $layout->floating_box_right() ?>;
                   --margin-bottom:<?= $layout->floating_box_bottom() ?>;
                   --margin-left:<?= $layout->floating_box_left() ?>;">
              <?php foreach ($layout->Floating_box_content()->toBlocks() as $block): ?>
                <?= snippet('blocks/' . $block->type(), ['block' => $block, 'layout' => $layout]); ?>
              <?php endforeach ?>
            </div>
          <?php endif; ?>

        </div>

        <?= snippet('section_backgroundimage', ['layout' => $layout]) ?>

      </section>

    <?php endforeach ?>

  </main>

<?= snippet('partials/footer') ?>