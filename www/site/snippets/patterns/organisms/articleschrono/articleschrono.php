<div class="card-circle">
    <a href="<?php  echo $articlechrono->url(); ?>">
    <div class="card-circle__img">
        <div class="card-circle__border"></div>
    
              <img loading="lazy" 
              srcset="<?= $articlechrono->chronoimage()->toFile()->srcset([
                    '1920w' => [
                      'width' => 150,
                      'height' => 150,
                      'crop' => 'center'
                  ]
              ]) ?>" />
    </div>
    <div class="card-circle__title">
        <h3 class="underline-m--green"><?php echo $articlechrono->title()->excerpt($chars = 50, $strip = true, $rep = '…') ?></h3>
        </div>
        <div class="card-circle__text">
        <i>
        <?php  
          if($articlechrono->introtext()->isEmpty()) {
            echo $articlechrono->text()->excerpt($chars = 120, $strip = true, $rep = '…');
          }
          else {
            echo $articlechrono->introtext()->excerpt($chars = 120, $strip = true, $rep = '…');
            
          }
        ?>
        </i>    
    </div>
    </a>
</div>
