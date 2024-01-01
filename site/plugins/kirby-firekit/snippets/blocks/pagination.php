<div class="row pagination">
    <div class="col col-xs-6 col-md-6">
        <div class="prev-link--container pagination-link--container">
          <?php if ($page->hasPrevListed()): ?>
            <a href="<?= $page->prevListed()->url() ?>" class="prev-link pagination-link">
                <div class="prev-link--title pagination--title hide-on-mobile"><?= $page->prevListed()->title() ?></div>
                <div class="prev-link--circle pagination--circle">
                    <div class="prev-link--arrow pagination--arrow"></div>
                </div>
            </a>
            <?php endif ?>
        </div>
    </div>
    <div class="col col-xs-6 col-md-6">
        <div class="next-link---container pagination-link--container">
            <?php if ($page->hasNextListed()): ?>
            <a href="<?= $page->nextListed()->url() ?>" class="next-link pagination-link">
                <div class="next-link--circle pagination--circle">
                    <div class="next-link--arrow pagination--arrow"></div>
                </div>
                <div class="next-link--title pagination--title hide-on-mobile"><?= $page->nextListed()->title() ?></div>
            </a>
            <?php endif ?>
        </div>
    </div>
</div>