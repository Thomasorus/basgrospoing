<div class="<?php echo $color; ?>">
  <section>
    <?php snippet('patterns/molecules/chronohead/chronohead',  ['name' => $header]);?>
    <div class="chrono-grid">
      <?php foreach($entries as $entry) {
          snippet('patterns/organisms/chrono/chrono', ['articlechrono' => $entry]);
        }?>
    </div>
    <?php snippet('patterns/molecules/chronofooter/chronofooter', ['name' => $footer, 'link' => $link]); ?>
  </section>
</div>