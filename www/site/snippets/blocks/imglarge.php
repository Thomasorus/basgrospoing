
<div class="magazine-container--large">
	<figure>
	
		<?php if ($data->imagelarge()->isNotEmpty()): ?>
	
			<img loading="lazy" 
				class="lazy" 
				src="<?=$data->imagelarge()->toFile()->thumb([
				'width'   => 200,
				'quality' => 20,
				'blur' => true,
				])->url();  ?>"
				data-src="<?=$data->imagelarge()->toFile()->srcset([400]); ?>" 
				data-srcset="<?=$data->imagelarge()->toFile()->srcset([400, 600, 800]); ?>"/> 
		<?php endif ?>
		<?php if ($data->figcaption()->isNotEmpty()): ?>
			<figcaption class="magazine__sub-image-citation">
				<small>
					<?= $data->figcaption()->kirbytextinline() ?>
				</small>
			</figcaption>
		<?php endif ?>
	</figure>
</div>