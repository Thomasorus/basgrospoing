<?php snippet('header') ?>

<main>
    <article>
        <div class="opinion_head">
            <div class="opinion__titles">
                <h1><?php  echo $page->title(); ?></h1>
            </div>
        </div>
        <div class="article__content">
            <?= $page->text()->kirbytext() ?>
        </div>
    </article>
</main>
<?php snippet('footer') ?>