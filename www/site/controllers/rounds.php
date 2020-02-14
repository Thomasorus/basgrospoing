<?php

return function($site, $pages, $page, $kirby) {
      $perpage  = $page->perpage()->int();

      $lang =$kirby->language();
      if($lang == "fr") {
      $Rounds = page('rounds')
        ->children()
        ->listed()
        ->sortBy('date', 'desc', 'time', 'asc');
      } else {
        $Rounds = [];
      }

  return [
    'rounds' => $Rounds
  ];

};
