<?php snippet('header') ?>

<main>
<section>
<?php $podcasts = $pages->find('/podcasts')->children()->visible()->filterBy('author', $page->name())->sortBy('date', 'desc');
$articles = $pages->find('/articles')->children()->visible()->filterBy('author', $page->name())->sortBy('date', 'desc');
?>


  <h1><?php echo $page->name()->html() ?></h1>

  <figure>
    <img src="<?php echo $page->photo()->toFile()->url() ?>">
  </figure>

<?php if($articles->count() > 0): ?>
  <h2>Articles</h2>
  <ul>
    <?php foreach($articles as $article): ?>
    <li><a href="<?php echo $article->url() ?>"><?php echo $article->title() ?></a></li>
    <?php endforeach ?>
  </ul>
<?php endif ?>
<?php if($podcasts->count() > 0): ?>

  <h2>Podcasts</h2>
  <ul>
    <?php foreach($podcasts as $podcast): ?>
    <li><a href="<?php echo $podcast->url() ?>"><?php echo $podcast->title() ?></a></li>
    <?php endforeach ?>
  </ul>
<?php endif ?>



    </section>
</main>





<?php snippet('footer') ?>
