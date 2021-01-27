<?php

return [
    'languages' => true,
    'languages.detect' => true,
    'debug' => true,
    'cache' => [
        'type' => 'memcached',
        'pages' => [
            'active' => false
        ]
    ],
    'thumbs' => [
        'driver' => 'im',
        'autoOrient' => true,
        'quality' => '80',
        'interlace' => true
    ],
    'thumbs' => [
        'srcsets' => [
          'podcastcard' => [
            '420w' => [ 'width' => 410, 'height' => 430, 'crop' => 'center' ],
            '613w' => [ 'width' => 600, 'height' => 430, 'crop' => 'center' ],
            '710w' => [ 'width' => 700, 'height' => 430, 'crop' => 'center' ],
            '926w' => [ 'width' => 550, 'height' => 530, 'crop' => 'center' ],
            '1920w' => [ 'width' => 320,'height' => 430, 'crop' => 'center' ]
          ],
          'magazinecard' => [
            '420w' => [ 'width' => 410, 'height' => 430, 'crop' => 'center' ],
            '613w' => [ 'width' => 600, 'height' => 430, 'crop' => 'center' ],
            '710w' => [ 'width' => 700, 'height' => 430, 'crop' => 'center' ],
            '926w' => [ 'width' => 450, 'height' => 430, 'crop' => 'center' ],
            '1920w' => [ 'width' => 960, 'height' => 430, 'crop' => 'center']
          ],
          'hero' => [
            '340w' => [ 'width' => 320, 'height' => 640, 'crop' => 'center' ],
            '800w' => [ 'width' => 800, 'height' => 800, 'crop' => 'center' ],
            '1280w' => [ 'width' => 1280, 'height' => 640, 'crop' => 'center' ],
            '1920w' => [ 'width' => 1920, 'height' => 768, 'crop' => 'center' ]
          ],
          'othercard' => [
            '420w' => [ 'width' => 410, 'height' => 430, 'crop' => 'center' ],
            '736w' => [ 'width' => 720, 'height' => 430, 'crop' => 'center' ],
            '1920w' => [ 'width' => 480, 'height' => 430, 'crop' => 'center' ]
          ]
      ]
    ],
    'cre8ivclick.sitemapper.pageFilter' => function($p){
    // filtering code goes here:
    if($p->isListed()) {
        return true;
        } else {
        return false;
        }
    },


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
