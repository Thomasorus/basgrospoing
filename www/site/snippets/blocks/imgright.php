<div class="magazine-container">
	<figure class="magazine__imageright">
		<?php if ($block->imageright()->isNotEmpty()): ?>
			<img loading="lazy" 
				class="lazy" 
				src="<?=$block->imageright()->toFile()->thumb([
					'width'   => 175,
					'quality' => 20,
					'blur' => true,
					])->url();  ?>"
				data-src="<?=$block->imageright()->toFile()->srcset([350]); ?>"
				data-srcset="<?=$block->imageright()->toFile()->srcset([350, 540]); ?>" />
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