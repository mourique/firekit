<?php if($block->summary()->isNotEmpty()): ?>
    <div class="accordion">
    	<div class="accordion__intro">
    		<span><?= $block->summary() ?></span>
    	</div>
    	<div class="accordion__content">
    		<?= $block->details() ?>
    	</div>
    </div>
<?php endif; ?>
