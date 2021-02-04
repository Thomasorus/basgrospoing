<?php snippet('header'); ?>
<main class="flow-s4">
    <!-- Last article and podcast -->
    <section class="[ wrapper ] [ flow-s1 flow-colors ]">
        <?php 
            $nouveau = t('nouveau');
            snippet('patterns/molecules/sectionhead/sectionhead', ['title' => $nouveau]);
            ?>
                <!-- If article and podcast, add a special grid -->
                <?php if(isset($lastPodcast) && isset($lastArticle)): ?>
                    <div class="grid-2-1">
                <?php endif; ?>
                <?php 
                    if(isset($lastArticle)) {
                        $image = $lastArticle->magazineimage();
                        snippet('patterns/molecules/card/card', ["entry" => $lastArticle, "image" => $image, "srcset" => "magazinecard" ]);
                    }
                    if(isset($lastPodcast)) {
                        $image = $lastPodcast->podcastimage();
                        snippet('patterns/molecules/card/card', ["entry" => $lastPodcast, "image" => $image, "srcset" => "podcastcard" ]);
                    }
                ?>
                <?php if(isset($lastPodcast) && isset($lastArticle)): ?>
                    </div>
                <?php endif; ?>
    </section>
    <!-- Big article -->
    <?php  
        if(isset($heromag)) {
            snippet('patterns/organisms/herofull/herofull', ["mag" => $heromag]);
        }
    ?> 
    <!--Last podcasts and Last articles -->
    <?php 
        if(isset($podcastsChrono)) {
            snippet('patterns/templates/chronological/chronological', ['entries' => $podcastsChrono, "header" => "podcasts", "footer" => "podcasts", "color" => null, 'link' => 'podcasts']);
        }  
        if(isset($articleschrono)) {
            snippet('patterns/templates/chronological/chronological', ['entries' => $articleschrono, "header" => "articles", "footer" => "articles", "color" => "section-colored", 'link' => 'articles']);
        }  
    ?>
</main>
<?php snippet('footer') ?>