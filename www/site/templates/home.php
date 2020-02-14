<?php 
snippet('header');
?>
<main>



<?php  if($lang == "en" ): ?>
    <section>
        <?php 
        snippet('patterns/molecules/sectionhead/sectionhead', ['title' => "Last post"]);?>
        <div class="magazine-grid">

            <?php 
        if(!empty($englishMain)) {
            snippet('patterns/organisms/articlecard/articlecard', ["magazine" => $englishMain]);

            if($englishMain->famille() === "magazine") {
                snippet('patterns/organisms/punchlinecard/punchlinecard', ["punchline" => $englishMain, "class" => ""]);    
            }
        }
        snippet('patterns/organisms/othercard/othercard', ["other" => $englishSecond]);
            
        
    ?>
        </div>
    </section>
    <?php endif ?>



    <?php  if($lang == "fr" ): ?>
    <section>

        <?php 
                    
        snippet('patterns/molecules/sectionhead/sectionhead', ['title' => "Nouveau"]);?>
        <div class="magazine-grid">
            <?php 
                if($lastArticle != null && $lastPodcast != null) {
                    snippet('patterns/organisms/podcastcard/podcastcard', ["podcast" => $lastPodcast]);
                    snippet('patterns/organisms/articlecard/articlecard', ["magazine" => $lastArticle]);
                }
            ?>
        </div>
    </section>
    <?php endif ?>

    <?php  if($lang != "en") {

snippet('patterns/organisms/herofull/herofull', ["mag" => $heromag]);
    }
    ?>

    <!--Derniers podcasts-->
    <?php  if($lang == "fr" ): ?>

    <?php  if(size($podcastsChrono) > 1): ?>
    <section>
        <div class="chronohead">
            <span class="chronohead__bar"></span>
            <span class="chronohead__title">
                <h2>
                    <?php echo t('last') ?> podcasts</h2>
                <span class="chronohead__star" aria-hidden="true"></span>

            </span>
            <span class="chronohead__bar"></span>
        </div>
        <div class="chrono-grid">
            <?php
        foreach($podcastsChrono as $podcastChrono) {
            snippet('patterns/organisms/podcastschrono/podcastschrono', ['podcastChrono' => $podcastChrono]);
        }
    ?>
        </div>
        <div class="chronofooter">
            <div class="chronofooter__bar"></div>
            <div class="chronofooter__text">
                <a href="<?php echo $site->language()->code() ?>/podcasts">
                    <h3>
                        <?php echo t('more podcasts') ?>
                    </h3>
                </a>
            </div>
        </div>
    </section>
    <?php endif ?>
    <?php endif ?>


    <!--Derniers articles-->
    <?php 
        if(!empty($articleschrono)) {
            snippet('patterns/templates/chronological/chronological', ['articlechrono' => $articleschrono, "header" => "articles", "footer" => " d'articles"]);
        }  
    ?>



</main>

<?php snippet('footer') ?>