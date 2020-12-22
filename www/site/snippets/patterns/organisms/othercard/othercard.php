
      <div class="card card--other">
        <a href="<?php  echo $other->url(); ?>">
          <div class="card__img white-bg random-bg">
              <div class="bg-lazy">
                 
                  <img loading="lazy" 
              srcset="<?= $other->archiveimage()->toFile()->srcset([
                 '420w' => [
                  'width' => 410,
                  'height' => 430,
                  'crop' => 'center'
                 ],
                '736w' => [
                  'width' => 720,
                  'height' => 430,
                  'crop' => 'center'
                ],
                  '1920w' => [
                    'width' => 480,
                    'height' => 430,
                    'crop' => 'center'
                ]
              ]) ?>" />

              </div>
              <span class="title-scroll" data-title="<?php  echo $other->title();  ?>"></span>
          </div>
          <div class="card__title">
              <h2 class="underline-m--green">
              <?php  echo $other->title()->excerpt(60, $strip = true, $rep = '…') ?>
              </div>
              <div class="card__text">
              <i>
              <?php  if($other->introtext()->isEmpty()) {
                echo $other->text()->excerpt(130, $strip = true, $rep = '…');
                }
                else {
                  echo $other->introtext()->excerpt(130, $strip = true, $rep = '…');                
                }
              ?>
              </i>
          </div>
          <h3><?php  echo $other->category(); ?></h3>
        </a>
      </div>
    