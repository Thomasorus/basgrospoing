<div class="magazine-container">
	<figure class="magazine__imageright">
		<?php if ($data->imageright()->isNotEmpty()): ?>
			<img 
				class="lazy" 
				src="<?=$data->imageright()->toFile()->thumb([
					'width'   => 175,
					'quality' => 20,
					'blur' => true,
					])->url();  ?>"
				data-src="<?=$data->imageright()->toFile()->srcset([350]); ?>"
				data-srcset="<?=$data->imageright()->toFile()->srcset([350, 540]); ?>" />
		<?php endif ?>
		<?php if ($data->figcaption()->isNotEmpty()): ?>
			<figcaption class="magazine__sub-image-citation">
				<small>
					<?= $data->figcaption()->kirbytextinline() ?>
				</small>
			</figcaption>
		<?php endif ?>
	</figure>
	<div class="magazine__text">
       <?php echo $data->textcol()->kirbytext() ?>
	</div>
</div>