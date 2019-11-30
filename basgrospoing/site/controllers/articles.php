<?php

// This is a controller file that contains the logic for the blog template.
// It consists of a single function that returns an associative array with
// template variables.
//
// Learn more about controllers at:
// https://getkirby.com/docs/developer-guide/advanced/controllers

return function($site, $pages, $page, $kirby) {

      $perpage  = $page->perpage()->int();

      $lang =$kirby->language();
      if($lang == "fr") {
        $articles = page('articles')
        ->children()
        ->visible()
        ->filterBy('Currentlang', 'fr')
        ->sortBy('date', 'desc', 'time', 'asc')
        ->paginate(($perpage >= 1)? $perpage : 12);
      } else if($lang == "en") {
        $articles = page('articles')
        ->children()
        ->visible()
        ->filterBy('Currentlang', 'en')
        ->filterBy('isTranslated', 'true')
        ->sortBy('date', 'desc', 'time', 'asc')
        ->paginate(($perpage >= 1)? $perpage : 12);
      }
     

      

      $pageTitle = "Articles";

  return [
    'articles'   => $articles,
    'pagination' => $articles->pagination(),
    'pageTitle'  => $pageTitle
  ];

};
