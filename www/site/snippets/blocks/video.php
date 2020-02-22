
<div class="magazine-container--large">
	<figure>
		<?php if ($data->video()->isNotEmpty()): ?>
			<video class="magazine-container__video lazy"
				<?php 
				if($data->autoplay() == "true") { echo "autoplay='true' playsinline='true'";}
				if($data->loop() == "true") { echo "loop='true'";}
				if($data->mute() == "true") { echo "mute='true'";}
				if($data->controls() == "true") { echo "controls='true'";}

				?>
				>
				<source data-src="<?=$data->video()->toFile(); ?>">
			</video>
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