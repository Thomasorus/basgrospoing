<div class="magazine-container--large">
	<div class="magazine__tweet">
		<?php echo $block->text()->kirbytextinline() ?>
		<div class="magazine__tweet-meta">
			— <?php echo $block->author() ?> (@<?php echo $block->authorId() ?>) <a href="	<?php echo $block->link() ?>">
			<?php echo $block->date("d/m/Y") ?>
			</a>
	</div>
	<?php if($block->context()): ?>
		<small class="magazine__tweet-context">
			<?php echo $block->context() ?>
		</small>
	<?php endif ?>
</div>
	<span class="magazine__tweet-icon">
	<svg id="da17e64a-e0ea-4cb3-8e48-f1506e7af337" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19.3 15.76"><defs><style>.\36 d21c68d-0792-4fd6-83e6-6b8c86d6803b{fill:#1da1f2}</style></defs><title>tw</title><path class="6d21c68d-0792-4fd6-83e6-6b8c86d6803b" d="M634.53 3382.23a8.09 8.09 0 0 0 5.84-1.67 4.06 4.06 0 0 1-3.73-2.76 3.92 3.92 0 0 0 1.78-.08 4 4 0 0 1-2.27-1.4 4 4 0 0 1-.89-2.54 3.84 3.84 0 0 0 1.78.47 4 4 0 0 1-1.64-2.41 3.93 3.93 0 0 1 .42-2.88 11.41 11.41 0 0 0 8.22 4.16c0-.16 0-.29-.06-.43a3.9 3.9 0 0 1 1-3.19 3.74 3.74 0 0 1 2.1-1.2 3.89 3.89 0 0 1 3.6 1.05.28.28 0 0 0 .3.09 8.19 8.19 0 0 0 2.27-.88 3.5 3.5 0 0 1-.65 1.23 4.11 4.11 0 0 1-1 .92l.56-.09.55-.13.55-.17.55-.21-.06.1a8 8 0 0 1-1.79 1.85.21.21 0 0 0-.1.2 10.74 10.74 0 0 1-.06 1.63 11.79 11.79 0 0 1-1.24 4.05 11.19 11.19 0 0 1-3.39 4 10.67 10.67 0 0 1-4.21 1.83 11.94 11.94 0 0 1-2.86.22 11.18 11.18 0 0 1-5.19-1.5l-.35-.21z" transform="translate(-634.53 -3368.23)"/></svg>
	</span>
	
</div>
