<div class="card card--punchline <?php  echo $class; ?>">
  <a href="<?php  echo $punchline->url(); ?>">
      
    <div class="card_star">
        <img loading="lazy" src="/assets/images/star-yellow.svg" alt="">
        <h2>
        <?php echo t('punchline') ?>
        </h2>
    </div>
    <div class="card__text">
            <i><?php  echo $punchline->citation(); ?></i>
    </i>
    <h4><?php  echo $punchline->citationAuhor(); ?></h4>
    </div>
   
  </a>
</div>