<?php

// This is a controller file that contains the logic for the blog template.
// It consists of a single function that returns an associative array with
// template variables.
//
// Learn more about controllers at:
// https://getkirby.com/docs/developer-guide/advanced/controllers

return function($site, $pages, $page) {
      $perpage  = $page->perpage()->int();
     
        $categories = page('podcasts')
        ->children()
        ->visible()
        ->sortBy('date', 'desc')
        ->pluck('Category', ',', true);
        
        $podcasts = page('podcasts')
          ->children()
          ->listed()
          ->sortBy('date', 'desc')
          ->paginate(($perpage >= 1)? $perpage : 12);

         $pageTitle = "Podcasts";

         $allPodcasts = page('podcasts')
         ->children()
         ->visible()
         ->sortBy('date', 'desc');
 
         if($category = param('cat')) {
          $podcasts = $allPodcasts->filterBy('Category', urldecode($category), ',')->paginate(12);;
        }

        if($category = param('tag')) {
          $articles = $articles->filterBy('tags', $tag, ',');
        }

  return [
    'categories'   => $categories,
    'podcasts'   => $podcasts,
    'pagination' => $podcasts->pagination(),
    'pageTitle'  => $pageTitle
  ];

};
