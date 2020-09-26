<div class="card card--podcast">
  <a href="<?php  echo $podcast->url(); ?>">
    <div class="card__img white-bg--tall random-bg">
      <?php if($podcast->Podcastimage()->isNotEmpty()): ?>
      <div loading="lazy" class="bg-lazy">
            <img srcset="<?= $podcast->podcastimage()->toFile()->srcset([
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
            ]) ?>" />
      </div>
      <?php else: ?>
      <div class="bg-lazy">
                  <img loading="lazy" src="<?php echo $podcast->podcastimageold() ?>" alt="">

      </div>
      <?php endif?>
      <span class="title-scroll" data-title="<?php  echo $podcast->title();  ?>"></span>
    </div>
    <div class="card__title">
      <h2 class="underline-m--green">
        <?php  echo $podcast->title()->excerpt($chars = 100, $strip = true, $rep = '…')  ?>
      </h2>
    </div>
    <div class="card__text">
      <i>
        <?php  $podcast->text()->excerpt(100, $strip = true, $rep = '…') ?></i>
    </div>
    <h3>podcast</h3>
  </a>
</div>