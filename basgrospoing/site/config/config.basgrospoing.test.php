<?php

return [
    'languages' => true,
    'languages.detect' => true,
    'debug' => true,
    'hooks' => [
        //This hook creates a currentLang invisible field in each page
        //In the blueprint, it's used to create a true/false translated field
        'page.create:after' => function ($page) {
            foreach (kirby()->languages() as $lang) {
              $code = $lang->code();
              $page->update([ 'currentLang' => $code ], $code);
           }
        },
      ],
    'routes' => [
      [
        'pattern' => 'feed' ,
        'method' => 'GET',
        'language' => '*',
        'action'  => function ($language) {
            $options = [
                'en' => [
                    'title'       => 'Latest articles',
                    'description' => 'Read the latest news about our company',
                    'link'        => '/en/feed',
                    'datefield'   => 'date',
                    'textfield'   => 'text',
                    'snippet'     => 'feed/rss'
                ],
                'fr' => [
                    'title'       => 'Dernier articles',
                    'description' => 'Nos dernières publications',
                    'link'        => '/fr/feed',
                    'datefield'   => 'date',
                    'textfield'   => 'text',
                    'snippet'     => 'feed/rss'
                ]
            ];
            site()->visit(page(), $language->code());
            
            $frContent = page(['articles', 'podcasts']);
            $enContent = page('articles');
            $feedContent;

            if($language == "fr") {
              $feedContent = $frContent;
            } else {
              $feedContent = $enContent;
            }

            $feed = $feedContent
                ->children()
                ->visible()
                ->filter(function ($page) use($language) {
                    return $page->translation($language->code())->exists(); 
                })
                ->sortBy(function ($page) {
                  return $page->date()->toDate();
                  }, 'desc')
                ->feed($options[$language->code()]);
            
            return $feed;
        }
      ]
    ]
];
