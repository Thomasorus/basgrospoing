<?php
return function($site, $pages, $page) {
  return [
    'title' => [
      'template' => '{{title}}',
      'suffix' => ' - {{sitename}}',
      'prefix' => ''
    ],
    'description' => [
      'template' => '{{text}}',
    ],
    'values' => [
        'title' => $page->title(),
        'text' => strip_tags(kirbytext($page->text())),
        'sitename' => $site->title()
    ]
  ];
};