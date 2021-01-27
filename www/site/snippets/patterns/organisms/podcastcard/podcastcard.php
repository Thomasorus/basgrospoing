<div class="[ card ]">
  <?php if($podcast->Podcastimage()->isNotEmpty()): ?>
    <img class="card__img" aria-hidden="true" loading="lazy" srcset="<?= $podcast->podcastimage()->toFile()->srcset([
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
  <div class="[ card__text ] [ absolute-100 ] ">
    <span class="[ card__category ]">podcast</span>
    <h3 class="[ card__title ] [ bg-white-transparent ]">
      <?php  echo $podcast->title()->excerpt($chars = 100, $strip = true, $rep = '…')  ?>
    </h3>
  </div>
  <a class="absolute-100" href="<?= $podcast->url(); ?>" aria-label="<?= $podcast->title(); ?>"></a>
</div>