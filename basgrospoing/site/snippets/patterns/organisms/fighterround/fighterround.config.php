<?php 
$fighter = page('fighters')
          ->children()
          ->visible()
           ->first();
          
return [
    'defaults' => [
        'fighter' => $fighter
    ]
];