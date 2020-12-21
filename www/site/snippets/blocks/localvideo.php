
<div class="magazine-container--large">
	<figure>
		<?php if ($block->video()->isNotEmpty()): ?>
			<video class="magazine-container__video lazy"
				<?php 
					if($block->autoplay() == "true") { echo "autoplay playsinline loop mute";}
					else { echo "controls='true'"; }
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