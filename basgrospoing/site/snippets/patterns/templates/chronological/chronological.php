<div class="section-colored">
  <section>
    <?php snippet('patterns/molecules/chronohead/chronohead',  ['name' => $header]);?>

    <div class="chrono-grid">

      <?php foreach($articleschrono as $articlechrono) {
                        snippet('patterns/organisms/articleschrono/articleschrono', ['articlechrono' => $articlechrono]);
        }?>
    </div>
    <?php snippet('patterns/molecules/chronofooter/chronofooter', ['name' => $footer]); ?>

  </section>
</div>