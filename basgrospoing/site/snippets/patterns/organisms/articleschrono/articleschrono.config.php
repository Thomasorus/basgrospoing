 <?php
$articlechrono = page('articles')->children()->visible()->sortBy('date', 'desc')->first();

return [
    'defaults' => [
        'articlechrono' => $articlechrono
    ]
];