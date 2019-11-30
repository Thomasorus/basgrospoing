<?php snippet('header') ?>

  <main role="main">
    
 
  <div class=" col-lg-offset-3 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
     
          <article>

         	<h2><?php echo $page->title(); ?></h2>
		<?php echo $page->text()->kirbytext(); ?>
             
            <ul class="meta">
  				<li>Date : <time datetime="<?php echo $page->date('c') ?>" pubdate="pubdate"><?php echo $page->date('d.M.Y') ?></time></li>
          <li class="tags">Tags : 
            <ul class="meta-element">
              <?php foreach($page->tags()->split(',') as $tag): ?>
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
                <?php foreach($page->category()->split(',') as $cat): ?>
                <a href="<?php echo $site->url() . '/cat:' . $cat ?>">
                  <?php echo html($cat) ?>
                </a>
            <?php endforeach ?>
               </li>
           </ul>
          </li>
		  	 </ul>

          </article>

      
  
  </div>



<?php snippet('footer') ?>