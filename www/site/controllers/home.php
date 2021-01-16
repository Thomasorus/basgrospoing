<?php

return function($kirby, $site, $pages, $page) {
    $lang = $kirby->language();    

    $lastRound = page('rounds')
      ->children()
      ->sortBy('limitDate', 'desc')
      ->listed()
      ->limit(1);

    $lastArticle = page('articles')
      ->children()
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->listed()
      ->first();

    $lastPodcast = page('podcasts')
      ->children()
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->listed()
      ->first();
      
    $round = $lastRound->first();
    $roundDateStart = $round->limitDate();
    $roundDateEnd = $round->date();
  
    $perpage  = $page->perpage()->int();

    $podcastsChrono = page('podcasts')
      ->children()
      ->listed()
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->slice(1)
      ->limit(4);

    $articleschrono = page('articles')
      ->children()
      ->listed()
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->filter(function ($child) {
        return $child->translation(kirby()->language()->code())->exists();
      })
      ->slice(1);
      // ->limit(4);

    $heromag = page('articles')
      ->children()
      ->listed()
      ->filterBy('category', '==', 'Magazine')
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->first();

    if($lastArticle == $heromag) {
      $heromag = page('articles')
      ->children()
      ->listed()
      ->filterBy('category', '==', 'Magazine')
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->slice(1)
      ->first();
    }

    $historique = page('podcasts')
      ->children()
      ->listed()
      ->filterBy('date', '<=', $roundDateStart)
      ->filterBy('date', '>=', $roundDateEnd)
      ->filterBy('category', '==', "Le podcast");


    $magazines = page('articles')
      ->children()
      ->listed()
      ->filterBy('date', '<=', $roundDateStart)
      ->filterBy('date', '>=', $roundDateEnd)
      ->filterBy('famille', '==', 'magazine');
    
    $others1 = page('articles')
      ->children()
      ->listed()
      ->filterBy('date', '<=', $roundDateStart)
      ->filterBy('date', '>=', $roundDateEnd)
      ->filterBy('famille', '!=', 'magazine')
      ->filterBy('category', '!=', "Le podcast")
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc');
             		
		 $others2 = page('podcasts')
          ->children()
          ->listed()
          ->filterBy('date', '<=', $roundDateStart)
          ->filterBy('date', '>=', $roundDateEnd)
          ->filterBy('famille', '!=', 'magazine')
          ->filterBy('category', '!=', "Le podcast")
          ->sortBy(function ($page) {
            return $page->date()->toDate();
          }, 'desc'); 
          
        
      $others = new Pages(array($others1, $others2));


    
      $englishMain = page('articles')
      ->children()
      ->listed()
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->filterBy('isTranslated', 'true')
      ->filterBy('Currentlang', 'en')
      ->first();

      // $englishSecond = page('articles')
      // ->children()
      // ->listed()
      // ->sortBy(function ($page) {
      //   return $page->date()->toDate();
      // }, 'desc')
      // ->filterBy('isTranslated', 'true')
      // ->filterBy('Currentlang', 'en')
      // ->slice(1)
      // ->first();
      

		   
      return [
        'lastArticle' => $lastArticle,
        'lastPodcast' => $lastPodcast,
        'round' => $round,
        'historique' => $historique,
        'magazines' => $magazines,
        'others' => $others,
        'heromag' => $heromag,
        'podcastsChrono' => $podcastsChrono,
        'articleschrono' => $articleschrono,
        'lang' => $lang,
        'englishMain' => $englishMain,
        // 'englishSecond' => $englishSecond
      ];

};


