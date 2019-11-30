<?php

echo $site->find('articles', 'podcasts')
  ->children()
  ->visible()
  ->filter(function($child) {
    return $child->content(site()->language()->code())->exists();
  })
  ->sortBy('date', 'desc')
  ->feed(array(
  'title'       => $site->title(),
  'description' => $site->description(),
  'link'        => $site->link()
));

?>