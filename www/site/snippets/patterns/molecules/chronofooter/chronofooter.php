<div class="chronofooter">
    <div class="chronofooter__bar"></div>
    <div class="chronofooter__text">
            <a href="<?php echo $link ?>">
            <h3><?php 
                if($name == 'articles') {
                    echo t('more articles') ;
                } else if($name == "podcasts") {
                    echo t('more podcasts');
                } else {
                    echo t('see');
                }
            ?></h3>
        </a>
    </div>
</div>