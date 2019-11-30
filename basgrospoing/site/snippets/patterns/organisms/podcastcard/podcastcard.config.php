<?php $podcast = page('podcasts')
                ->children()
                ->visible()
                ->sortBy('date', 'desc')
                ->limit(1);

return [
    'defaults' => [
        'podcast' => $podcast
    ]
];