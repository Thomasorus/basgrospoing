<?php

return function($page, $kirby) {
      $perpage  = $page->perpage()->int();
      $lang =$kirby->language();

      $rounds = page('rounds')
        ->children()
        ->listed()
        ->filter(function ($child) {
          return $child->date()->toDate() < time();
        })
        ->filter(function ($child) {
          return $child->translation(kirby()->language()->code())->exists();
        })
        ->sortBy('date', 'desc', 'time', 'asc');
      
      
      foreach($rounds as $round) {
        
        $roundDateStart = $round->date()->toDate();
        $roundDateEnd = $round->limitDate()->toDate();

        $round->others = page(['articles', 'podcasts'])
          ->children()
          ->listed()
          ->filterBy('date', '<=', $roundDateStart)
          ->filterBy('date', '>=', $roundDateEnd)
          ->filterBy('category', '!=', "Le podcast")
          ->filterBy('category', '!=', "Magazine")
          ->filter(function ($page) use ($roundDateStart) {
            return $page->date()->toDate() >= $roundDateStart;
          })
          ->filter(function ($page) use ($roundDateEnd) {
          return $page->date()->toDate() <= $roundDateEnd;
          })
          ->sortBy('date', 'desc');

        $round->historique = page(['podcasts'])
          ->children()
          ->listed()
          ->filterBy('date', '<=', $roundDateStart)
          ->filterBy('date', '>=', $roundDateEnd)
          ->filterBy('category', '==', "Le podcast")
          ->filter(function ($page) use ($roundDateStart) {
            return $page->date()->toDate() >= $roundDateStart;
          })
          ->filter(function ($page) use ($roundDateEnd) {
          return $page->date()->toDate() <= $roundDateEnd;
          });

        $round->magazine = page(['articles'])
          ->children()
          ->listed()
          ->filterBy('date', '<=', $roundDateStart)
          ->filterBy('date', '>=', $roundDateEnd)
          ->filterBy('category', '==', "Magazine")
          ->filter(function ($page) use ($roundDateStart) {
            return $page->date()->toDate() >= $roundDateStart;
          })
          ->filter(function ($page) use ($roundDateEnd) {
          return $page->date()->toDate() <= $roundDateEnd;
          });

        if($round->magazine != "" && $round->historique != "") {
            $round->doublelayout = true;
        } else {
            $round->doublelayout = false;
        }

      }

  return [
    'rounds' => $rounds
  ];

};