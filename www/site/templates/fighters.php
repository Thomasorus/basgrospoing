<?php snippet('header') ?>

<?php $fighters = $pages->find('fighters/') ?>
<main>

<section>
<div class="fighters-title">
    <h1>
        <?php echo $page->title(); ?>
    </h1>
</div>
    <div class="fighters">
        <?php foreach($page->children()->listed() as $fighter){
            snippet('patterns/organisms/fighterround/fighterround', ["fighter" => $fighter]);
        }
    ?>
    </div>
</section>
</main>


<?php snippet('footer') ?>
