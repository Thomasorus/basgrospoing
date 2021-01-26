<div class="card | position-relative">
  <?php if($magazine->magazineimage()->isNotEmpty()): ?>
    <img class="height-100 width-100 object-fit-cover object-position-center" aria-hidden="true" loading="lazy" srcset="<?= $magazine->magazineimage()->toFile()->srcset([
            '420w' => [
              'width' => 410,
              'height' => 430,
              'crop' => 'center'
            ],
            '613w' => [
              'width' => 600,
              'height' => 430,
              'crop' => 'center'
            ],
            '710w' => [
              'width' => 700,
              'height' => 430,
              'crop' => 'center'
            ],
            '926w' => [
              'width' => 450,
              'height' => 430,
              'crop' => 'center'
            ],
              '1920w' => [
                'width' => 960,
                'height' => 430,
                'crop' => 'center'
            ]
          ]) ?>" 
    />
  <?php endif?>
  <span aria-hidden="true" class="title-scroll" data-title="<?php  echo $magazine->title();  ?>"></span>
  <div class="absolute-100 d-flex flex-col justify-content-space-between align-items-start">
    <span class="bg-black d-inline color-white font-futura-bold-italic text-transform-uppercase padding-s-3 padding-right-s-2"><?php  echo $magazine->category();  ?></span>
    <h3 class="text-s2 font-futura-bold text-transform-uppercase padding-s0 line-height-s3 bg-white-transparent underline-md-green">
      <?php  echo $magazine->title()->excerpt($chars = 100, $strip = true, $rep = '…')  ?>
    </h3>
  </div>
  <a class="absolute-100" href="<?= $magazine->url(); ?>" aria-label="<?= $magazine->title(); ?>"></a>
</div>