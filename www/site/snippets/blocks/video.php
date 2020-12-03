
<div class="magazine-container--large">
	<figure>
		<?php if ($block->video()->isNotEmpty()): ?>
			<video class="magazine-container__video lazy"
				<?php 
				if($block->autoplay() == "true") { echo "autoplay='true' playsinline='true'";}
				if($block->loop() == "true") { echo "loop='true'";}
				if($block->mute() == "true") { echo "mute='true'";}
				if($block->controls() == "true") { echo "controls='true'";}

				?>
				>
				<source data-src="<?=$block->video()->toFile(); ?>">
			</video>
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