<?php snippet('header') ?>

    
 
  <div class=" col-lg-offset-3 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
  <?php if($articles->count()): ?>

        <?php foreach($articles as $article): ?>

          <article>
                <a href="<?= $article->url() ?>"><h2><?= $article->title()->html() ?></h2></a>
              
                <?= $article->text()->kirbytext() ?>
             
            <ul class="meta">
  				<li>Date : <time datetime="<?php echo $article->date('c') ?>" pubdate="pubdate"><?php echo $article->date('d.M.Y') ?></time></li>
          <li class="tags">Tags : 
            <ul class="meta-element">
              <?php foreach($article->tags()->split(',') as $tag): ?>
                <li> <a href="<?php echo $site->url() . '/tag:' . $tag ?>">
                <?php echo html($tag) ?>
              </a>
              </li>
          <?php endforeach ?>
            </ul>
          
          </li>
          <li class="categories">Categories : 
           <ul>
             <li>
                <?php foreach($article->category()->split(',') as $cat): ?>
                <a href="<?php echo $site->url() . '/cat:' . $cat ?>">
                  <?php echo html($cat) ?>
                </a>
            <?php endforeach ?>
               </li>
           </ul>
          </li>
		  	 </ul>

          </article>

         

        <?php endforeach ?>
      <?php else: ?>
        <p>This blog does not contain any articles yet.</p>
      <?php endif ?>
  
  </div>




 <?php snippet('pagination') ?>
<?php snippet('footer') ?>