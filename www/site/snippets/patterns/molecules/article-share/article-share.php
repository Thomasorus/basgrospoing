 <div class="article-share">
            <span>
            <?php echo t('share article') ?>

                <a href="https://twitter.com/intent/tweet?source=webclient&text=<?php echo rawurlencode($page->title()); ?>%20<?php echo rawurlencode($page->url()); ?>%20<?php echo ('via @basgrospoing')?>" target="blank" rel="noopener noreferrer" title="Partager sur twitter">
                    <img src="/assets/images/tw-b.svg" alt="Partager sur twitter">
                </a><a href="http://www.facebook.com/sharer.php?u=<?php echo rawurlencode ($page->url()); ?>" target="blank" rel="noopener noreferrer" title="Partager sur facebook">
                                    <img src="/assets/images/fb-b.svg" alt="Partager sur facebook">
                    </a></span>
        </div>