<?php snippet('header') ?>


<main>
  <section>
    <!--Header Round-->
    <?php snippet('patterns/molecules/sectionhead/sectionhead', ['title' => $page->title()]); ?>
    <nav class="categories-menu">
      <ul>
        <?php foreach($categories as $cat): ?>
        <li class="menu__item">
          <a href="<?php echo url($kirby->language() . '/podcasts/cat:' . $cat)?>">

            <?php echo html($cat) ?>
          </a>
        </li>
        <?php endforeach ?>
      </ul>
    </nav>

    <div class="podcast-grid">
      <?php 
          foreach($podcasts as $podcast) {
              snippet('patterns/organisms/podcastcard/podcastcard', ["podcast" => $podcast]);
          }
      ?>
    </div>
  </section>
  <?php snippet('pagination') ?>

</main>

<?php snippet('footer') ?>