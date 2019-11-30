<?php $podcast = page('podcasts')
                ->children()
                ->listed()
                ->sortBy('date', 'desc')
                ->limit(1);

return [
    'defaults' => [
        'podcast' => $podcast
    ]
];