<div class="[ card ]">
  <?php if($magazine->magazineimage()->isNotEmpty()): ?>
    <img class="card__img" aria-hidden="true" loading="lazy" srcset="<?= $magazine->magazineimage()->toFile()->srcset([
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
  <div class="[ card__text ] [ absolute-100 ] ">
    <span class="[ card__category ]"><?php  echo $magazine->category();  ?></span>
    <h3 class="[ card__title ] [ bg-white-transparent ]">
      <?php  echo $magazine->title()->excerpt($chars = 100, $strip = true, $rep = '…')  ?>
    </h3>
  </div>
  <a class="absolute-100" href="<?= $magazine->url(); ?>" aria-label="<?= $magazine->title(); ?>"></a>
</div>