<div class="block block-<?= $block->type() ?>">
    <style>
        me a {
            /* default for <button>, but needed for <a> */
            display: inline-block;
            text-align: center;
            text-decoration: none;

            /* create a small space when buttons wrap on 2 lines */
            margin: 2px 0;
        }

        /* old-school "down" effect on clic + color tweak */
        me a:active {
            transform: translateY(1px);
            filter: saturate(150%);
        }
    </style>
    <a class="button" href="<?= $block->link()->toUrl() ?>">
        <?= $block->text()->html() ?>
    </a>
</div>