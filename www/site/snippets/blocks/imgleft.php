<div class="magazine-container">
	<figure class="magazine__imageleft">
		<?php if ($data->imageleft()->isNotEmpty()): ?>
			<img srcset="<?=$data->imageleft()->toFile()->srcset([350, 540]); ?>"/> 
		<?php endif ?>
		<?php if ($data->figcaption()->isNotEmpty()): ?>
			<figcaption class="magazine__sub-image-citation">
				<small>
					<?= $data->figcaption() ?>
				</small>
			</figcaption>
		<?php endif ?>
	</figure>
	<div class="magazine__text">
       <p> <?php echo $data->textcol()->kirbytext() ?></p>
	</div>
</div>