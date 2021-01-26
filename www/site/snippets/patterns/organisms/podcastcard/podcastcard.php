<div class="card | position-relative">
  <?php if($podcast->Podcastimage()->isNotEmpty()): ?>
    <img class="height-100 width-100 object-fit-cover object-position-center" aria-hidden="true" loading="lazy" srcset="<?= $podcast->podcastimage()->toFile()->srcset([
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
              'width' => 550,
              'height' => 530,
              'crop' => 'center'
            ],
              '1920w' => [
                'width' => 320,
                'height' => 430,
                'crop' => 'center'
            ]
          ]) ?>" 
    />
  <?php else: ?>
    <img aria-hidden="true" loading="lazy" src="<?php echo $podcast->podcastimageold() ?>" alt="">
  <?php endif?>
  <span aria-hidden="true" class="title-scroll" data-title="<?php  echo $podcast->title();  ?>"></span>
  <div class="absolute-100 d-flex flex-col justify-content-space-between align-items-start">
    <span class="bg-black d-inline color-white font-futura-bold-italic text-transform-uppercase padding-s-3 padding-right-s-2">podcast</span>
    <h3 class="text-s2 font-futura-bold text-transform-uppercase padding-s0 line-height-s3 bg-white-transparent underline-md-pink">
      <?php  echo $podcast->title()->excerpt($chars = 100, $strip = true, $rep = '…')  ?>
    </h3>
  </div>
  <a class="absolute-100" href="<?= $podcast->url(); ?>" aria-label="<?= $podcast->title(); ?>"></a>
</div>