<?php


return function($site, $pages, $page) {

  $perpage  = $page->perpage()->int();
  
  $articles = $site->find('blog')->children()
                   ->listed()
                   ->flip()
                   ->paginate(($perpage >= 1)? $perpage : 10);

$allArticles = $site->find('blog')->children()
                   ->listed()
                   ->flip();
                   

  // add the tag filter
  if($tag = param('tag')) {
    $articles = $allArticles->filterBy('tags', urldecode($tag), ',')->paginate(10);;
  }

  if($category = param('cat')) {
    $articles = $allArticles->filterBy('Category', urldecode($category), ',')->paginate(10);;
  }
  

  return [
    'articles'   => $articles,
    'pagination' => $articles->pagination()
  ];

};
