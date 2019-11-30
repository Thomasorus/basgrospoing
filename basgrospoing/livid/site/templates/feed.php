<?php

echo page('blog')->children()->visible()->flip()->limit(10)->feed(array(
  'title'       => "Livid's blog",
  'description' => 'Read the latest posts from Livid',
  'link'        => 'blog'
));