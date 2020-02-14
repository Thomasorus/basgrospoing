<?php snippet('header') ?>

<main>
  <section>
            <h1><?= $page->title()->html() ?></h1>
        <?= $page->text()->kirbytext() ?>

  </section>


<?php snippet('footer') ?>