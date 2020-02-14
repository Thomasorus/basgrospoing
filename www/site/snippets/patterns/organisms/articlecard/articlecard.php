<div class="card card--article">
    <a href="<?php  echo $magazine->url(); ?>">
    <div class="card__img white-bg random-bg">
    <?php  if($magazine->magazineimage()->isNotEmpty()): ?>
        <div class="bg-lazy">
          <img srcset="<?= $magazine->magazineimage()->toFile()->srcset([
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
                        'width' => 640,
                        'height' => 430,
                        'crop' => 'center'
                    ]
                ]) ?>" />
        </div>
        <?php else: ?>
        <div class="bg-lazy">
          <img src="<?php echo $magazine->archiveimage()->toFile(); ?>" alt="">
        </div>
        <?php endif ?>
        <span class="title-scroll" data-title="<?php  echo $magazine->title();  ?>"></span>

    </div>
    <div class="card__title">
        <h2 class="underline-m--green"><?php  echo $magazine->title();  ?></h2>
        </div>
                <div class="card__text">

        <i><?php  echo $magazine->introtext()->excerpt($chars = 100, $strip = true, $rep = '…') ?></i>  
    </div>
    <h3><?php  echo $magazine->category();  ?></h3>
    </a>
</div>
