<?php snippet('header') ?>

<main>
    <?php foreach($rounds as $round):
       $roundDateStart = $round->limitDate();
       $roundDateEnd = $round->date();
       $items = $page->children()->filter(function ($child) {
        return $child->date()->toDate() < time();
      });

        $historique = page('podcasts')
        ->children()
        ->visible()
        ->filterBy('date', '<=', $roundDateStart)
        ->filterBy('date', '>=', $roundDateEnd)
        ->filterBy('category', '==', "Le podcast");

        $magazines = page('articles')
        ->children()
        ->visible()
        ->filterBy('date', '<=', $roundDateStart)
        ->filterBy('date', '>=', $roundDateEnd)
        ->filterBy('famille', '==', 'magazine');
      
        $others1 = page('articles')
          ->children()
          ->visible()
          ->filterBy('date', '<=', $roundDateStart)
          ->filterBy('date', '>=', $roundDateEnd)
          ->filterBy('famille', '!=', 'magazine')
          ->filterBy('category', '!=', "Le podcast")
          ->sortBy('date', 'desc');
             		
		 $others2 = page('podcasts')
          ->children()
          ->visible()
          ->filterBy('date', '<=', $roundDateStart)
          ->filterBy('date', '>=', $roundDateEnd)
          ->filterBy('famille', '!=', 'magazine')
          ->filterBy('category', '!=', "Le podcast")
->sortBy('date', 'desc');
          
	
$others = new Pages(array($others1, $others2));

?>

    <section>
        <!--Header Round-->
        <?php snippet('patterns/molecules/sectionhead/sectionhead', ['title' => $round]); ?>

        
        <!--Podcast-->
        <?php if($magazines == "" && $historique != ""): ?>
        <div class="historique-grid">

        <?php 
        foreach($historique as $podcast) {
            snippet('patterns/organisms/podcastcard/podcastcard', ["podcast" => $podcast]);
             if($magazines == "" && $historique != "") {
                snippet('patterns/organisms/punchlinecard/punchlinecard', ["punchline" => $podcast, "class" => "card--punchline--large"]);
            }
        }
       ?>
       </div>
        <?php endif ?>


        <!--Magazine-->
        <?php if($magazines != "" && $historique == ""): ?>

        <div class="magazine-grid">
        <?php 
        foreach($magazines as $magazine) {
            snippet('patterns/organisms/articlecard/articlecard', ["magazine" => $magazine]);
              if($historique == "" && $magazines != null) {
                snippet('patterns/organisms/punchlinecard/punchlinecard', ["punchline" => $magazine, "class" => ""]);
            }
        }
       ?>
       </div>
        <?php endif ?>

        <!-- MAgazine + podcast -->

        <?php if($magazines != "" && $historique != ""): ?>
        <div class="magazine-grid">
        <?php 
            foreach($magazines as $magazine) {
                snippet('patterns/organisms/articlecard/articlecard', ["magazine" => $magazine]);
            }
            foreach($historique as $podcast) {
                snippet('patterns/organisms/podcastcard/podcastcard', ["podcast" => $podcast]);
            }
        
        ?>
        </div>

         <?php endif ?>

        <!--Autres-->
        <div class="other-grid">

        <?php 
              foreach($others as $other) {
                  snippet('patterns/organisms/othercard/othercard', ['other' => $other]);
              }
          ?>
          </div>
    </section>
    <?php endforeach ?>
</main>

<?php snippet('footer') ?>