
<div class="magazine-container--large">
	<figure>
	
		<?php if ($block->imagelarge()->isNotEmpty()): ?>
	
			<img loading="lazy" 
				class="lazy" 
				src="<?=$block->imagelarge()->toFile()->thumb([
				'width'   => 200,
				'quality' => 20,
				'blur' => true,
				])->url();  ?>"
				data-src="<?=$block->imagelarge()->toFile()->srcset([400]); ?>" 
				data-srcset="<?=$block->imagelarge()->toFile()->srcset([400, 600, 800]); ?>"/> 
		<?php endif ?>
		<?php if ($block->figcaption()->isNotEmpty()): ?>
			<figcaption class="magazine__sub-image-citation">
				<small>
					<?= $block->figcaption()->kirbytextinline() ?>
				</small>
			</figcaption>
		<?php endif ?>
	</figure>
</div>