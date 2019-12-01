<?php

echo $site->find('articles', 'podcasts')
  ->children()
  ->listed()
  ->filter(function($child) use($kirby) {
    return $child->translation($kirby->language()->code())->exists();})
  ->sortBy('date', 'desc')
  ->feed(array(
  'title'       => $site->title(),
  'description' => $site->description(),
  'link'        => $site->url()
));

?>