<?php

return function($kirby, $site, $pages, $page) {
    $lang = $kirby->language();    

    $lastRound = page('rounds')
      ->children()
      ->sortBy('limitDate', 'desc')
      ->visible()
      ->limit(1);

    $lastArticle = page('articles')
      ->children()
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->visible()
      ->first();

    $lastPodcast = page('podcasts')
      ->children()
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->visible()
      ->first();
      
    $round = $lastRound->first();
    $roundDateStart = $round->limitDate();
    $roundDateEnd = $round->date();
  
    $perpage  = $page->perpage()->int();

    $podcastsChrono = page('podcasts')
      ->children()
      ->visible()
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->slice(1)
      ->limit(4);

    $articleschrono = page('articles')
      ->children()
      ->visible()
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->slice(1)
      ->limit(4);

    $heromag = page('articles')
      ->children()
      ->visible()
      ->filterBy('famille', '==', 'magazine')
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->first();

    if($lastArticle == $heromag) {
      $heromag = page('articles')
      ->children()
      ->visible()
      ->filterBy('famille', '==', 'magazine')
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->slice(1)
      ->first();
    }

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
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc');
             		
		 $others2 = page('podcasts')
          ->children()
          ->visible()
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
      ->visible()
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->filterBy('isTranslated', 'true')
      ->filterBy('currentLang', 'en')
      ->first();

      $englishSecond = page('articles')
      ->children()
      ->visible()
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      // ->filterBy('currentLang', 'en')
      // ->filterBy('isTranslated', 'true')
      ->slice(1)
      ->first();
      

		   
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
        'englishSecond' => $englishSecond
      ];

};


