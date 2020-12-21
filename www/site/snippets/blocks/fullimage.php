<div class="magazine__full-img white-bg">

<?php if($block->fullimage()): ?>
<img loading="lazy" 
    class="lazy" 
    src="<?=$block->fullimage()->toFile()->thumb([
        'width'   => 300,
        'quality' => 20,
        'blur' => true,
        ])->url();  ?>"
    data-src="<?=$block->fullimage()->toFile()->srcset([600]); ?>"
    data-srcset="<?=$block->fullimage()->toFile()->srcset([600, 800, 1600]); ?>"/> 
<?php endif ?>
<?php if($block->citation()->isNotEmpty()): ?>
<div class="magazine__full-img__citation">
    <div class="magazine__citation"><?php echo $block->citation() ?></div>
</div>
<?php endif ?>
</div>