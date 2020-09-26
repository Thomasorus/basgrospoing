<div class="fighter-round">
<div class="fighter-round__photo">
<a href="<?php echo $fighter->url() ?>">
<figure>
<img loading="lazy"  src="<?php echo $fighter->photo()->toFile()->url()?>" alt="<?php echo $fighter->name() ?>  ">
</figure>
</a>
</div>
<div class="fighter-round__name">
    <a href="<?php echo $fighter->url() ?>">
    <h5><?php echo $fighter->name()?>
</h5>
</a>
</div>
<div class="fighter-round__twitter">
    <a href="http://twitter.com/<?php echo $fighter->twitter()?>">
    <img src="/assets/images/tw-b.svg" alt="">
    </a>
</div>
</div>


