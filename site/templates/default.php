<?= snippet('partials/header') ?>

  <main>

    <?php foreach ($page->layout()->toLayouts() as $layout): ?>

      <?php
      $collapse_on_mobile = $layout->collapse_on_mobile()->toBool();
      $section_classes = implode(" ", $layout->section_classes());
      $section_id = $layout->section_id();
      ?>

      <section id="<?= $section_id ?>" class="<?= $section_classes ?>">

        <!--  this embeds a <style> tag with specific styles for the current layout,
              scoped by  id-->
        <?= $layout->scoped_styles() ?>

        <div class="content-wrapper">

          <?php if ($collapse_on_mobile) : ?>
            <input type="checkbox" class="collapsible-row-toggle" id="toggle_<?= $section_id ?>">
          <?php endif; ?>

          <div class="row <?= e($collapse_on_mobile, "collapsible collapsed") ?>">

            <?php if ($collapse_on_mobile) : ?>
              <a class="collapsible-anchor" id="<?= $section_id ?>"></a>
            <?php endif; ?>

            <?php foreach ($layout->columns() as $column): ?>

              <?php
              $column_classes = [];
              $settings = $column->blocks()->findBy('type', 'column_settings');
              if ($column->blocks()->hasType('column_settings')) :
                array_push($column_classes, $settings->horizontal_align()->value());
                array_push($column_classes, $settings->vertical_align()->value());
                array_push($column_classes, ($settings->col_xs()->isNotEmpty()) ? "col-xs-" . $settings->col_xs() : "col-xs-12");
                array_push($column_classes, ($settings->col_sm()->isNotEmpty()) ? "col-sm-" . $settings->col_sm() : "col-sm-" . $column->span());
                array_push($column_classes, ($settings->col_md()->isNotEmpty()) ? "col-md-" . $settings->col_md() : "col-md-" . $column->span());
                array_push($column_classes, ($settings->col_lg()->isNotEmpty()) ? "col-lg-" . $settings->col_lg() : "col-lg-" . $column->span());
              else :
                array_push($column_classes, "col-xs-12");
                array_push($column_classes, "col-sm-" . $column->span());
                array_push($column_classes, "col-md-" . $column->span());
                array_push($column_classes, "col-lg-" . $column->span());
              endif;

              $column_classes = implode(" ", $column_classes);
              ?>


              <div class="col <?= $column_classes ?>">
                <div class="blocks">

                  <?php foreach ($column->blocks() as $block): ?>
                    <?= snippet('blocks/' . $block->type(), ['block' => $block, 'column' => $column, 'layout' => $layout]); ?>
                  <?php endforeach ?>

                </div>
              </div>
            <?php endforeach ?>

          </div>

          <?php if ($collapse_on_mobile) : ?>
            <label class="collapsible-row-label" for="toggle_<?= $section_id ?>" data-href="#<?= $section_id ?>">
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