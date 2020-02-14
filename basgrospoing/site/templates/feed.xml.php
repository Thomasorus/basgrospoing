<?php
$kirby->response()->type('rss'); 
$language = $kirby->language();
$options = [
                'en' => [
                    'url' => site()->url(),
                    'feedurl' => site()->url() . '/feed/',
                    'title' => 'Latest articles',
                    'description' => 'Read the latest news about our company',
                    'link' => site()->url(),
                    'urlfield' => 'url',
                    'titlefield' => 'title',
                    'datefield' => 'date',
                    'textfield' => 'text',
                    'modified' => time(),
                    'snippet' => 'feed/rss', // 'feed/json'
                    'mime' => null,
                    'sort' => true,
                ],
                'fr' => [
                     'url' => site()->url(),
                    'feedurl' => site()->url() . '/feed/',
                    'title' => 'Derniers articles',
                    'description' => 'Nos dernières publications',
                    'link' => site()->url(),
                    'urlfield' => 'url',
                    'titlefield' => 'title',
                    'datefield' => 'date',
                    'textfield' => 'text',
                    'modified' => time(),
                    'snippet' => 'feed/rss', // 'feed/json'
                    'mime' => null,
                    'sort' => true,
                ],
            ];
            
            // site()->visit(page(), $language->code());
            
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
                ->listed()
                ->filter(function ($page) use($language) {
                    return $page->translation($language->code())->exists(); 
                })  
                ->sortBy(function ($page) {
                  return $page->date()->toDate();
                  }, 'desc')
                ->feed($options[$language->code()]);
            
            echo $feed;
?>