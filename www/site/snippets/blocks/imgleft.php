<div class="magazine-container">
	<figure class="magazine__imageleft">
		<?php if ($data->imageleft()->isNotEmpty()): ?>
			<img loading="lazy" 
			    class="lazy" 
				src="<?=$data->imageleft()->toFile()->thumb([
					'width'   => 175,
					'quality' => 20,
					'blur' => true,
					])->url();  ?>"
				data-src="<?=$data->imageleft()->toFile()->srcset([350]); ?>"
				data-srcset="<?=$data->imageleft()->toFile()->srcset([350, 540]); ?>" />
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