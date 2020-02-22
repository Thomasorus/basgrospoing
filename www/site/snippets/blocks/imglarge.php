
<div class="magazine-container--large">
<?= $data->text(); ?>
	<figure>
	
		<?php if ($data->imagelarge()->isNotEmpty()): ?>
	
			<img 
				class="lazy" 
				src="<?=$data->imagelarge()->toFile()->thumb([
				'width'   => 100,
				'quality' => 20,
				'crop' => true,
				'blur' => true,
				])->url();  ?>"
				data-src="<?=$data->imagelarge()->toFile()->srcset([400]); ?>" 
				data-srcset="<?=$data->imagelarge()->toFile()->srcset([400, 600, 800]); ?>"/> 
		<?php endif ?>
		<?php if ($data->figcaption()->isNotEmpty()): ?>
			<figcaption class="magazine__sub-image-citation">
				<small>
					<?= $data->figcaption() ?>
				</small>
			</figcaption>
		<?php endif ?>
	</figure>
</div>