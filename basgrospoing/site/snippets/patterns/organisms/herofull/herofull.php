<?php if($mag != null): ?>
<div class="hero-full">
  <a href="<?php  echo $mag->url(); ?>">
    <div class="hero-full__img black-bg">

      <div class="bg-lazy">
        <?php if($mag->coverimage()->toFile()): ?>
        <img src="<?= $mag->coverimage()->toFile()->url() ?>" srcset="<?= $mag->coverimage()->toFile()->srcset([
                '340w' => [
                  'width' => 320,
                  'height' => 640,
                  'crop' => 'center'
                ],
                  '800w' => [
                      'width' => 800,
                      'height' => 800,
                      'crop' => 'center'
                  ],
                  '1280w' => [
                    'width' => 1280,
                    'height' => 640,
                    'crop' => 'center'
                ],
                  '1920w' => [
                    'width' => 1920,
                    'height' => 768,
                    'crop' => 'center'
                ]
            ]) 
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