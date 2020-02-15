<!doctype html>
<html lang="<?= site()->language() ? site()->language()->code() : 'fr' ?>">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <title><?php echo $site->title()->html() ?></title>
  <meta name="description" content="<?php $site->description()->kirbytext() ?>">
  <?= css('assets/css/livid/livid.css') ?>

</head>
<body>


<div class="container">

  <div class="row">
    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 is-header">
      <header>
                <h1><?= $site->title()->html() ?></h1>
              </header>

    <nav role="banner">

 <ul>
    <?php foreach($pages->listed() as $item): ?>
    <li>
      <a href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
    </li>
    <?php endforeach ?>
 

 <?php snippet('menu') ?>
 </ul>

<?php echo $site->description()->kirbytext() ?>


  </nav>

</div>


    
