      						<div class="block block-<?= $block->type() ?>">

<div class="datablock-wrapper">
  <?php $items = $block->datablocks()->toStructure() ?>
  <?php foreach ($items as $item) : ?>
    <div class="datablock">
      <strong><?= $item->headline() ?></strong><br>
      <?= $item->text() ?>
    </div>
  <?php endforeach;?> 
</div>
                            </div>