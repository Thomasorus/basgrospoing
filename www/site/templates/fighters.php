<?php snippet('header') ?>

<?php $fighters = $pages->find('fighters/') ?>
<main>

<section>
<div class="fighters-title">
<h1>Fighters</h1>

</div>
<div class="fighters">

<?php foreach($page->children()->listed() as $fighter){
pattern('organisms/fighterround', ["fighter" => $fighter]);

}
?>
</div>
</section>
</main>


<?php snippet('footer') ?>
