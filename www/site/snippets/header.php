<!doctype html>
<html prefix="og: http://ogp.me/ns#" lang="<?= site()->language()->code()?>">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#1FD316">
  <link rel="alternate" type="application/rss" title="Latest articles" href="<?= site()->url() ?>/feed"/>
  <title>
    <?php if($page->seotitle()->isnotEmpty()) {
        echo $page->seotitle();
    }
    else {
      echo $page->Title();
    } ?>
  </title>
  <meta name="description" content="
    <?php if($page->seodescription()->isnotEmpty()) {
        echo $page->seodescription();
    }else if($page->introtext()->isnotEmpty()){
      echo $page->introtext()->excerpt($chars = 240, $strip = true, $rep = '…');
    } else {
      echo $page->text()->excerpt($chars = 240, $strip = true, $rep = '…');

    }
    
    ?>">
  <?php echo $page->metaTags() ?>









<!-- COUPURE -->
  <link rel="preload" href="/assets/css/base.css?v=1.0.12" as="style">
  <link rel="stylesheet" href="/assets/css/base.css?v=1.0.12">
  <link rel=“preload” href="/assets/fonts/FuturaStd-ExtraBoldOblique.woff2" as=“font” type="font/woff2" crossorigin="anonymous">
  <link rel=“preload” href="/assets/fonts/FuturaStd-ExtraBold.woff2" as=“font” type="font/woff2" crossorigin="anonymous">
  <link rel=“preload” href="/assets/fonts/BauerBodoniStd-Italic.woff2" as=“font” type="font/woff2" crossorigin="anonymous">
  <link rel=“preload” href="/assets/fonts/FuturaStd-LightOblique.woff2" as=“font” crossorigin="anonymous">
  <link rel=“preload” href="/assets/fonts/FuturaStd-Light.woff2" as=“font” type="font/woff2" crossorigin="anonymous">




  <!-- Theme switcher -->
  <script>
    //Change theme
    function toggleDarkLight() {
      var hasTheme = document.documentElement.hasAttribute('theme') ? true : false;
      if (hasTheme == false) {
        document.documentElement.setAttribute('theme', 'dark');
        localStorage.setItem("theme", "dark");

      }
      if (hasTheme == true) {
        {
          document.documentElement.removeAttribute('theme');
          localStorage.setItem("theme", "light");

        }
      }
    }

    function setThemeFromCookie() {
      var hasTheme = document.documentElement.hasAttribute('theme') ? true : false;
      var value = localStorage.getItem("theme");
      if (hasTheme == true && value == "light") {
        document.documentElement.setAttribute('theme', 'light');
        localStorage.setItem("theme", "light");
      }
      if (hasTheme == false && value == "dark") {
        document.documentElement.setAttribute('theme', 'dark');
        localStorage.setItem("theme", "dark");
      }

    }
    (function () {
      setThemeFromCookie()
    })();
  </script>
</head>

<body>
  <header>
    <?php snippet('menu') ?>
  </header>