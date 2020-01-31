<div class="magazine-container">
<div class="video">
<?php if($embed = $data->embed()->toEmbed()) {
    echo $embed->code();
} 
?>
</div>
</div>