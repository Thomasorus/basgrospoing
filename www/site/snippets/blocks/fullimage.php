<div class="magazine__full-img white-bg">

<?php if($data->fullimage()): ?>
<img srcset="<?=$data->fullimage()->toFile()->srcset([600, 800, 1600]); ?>"/> 
<?php endif ?>
<?php if($data->citation()->isNotEmpty()): ?>
<div class="magazine__full-img__citation">
    <div class="magazine__citation"><?php echo $data->citation() ?></div>
</div>
<?php endif ?>
</div>