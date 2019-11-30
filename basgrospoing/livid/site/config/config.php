<?php

/*

---------------------------------------
License Setup
---------------------------------------

Please add your license key, which you've received
via email after purchasing Kirby on http://getkirby.com/buy

It is not permitted to run a public website without a
valid license key. Please read the End User License Agreement
for more information: http://getkirby.com/license

*/


// c::set('license', 'K2-PERSONAL-53be32be7b06f7741780c1e843a7b37d');
return [
    'debug'  => true
];// c::set('seo.controller.path', kirby()->roots()->controllers() . DS . 'seo');
// c::set('seo.field.key', 'seo');
c::set('cache', false);
// c::set('cache.driver', 'file');

// s::$cookie['lifetime'] = 0; // don't let the cookie ever expire

/*

---------------------------------------
Kirby Configuration
---------------------------------------

By default you don't have to configure anything to
make Kirby work. For more fine-grained configuration
of the system, please check out http://getkirby.com/docs/advanced/options

*/

//ROUTES
c::set('routes', array(
  array(
    'pattern' => '(:any)',
    'action'  => function($uid) {

      $page = page($uid);

      if(!$page) $page = page('blog/' . $uid);
      if(!$page) $page = site()->errorPage();

      return site()->visit($page);

    }
  ),
  array(
    'pattern' => 'blog/(:any)',
    'action'  => function($uid) {
      go($uid);
    }
  )

));