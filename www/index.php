<?php

require 'kirby/bootstrap.php';

$domains = array('basgrospoing.test', 'livid.basgrospoing.test');

if(url::host() == "basgrospoing.test") {
    echo (new Kirby)->render(); 
}

else if(url::host() == "livid.basgrospoing.test") {
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
            'media'   => __DIR__ . 'https://livid.basgrospoing.test',
        ]
    ]);   
    
    echo $kirby->render();
}

else {
     echo (new Kirby)->render(); 
}
