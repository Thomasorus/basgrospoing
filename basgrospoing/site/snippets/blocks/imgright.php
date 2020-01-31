<div class="magazine-container">
	<figure class="magazine__imageright">
		<?php if ($data->imageright()->isNotEmpty()): ?>
			<img srcset="<?=$data->imageright()->toFile()->srcset([350, 540]); ?>"/> 
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