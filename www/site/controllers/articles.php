<?php
return function($page, $kirby) {
  $perpage  = $page->perpage()->int();
  $lang =$kirby->language();

  $articles = page('articles')
    ->children()
    ->listed()
    ->filter(function ($child) {
      return $child->date()->toDate() < time();
    })
    ->filter(function ($child) {
      return $child->translation(kirby()->language()->code())->exists();
    })
    ->sortBy('date', 'desc', 'time', 'asc')
    ->paginate(($perpage >= 1)? $perpage : 12);

  $pageTitle = "Articles";

  return [
    'articles'   => $articles,
    'pagination' => $articles->pagination(),
    'pageTitle'  => $pageTitle
  ];
};
