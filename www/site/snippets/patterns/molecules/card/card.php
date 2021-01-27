<div class="[ card ]">
  <?php 
    if($image->isNotEmpty()): ?>
    <img class="card__img" aria-hidden="true" loading="lazy" srcset="<?= $image->toFile()->srcset($srcset) ?>" 
    />
  <?php else: ?>
    <img aria-hidden="true" loading="lazy" src="<?php echo $entry->podcastimageold() ?>" alt="">
  <?php endif?>
  <span aria-hidden="true" class="title-scroll" data-title="<?php  echo $entry->title();  ?>"></span>
  <div class="[ card__text ] [ absolute-100 ] ">
    <span class="[ card__category ]">podcast</span>
    <h3 class="[ card__title ] [ bg-white-transparent ]">
      <?php  echo $entry->title()->excerpt($chars = 100, $strip = true, $rep = '…')  ?>
    </h3>
  </div>
  <a class="absolute-100" href="<?= $entry->url(); ?>" aria-label="<?= $entry->title(); ?>"></a>
</div>