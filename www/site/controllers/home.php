<?php

return function($kirby) {
  $lang = $kirby->language();  
  
  if($lang == "fr") {

    $lastArticle = page('articles')
    ->children()
    ->listed()
    ->filter(function ($child) {
      return $child->date()->toDate() < time();
    })
    ->sortBy(function ($page) {
      return $page->date()->toDate();
    }, 'desc')
    ->filter(function ($child) {
      return $child->translation(kirby()->language()->code())->exists();
    })
    ->first();

    $lastPodcast = page('podcasts')
    ->children()
    ->listed()
    ->filter(function ($child) {
      return $child->date()->toDate() < time();
    })
    ->sortBy(function ($page) {
      return $page->date()->toDate();
    }, 'desc')
    ->filter(function ($child) {
      return $child->translation(kirby()->language()->code())->exists();
    })
    ->first();


    $podcastsChrono = page('podcasts')
    ->children()
    ->listed()
    ->filter(function ($child) {
      return $child->date()->toDate() < time();
    })
    ->sortBy(function ($page) {
      return $page->date()->toDate();
    }, 'desc')
    ->filter(function ($child) {
      return $child->translation(kirby()->language()->code())->exists();
    })
    ->slice(1)
    ->limit(4);

    $articleschrono = page('articles')
      ->children()
      ->listed()
      ->filter(function ($child) {
        return $child->date()->toDate() < time();
      })
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->filter(function ($child) {
        return $child->translation(kirby()->language()->code())->exists();
      })
      ->slice(1)
      ->limit(4);

    $heromag = page('articles')
      ->children()
      ->listed()
      ->filter(function ($child) {
        return $child->date()->toDate() < time();
      })
      ->filter(function ($child) {
        return $child->translation(kirby()->language()->code())->exists();
      })
      ->filterBy('category', '==', 'Magazine')
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->first();

    if($lastArticle == $heromag) {
      $heromag = page('articles')
      ->children()
      ->listed()
      ->filter(function ($child) {
        return $child->date()->toDate() < time();
      })
      ->filter(function ($child) {
        return $child->translation(kirby()->language()->code())->exists();
      })
      ->filterBy('category', '==', 'Magazine')
      ->sortBy(function ($page) {
        return $page->date()->toDate();
      }, 'desc')
      ->slice(1)
      ->first();
    }

    return [
      'lastArticle' => $lastArticle,
      'lastPodcast' => $lastPodcast,
      'heromag' => $heromag,
      'podcastsChrono' => $podcastsChrono,
      'articleschrono' => $articleschrono,
      'lang' => $lang,
    ];

  }

  if($lang == "en") {

    $lastArticle = page('articles')
    ->children()
    ->listed()
    ->filter(function ($child) {
      return $child->date()->toDate() < time();
    })
    ->filter(function ($child) {
      return $child->translation(kirby()->language()->code())->exists();
    })
    ->sortBy(function ($page) {
      return $page->date()->toDate();
    }, 'desc')
    ->filterBy('isTranslated', 'true')
    ->first();
    
    $articleschrono = page('articles')
    ->children()
    ->listed()
    ->filter(function ($child) {
      return $child->date()->toDate() < time();
    })
    ->filter(function ($child) {
      return $child->translation(kirby()->language()->code())->exists();
    })
    ->filter(function ($child) {
      return $child->translation(kirby()->language()->code())->exists();
    })
    ->filterBy('isTranslated', 'true')
    ->sortBy(function ($page) {
      return $page->date()->toDate();
    }, 'desc')
    ->slice(1);

    return [
      'articleschrono' => $articleschrono,
      'lang' => $lang,
      'lastArticle' => $lastArticle,
    ];
  }
};


