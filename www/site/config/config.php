<?php

return [
    'languages' => true,
    'languages.detect' => true,
    'debug' => true,
    'cache' => [
        'type' => 'memcached',
        'pages' => [
            'active' => true
        ]
    ],
    'thumbs' => [
        'driver' => 'gd',
        'autoOrient' => true,
        'quality' => '80',
        'interlace' => true
    ],
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
    // 'routes' => [
    //   [
    //     'pattern' => 'feed' ,
    //     'method' => 'GET',
    //     'language' => '*',
    //     'action'  => function ($language) {
    //         $options = [
    //             'en' => [
    //                 'url' => site()->url(),
    //                 'feedurl' => site()->url() . '/feed/',
    //                 'title' => 'Latest articles',
    //                 'description' => 'Read the latest news about our company',
    //                 'link' => site()->url(),
    //                 'urlfield' => 'url',
    //                 'titlefield' => 'title',
    //                 'datefield' => 'date',
    //                 'textfield' => 'text',
    //                 'modified' => time(),
    //                 'snippet' => 'feed/rss', // 'feed/json'
    //                 'mime' => null,
    //                 'sort' => true,
    //             ],
    //             'fr' => [
    //                  'url' => site()->url(),
    //                 'feedurl' => site()->url() . 'fr/feed/',
    //                 'title' => 'Derniers articles',
    //                 'description' => 'Nos dernières publications',
    //                 'link' => site()->url(),
    //                 'urlfield' => 'url',
    //                 'titlefield' => 'title',
    //                 'datefield' => 'date',
    //                 'textfield' => 'text',
    //                 'modified' => time(),
    //                 'snippet' => 'feed/rss', // 'feed/json'
    //                 'mime' => null,
    //                 'sort' => true,
    //             ],
    //         ];
            
    //         site()->visit(page(), $language->code());
            
    //         $frContent = page(['articles', 'podcasts']);
    //         $enContent = page('articles');
    //         $feedContent;

    //         if($language == "fr") {
    //           $feedContent = $frContent;
    //         } else {
    //           $feedContent = $enContent;
    //         }

    //         $feed = $feedContent
    //             ->children()
    //             ->listed()
    //             ->filter(function ($page) use($language) {
    //                 return $page->translation($language->code())->exists(); 
    //             })  
    //             ->sortBy(function ($page) {
    //               return $page->date()->toDate();
    //               }, 'desc')
    //             ->feed($options[$language->code()]);
            
    //         return $feed;
    //     }
    //   ]
    // ],
    'pedroborges.meta-tags.default' => function ($page, $site) {
      return [
          'link' => [
              'icon' => [
                  ['href' => url('/assets/images/icons/favicon-16x16.png'), 'sizes' => '16x16', 'type' =>'image/png'],
                  ['href' => url('/assets/images/icons/favicon-32x32.png'), 'sizes' => '32x32', 'type' =>'image/png'],
                  ['href' => url('/assets/images/icons/favicon-96x96.png'), 'sizes' => '96x96', 'type' =>'image/png'],
              ],
              'canonical' => page()->Canonical()->isNotEmpty() ? $page->Canonical() : $page->url(),
              'alternate' => function () {
                  if(page()->isTranslated() == 'true') { 
                    $locales = [];
                    foreach (kirby() ->languages() as $language) {
                        if ($language->code() == kirby()->language()) continue;

                        $locales[] = [
                            'hreflang' => $language->code(),
                            'href' => page()->url($language->code())
                        ];
                    }

                    return $locales;
                  }
              }
          ],
          'og' => [ 
             'title' => $page->isHomePage() ? 
                          $site->title() : 
                          $page->seotitle()->isnotEmpty() ? $page->seotitle() : $page->title(),
              'type' => 'website',
              'description' => $page->content(kirby()->language())->socialdescription(),  
              'site_name' => $site->title(),
              'url' => $page->isHomePage() ? $site->url() : $page->url(),
              'namespace:image' => function($page) {
                    $image = $page->socialimage()->toFile();
                    if($image != null) {
                        return [
                            'image' => $image->url(),
                            'height' => $image->height(),
                            'width' => $image->width(),
                            'type' => $image->mime()
                        ];
                    }
                
                }
          ],
          'twitter' => [
            'card' => 'summary_large_image',
            'site' => "@basgrospoing",
            'creator' => function($page) { return $page->twitterauthor(); },
            'title' => $page->isHomePage() ? 
                          $site->title() : 
                          $page->seotitle()->isnotEmpty() ? $page->seotitle() : $page->title(),  
            'description' => $page->content(kirby()->language())->socialdescription(),  
            'namespace:image' => function($page) {
                $image = $page->socialimage()->toFile();
                    if($image != null) {

                    return [
                        'image' => $image->url(),
                        'alt' => $image->alt()
                    ];
                }
            }
          ],
      ];
  },
  'pedroborges.meta-tags.templates' => function ($page, $site) {
    return [
        'article' => [
          'link' => [
              'icon' => [
                  ['href' => url('/assets/images/icons/favicon-16x16.png'), 'sizes' => '16x16', 'type' =>'image/png'],
                  ['href' => url('/assets/images/icons/favicon-32x32.png'), 'sizes' => '32x32', 'type' =>'image/png'],
                  ['href' => url('/assets/images/icons/favicon-96x96.png'), 'sizes' => '96x96', 'type' =>'image/png'],
              ],
              'canonical' => page()->Canonical()->isNotEmpty() ? $page->Canonical() : $page->url(),
              'alternate' => function () {
                if(page()->isTranslated() == 'true') { 

                  $locales = [];
                  foreach (kirby() ->languages() as $language) {
                      if ($language->code() == kirby()->language()) continue;

                      $locales[] = [
                          'hreflang' => $language->code(),
                          'href' => page()->url($language->code())
                      ];
                  }

                  return $locales;
                }
              }
          ],
          'og' => [ 
              'type' => 'article',
              'title' => $page->isHomePage() ? $site->title() : $page->title(),
              'description' => $page->socialdescription(),  
              'site_name' => $site->title(),
              'url' => $page->isHomePage() ? $site->url() : $page->url(),
              'namespace:image' => function($page) {
                    $image = $page->socialimage()->toFile();
                    if($image != null) {
                        return [
                            'image' => $image->url(),
                            'height' => $image->height(),
                            'width' => $image->width(),
                            'type' => $image->mime()
                        ];
                    }
                },
              'namespace:article' => function($page, $site) {
                return [
                    'author' => $page->author(),
                    'published_time' => $page->date('d/m/Y'),
                    'modified_time' => $page->modified('d/m/Y'),
                    'tag' => $page->tags(),
                    'url' => $page->url(),
                    'description' => $page->socialdescription(),
                    'site_name' => $site->title(),
                    'locale' => $site->language()->code()

                ];
            },
          ],
          'twitter' => [
            'card' => 'summary_large_image',
            'site' => "@basgrospoing",
            'creator' => function($page) { return $page->twitterauthor(); },
            'title' => $page->content(kirby()->language())->title(),  
            'description' => $page->content(kirby()->language())->socialdescription(), 
            'namespace:image' => function($page) {
                $image = $page->socialimage()->toFile();
                    if($image != null) {

                    return [
                        'image' => $image->url(),
                        'alt' => $image->alt()
                    ];
                }
            }
          ],
        ],
        'magazine' => [
          'link' => [
              'icon' => [
                  ['href' => url('/assets/images/icons/favicon-16x16.png'), 'sizes' => '16x16', 'type' =>'image/png'],
                  ['href' => url('/assets/images/icons/favicon-32x32.png'), 'sizes' => '32x32', 'type' =>'image/png'],
                  ['href' => url('/assets/images/icons/favicon-96x96.png'), 'sizes' => '96x96', 'type' =>'image/png'],
              ],
              'canonical' => page()->Canonical()->isNotEmpty() ? $page->Canonical() : $page->url(),
              'alternate' => function () {
                if(page()->isTranslated() == 'true') { 

                  $locales = [];
                  foreach (kirby() ->languages() as $language) {
                      if ($language->code() == kirby()->language()) continue;

                      $locales[] = [
                          'hreflang' => $language->code(),
                          'href' => page()->url($language->code())
                      ];
                  }

                  return $locales;
              }
            }
          ],
          'og' => [ 
              'type' => 'article',
              'title' => $page->isHomePage() ? $site->title() : $page->title(),
              'description' => $page->socialdescription(),  
              'site_name' => $site->title(),
              'url' => $page->isHomePage() ? $site->url() : $page->url(),
              'namespace:image' => function($page) {
                    $image = $page->socialimage()->toFile();
                    if($image != null) {
                        return [
                            'image' => $image->url(),
                            'height' => $image->height(),
                            'width' => $image->width(),
                            'type' => $image->mime()
                        ];
                    }
                },
              'namespace:article' => function($page, $site) {
                return [
                    'author' => $page->author(),
                    'published_time' => $page->date('d/m/Y'),
                    'modified_time' => $page->modified('d/m/Y'),
                    'tag' => $page->tags(),
                    'url' => $page->url(),
                    'description' => $page->socialdescription(),
                    'site_name' => $site->title(),
                    'locale' => $site->language()->code()

                ];
            },
          ],
          'twitter' => [
            'card' => 'summary_large_image',
            'site' => "@basgrospoing",
            'creator' => function($page) { return $page->twitterauthor(); },
            'title' => $page->content(kirby()->language())->title(),  
            'description' => $page->content(kirby()->language())->socialdescription(), 
            'namespace:image' => function($page) {
                $image = $page->socialimage()->toFile();
                    if($image != null) {

                    return [
                        'image' => $image->url(),
                        'alt' => $image->alt()
                    ];
                }
            }
          ],
        ],
         'opinion' => [
          'link' => [
              'icon' => [
                  ['href' => url('/assets/images/icons/favicon-16x16.png'), 'sizes' => '16x16', 'type' =>'image/png'],
                  ['href' => url('/assets/images/icons/favicon-32x32.png'), 'sizes' => '32x32', 'type' =>'image/png'],
                  ['href' => url('/assets/images/icons/favicon-96x96.png'), 'sizes' => '96x96', 'type' =>'image/png'],
              ],
              'canonical' => page()->Canonical()->isNotEmpty() ? $page->Canonical() : $page->url(),
              'alternate' => function () {
                if(page()->isTranslated() == 'true') { 

                  $locales = [];
                  foreach (kirby() ->languages() as $language) {
                      if ($language->code() == kirby()->language()) continue;

                      $locales[] = [
                          'hreflang' => $language->code(),
                          'href' => page()->url($language->code())
                      ];
                  }

                  return $locales;
              }
            }
          ],
          'og' => [ 
              'type' => 'article',
              'title' => $page->isHomePage() ? $site->title() : $page->title(),
              'description' => $page->socialdescription(),  
              'site_name' => $site->title(),
              'url' => $page->isHomePage() ? $site->url() : $page->url(),
              'namespace:image' => function($page) {
                    $image = $page->socialimage()->toFile();
                    if($image != null) {
                        return [
                            'image' => $image->url(),
                            'height' => $image->height(),
                            'width' => $image->width(),
                            'type' => $image->mime()
                        ];
                    }
                },
              'namespace:article' => function($page, $site) {
                return [
                    'author' => $page->author(),
                    'published_time' => $page->date('d/m/Y'),
                    'modified_time' => $page->modified('d/m/Y'),
                    'tag' => $page->tags(),
                    'url' => $page->url(),
                    'description' => $page->socialdescription(),
                    'site_name' => $site->title(),
                    'locale' => $site->language()->code()

                ];
            },
          ],
          'twitter' => [
            'card' => 'summary_large_image',
            'site' => "@basgrospoing",
            'creator' => function($page) { return $page->twitterauthor(); },
            'title' => $page->content(kirby()->language())->title(),  
            'description' => $page->content(kirby()->language())->socialdescription(), 
            'namespace:image' => function($page) {
                $image = $page->socialimage()->toFile();
                    if($image != null) {

                    return [
                        'image' => $image->url(),
                        'alt' => $image->alt()
                    ];
                }
            }
          ],
        ],
        'podcast' => [
          'link' => [
              'icon' => [
                  ['href' => url('/assets/images/icons/favicon-16x16.png'), 'sizes' => '16x16', 'type' =>'image/png'],
                  ['href' => url('/assets/images/icons/favicon-32x32.png'), 'sizes' => '32x32', 'type' =>'image/png'],
                  ['href' => url('/assets/images/icons/favicon-96x96.png'), 'sizes' => '96x96', 'type' =>'image/png'],
              ],
              'canonical' => page()->Canonical()->isNotEmpty() ? $page->Canonical() : $page->url(),
              'alternate' => function () {
                if(page()->isTranslated() == 'true') { 

                  $locales = [];
                  foreach (kirby() ->languages() as $language) {
                      if ($language->code() == kirby()->language()) continue;

                      $locales[] = [
                          'hreflang' => $language->code(),
                          'href' => page()->url($language->code())
                      ];
                  }

                  return $locales;
              }
            }
          ],
          'og' => [ 
              'type' => 'article',
              'title' => $page->isHomePage() ? $site->title() : $page->title(),
              'description' => $page->socialdescription(),  
              'site_name' => $site->title(),
              'url' => $page->isHomePage() ? $site->url() : $page->url(),
              'namespace:image' => function($page) {
                    $image = $page->socialimage()->toFile();
                    if($image != null) {
                        return [
                            'image' => $image->url(),
                            'height' => $image->height(),
                            'width' => $image->width(),
                            'type' => $image->mime()
                        ];
                    }
                },
              'namespace:article' => function($page, $site) {
                return [
                    'author' => $page->author(),
                    'published_time' => $page->date('d/m/Y'),
                    'modified_time' => $page->modified('d/m/Y'),
                    'tag' => $page->tags(),
                    'url' => $page->url(),
                    'description' => $page->socialdescription(),
                    'site_name' => $site->title(),
                    'locale' => $site->language()->code()

                ];
            },
          ],
          'twitter' => [
            'card' => 'summary_large_image',
            'site' => "@basgrospoing",
            'creator' => function($page) { return $page->twitterauthor(); },
            'title' => $page->content(kirby()->language())->title(),  
            'description' => $page->content(kirby()->language())->socialdescription(), 
            'namespace:image' => function($page) {
                $image = $page->socialimage()->toFile();
                    if($image != null) {

                    return [
                        'image' => $image->url(),
                        'alt' => $image->alt()
                    ];
                }
            }
          ],
        ]
    ];
  }          
];
