
<div class="magazine-container--large">
<?= $data->text(); ?>
	<figure>
		<?php if ($data->imagelarge()->isNotEmpty()): ?>
			<img srcset="<?=$data->imagelarge()->toFile()->srcset([400, 600, 800]); ?>"/> 
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