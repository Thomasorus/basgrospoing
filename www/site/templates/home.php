<?php snippet('header'); ?>
<main class="flow-s4">
    <!-- Last article and podcast -->
    <section class="flow-s1 m-width-s40 margin-auto">
        <?php 
            $nouveau = t('nouveau');
            snippet('patterns/molecules/sectionhead/sectionhead', ['title' => $nouveau]);
            ?>
                <!-- If article and podcast, add a special grid -->
                <?php if(isset($lastPodcast) && isset($lastArticle)): ?>
                    <div class="new-content-grid">
                <?php endif; ?>
                <?php 
                    if(isset($lastArticle)) {
                        snippet('patterns/organisms/articlecard/articlecard', ["magazine" => $lastArticle]);
                    }
                    if(isset($lastPodcast)) {
                        snippet('patterns/organisms/podcastcard/podcastcard', ["podcast" => $lastPodcast]);
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