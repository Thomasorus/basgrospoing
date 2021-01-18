<?php

return function($page, $kirby) {
  $lang =$kirby->language();

  $roundDateStart = $page->date()->toDate();
  $roundDateEnd = $page->limitDate()->toDate();

  $page->others = page(['articles', 'podcasts'])
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

  $page->historique = page(['podcasts'])
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

  $page->magazine = page(['articles'])
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

  if($page->magazine != "" && $page->historique != "") {
    $page->doublelayout = true;
  } else {
    $page->doublelayout = false;
  }

      

  return [
    'round' => $page
  ];

};