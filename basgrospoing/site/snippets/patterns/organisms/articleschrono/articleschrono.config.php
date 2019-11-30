 <?php
$articlechrono = page('articles')->children()->listed()->sortBy('date', 'desc')->first();

return [
    'defaults' => [
        'articlechrono' => $articlechrono
    ]
];