 <?php
         $articleschrono = page('articles')->children()->listed()->sortBy('date', 'desc')->limit(4);

        foreach($articleschrono as $articleChrono): ?>

    <div class="card-circle">
      <a href="<?php  echo $articleChrono->url(); ?>">
        <div class="card-circle__img">
            <div class="card-circle__border"></div>
            <img src="<?php  echo $articleChrono->url(); ?>/<?php  echo $articleChrono->chronoimage(); ?>" alt="<?php  echo $articleChrono->title(); ?>">
        </div>
        <div class="card-circle__title">
            <h3 class="underline-m--green"><?php  echo $articleChrono->title(); ?></h3>
            </div>
            <div class="card-circle__text">
            <i><?php  echo $articleChrono->text(); ?></i>
        
        </div>
      </a>
    </div>
<?php endforeach ?>