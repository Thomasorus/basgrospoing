<div class="magazine__full-img white-bg">

<?php if($data->fullimage()): ?>
<img 
    class="lazy" 
    src="<?=$data->imagelarge()->toFile()->thumb([
        'width'   => 300,
        'quality' => 20,
        'blur' => true,
        ])->url();  ?>"
    data-src="<?=$data->fullimage()->toFile()->srcset([600]); ?>"
    data-srcset="<?=$data->fullimage()->toFile()->srcset([600, 800, 1600]); ?>"/> 
<?php endif ?>
<?php if($data->citation()->isNotEmpty()): ?>
<div class="magazine__full-img__citation">
    <div class="magazine__citation"><?php echo $data->citation() ?></div>
</div>
<?php endif ?>
</div>