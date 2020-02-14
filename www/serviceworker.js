// Licensed under a CC0 1.0 Universal (CC0 1.0) Public Domain Dedication
// http://creativecommons.org/publicdomain/zero/1.0/

(function() {

    // A cache for core files like CSS and JavaScript
    var staticCacheName = 'static';
    // A cache for pages to store for offline
    var pagesCacheName = 'pages';
    // A cache for images to store for offline
    var imagesCacheName = 'images';
    // Update 'version' if you need to refresh the caches
    var version = 'v1';

    // Store core files in a cache (including a page to display when offline)
    var updateStaticCache = function() {
        return caches.open(version + staticCacheName)
            .then(function (cache) {
                return cache.addAll([
                    '/assets/css/base.min.css',
                    '/assets/css/main.min.css',
                    '/assets/images/logo-pink.svg',
                    '/assets/plugins/embed/css/embed.css',
                    '/assets/plugins/embed/js/embed.js',
                    '/assets/plugins/imageset/css/imageset.min.css',
                    '/assets/plugins/imageset/js/dist/imageset.js',
                    '/assets/images/sectionseparator.svg',
                    '/assets/images/fb.svg',
                    '/assets/images/tw.svg',
                    '/assets/images/yt.svg',
                    '/assets/fonts/FuturaStd-ExtraBoldOblique.woff2',
                    '/assets/fonts/FuturaStd-LightOblique.woff2',
                    '/assets/fonts/FuturaStd-Light.woff2',
                    '/assets/fonts/FuturaStd-ExtraBold.woff2',
                    '/assets/fonts/FuturaStd-ExtraBoldOblique.woff',
                    '/assets/fonts/FuturaStd-LightOblique.woff',
                    '/assets/fonts/FuturaStd-Light.woff',
                    '/assets/fonts/FuturaStd-ExtraBold.woff',
                    '/assets/images/rounds.svg',
                    '/assets/images/articles.svg',
                    '/assets/images/podcast.svg',
                    '/assets/images/help.svg',
                    '/assets/images/star-yellow.svg',
                    '/assets/images/star-white.svg'
                ]);
            });
    };

    // Put an item in a specified cache
    var stashInCache = function (cacheName, request, response) {
        caches.open(cacheName)
            .then(function (cache) {
                cache.put(request, response);
            });
    };

    // Limit the number of items in a specified cache.
    var trimCache = function (cacheName, maxItems) {
        caches.open(cacheName)
            .then(function (cache) {
                cache.keys()
                    .then(function (keys) {
                        if (keys.length > maxItems) {
                            cache.delete(keys[0])
                                .then(trimCache(cacheName, maxItems));
                        }
                    });
            });
    };

    // Remove caches whose name is no longer valid
    var clearOldCaches = function() {
        return caches.keys()
            .then(function (keys) {
                return Promise.all(keys
                    .filter(function (key) {
                      return key.indexOf(version) !== 0;
                    })
                    .map(function (key) {
                      return caches.delete(key);
                    })
                );
            })
    };

    self.addEventListener('install', function (event) {
        event.waitUntil(updateStaticCache()
            .then(function () {
                return self.skipWaiting();
            })
        );
    });

    self.addEventListener('activate', function (event) {
        event.waitUntil(clearOldCaches()
            .then(function () {
                return self.clients.claim();
            })
        );
    });

    // See: https://brandonrozek.com/2015/11/limiting-cache-service-workers-revisited/
    self.addEventListener('message', function(event) {
      if (event.data.command == 'trimCaches') {
        trimCache(version + pagesCacheName, 35);
        trimCache(version + imagesCacheName, 20);
      }
    });

    self.addEventListener('fetch', function (event) {
        var request = event.request;
        // For non-GET requests, try the network first, fall back to the offline page
        if (request.method !== 'GET') {
            event.respondWith(
                fetch(request)
                    .catch(function () {
                        return caches.match('/offline');
                    })
            );
            return;
        }

        // For HTML requests, try the network first, fall back to the cache, finally the offline page
        if (request.headers.get('Accept').indexOf('text/html') !== -1) {
            // Fix for Chrome bug: https://code.google.com/p/chromium/issues/detail?id=573937
            if (request.mode != 'navigate') {
                request = new Request(request.url, {
                    method: 'GET',
                    headers: request.headers,
                    mode: request.mode,
                    credentials: request.credentials,
                    redirect: request.redirect
                });
            }
            event.respondWith(
                fetch(request)
                    .then(function (response) {
                        // NETWORK
                        // Stash a copy of this page in the pages cache
                        var copy = response.clone();
                        var cacheName = version + pagesCacheName;
                        stashInCache(cacheName, request, copy);
                        return response;
                    })
                    .catch(function () {
                        // CACHE or FALLBACK
                        return caches.match(request)
                            .then(function (response) {
                                return response || caches.match('/offline.html');
                            })
                    })
            );
            return;
        }

        // For non-HTML requests, look in the cache first, fall back to the network
        event.respondWith(
            caches.match(request)
                .then(function (response) {
                    // CACHE
                    return response || fetch(request)
                        .then(function (response) {
                            // NETWORK
                            // If the request is for an image, stash a copy of this image in the images cache
                            // if (request.headers.get('Accept').indexOf('image') !== -1) {
                            //     var copy = response.clone();
                            //     var cacheName = version + imagesCacheName;
                            //     stashInCache(cacheName, request, copy);
                            // }
                            return response;
                        })
                        .catch(function () {
                            // OFFLINE
                            // If the request is for an image, show an offline placeholder
                            if (request.headers.get('Accept').indexOf('image') !== -1) {
                                return new Response('<svg role="img" aria-labelledby="offline-title" viewBox="0 0 400 400" xmlns="http://www.w3.org/2000/svg"><title id="offline-title">Offline</title><g fill="none" fill-rule="evenodd"><path fill="#ccc" d="M0 0h400v300H0z"/><text fill="#000" font-family="Helvetica Neue,Arial,Helvetica,sans-serif" font-size="72" font-weight="bold"><tspan x="93" y="172">offline</tspan></text></g></svg>', { headers: { 'Content-Type': 'image/svg+xml' }});
                            }
                        });
                })
        );
    });

})();