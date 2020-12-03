<div class="magazine-container">
	<figure class="magazine__imageleft">
		<?php if ($block->imageleft()->isNotEmpty()): ?>
			<img loading="lazy" 
			    class="lazy" 
				src="<?=$block->imageleft()->toFile()->thumb([
					'width'   => 175,
					'quality' => 20,
					'blur' => true,
					])->url();  ?>"
				data-src="<?=$block->imageleft()->toFile()->srcset([350]); ?>"
				data-srcset="<?=$block->imageleft()->toFile()->srcset([350, 540]); ?>" />
		<?php endif ?>
		<?php if ($block->figcaption()->isNotEmpty()): ?>
			<figcaption class="magazine__sub-image-citation">
				<small>
					<?= $block->figcaption()->kirbytextinline() ?>
				</small>
			</figcaption>
		<?php endif ?>
	</figure>
	<div class="magazine__text">
       <?php echo $block->textcol()->kirbytext() ?>
	</div>
</div>