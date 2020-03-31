<?php

require 'kirby/bootstrap.php';

$domains = array('basgrospoing.fr', 'livid.basgrospoing.fr');

if(url::host() == "basgrospoing.fr") {
    echo (new Kirby)->render(); 
}

else if(url::host() == "livid.basgrospoing.fr") {
    $kirby = new Kirby([
        'roots' => [
            'index'   => __DIR__,
            'site'    => __DIR__ . '/livid/site',
            'content' => __DIR__ . '/livid/content',
            'media'   => __DIR__ . '/livid/media'
        ],
        'url' => [
            'index'   => __DIR__,
            'content' => __DIR__ . '/livid/content',
            'media'   => __DIR__ . '/livid/media',
            'media'   => __DIR__ . 'https://livid.basgrospoing.fr',
        ]
    ]);   
    
    echo $kirby->render();
}

else {
     echo (new Kirby)->render(); 
}
