<div class="card-circle">
  <a href="<?php  echo $podcastChrono->url(); ?>">
    
    <div class="card-circle__img">
        <div class="card-circle__border"></div>
        <?php $image;
          if($podcastChrono->Chronoimage()->isNotEmpty()) {
            $image = $podcastChrono->Chronoimage()->toFile();
          }
          else {
            $image = $podcastChrono->ChronoimageOld();
          }
         ?>
        <img srcset="<?= $image->srcset([
                    '1920w' => [
                      'width' => 150,
                      'height' => 150,
                      'crop' => 'center'
                  ]
              ]) ?>" />
    </div>
    <div class="card-circle__title">
        <h3 class="underline-m--green"><?php  echo $podcastChrono->title(); ?></h3>
        </div>
         <div class="card-circle__text">
        <i><?php  echo $podcastChrono->text()->excerpt($chars = 120, $strip = true, $rep = '…') ?></i>
    
    </div>
  </a>
</div>