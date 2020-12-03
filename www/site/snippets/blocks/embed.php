<div class="magazine-container">
<div class="video">
<?php if($embed = $block->embed()->toEmbed()) {
    echo $embed->code();
} 
?>
</div>
</div>