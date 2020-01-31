
<div class="magazine-container--large">
<?= $data->text(); ?>
	<figure>
		<?php if ($data->imagelarge()->isNotEmpty()): ?>
			<img srcset="<?=$data->imagelarge()->toFile()->srcset([400, 700, 1000]); ?>"/> 
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