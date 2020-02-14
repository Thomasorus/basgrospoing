<?php 
$fighter = page('fighters')
          ->children()
          ->listed()
           ->first();
          
return [
    'defaults' => [
        'fighter' => $fighter
    ]
];