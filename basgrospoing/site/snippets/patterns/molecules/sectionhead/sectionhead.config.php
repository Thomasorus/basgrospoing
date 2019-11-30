<?php
$lastRound = page('rounds')->children()->visible()->sortBy('date', 'desc')->limit(1);
$round = $lastRound->first();
return [
    'defaults' => [
        'title' => $round
    ]
];