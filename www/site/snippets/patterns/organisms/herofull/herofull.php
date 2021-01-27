<?php if($mag != null): ?>
<div class="hero-full">
  <a href="<?php  echo $mag->url(); ?>">
    <div class="hero-full__img black-bg">

      <div class="bg-lazy">
        <?php if($mag->coverimage()->toFile()): ?>
        <img loading="lazy" src="<?= $mag->coverimage()->toFile()->url() ?>" srcset="<?= $mag->coverimage()->toFile()->srcset("hero") 
        ?>" />


      </div>
      <?php endif ?>

    </div>
    <div class="hero-full__text">
      <span><?php  echo $mag->category(); ?></span>
      <h2><?php  echo $mag->title(); ?></h2>
      <i><?php  echo $mag->introtext()->excerpt($chars = 120, $strip = true, $rep = '…') ?></i>
    </div>
  </a>
</div>
<?php endif ?>