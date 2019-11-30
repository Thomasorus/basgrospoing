<?php
$lastRound = page('rounds')->children()->listed()->sortBy('date', 'desc')->limit(1);
$round = $lastRound->first();
return [
    'defaults' => [
        'title' => $round
    ]
];