<?php snippet('header') ?>


<main class="flow-s4">
    <section class="[ wrapper ] [ flow-s1 ]">
    <?php snippet('patterns/molecules/sectionhead/sectionhead', ['title' => $page->title()]); ?>
    <nav class="categories-menu">
      <ul role="list">
        <?php foreach($categories as $cat): ?>
        <li class="menu__item">
          <a href="<?php echo url($kirby->language() . '/podcasts/cat:' . $cat)?>">

            <?php echo html($cat) ?>
          </a>
        </li>
        <?php endforeach ?>
      </ul>
    </nav>

    <div class="grid-1-1-1 flow-colors">
      <?php 
          foreach($podcasts as $podcast) {
            $image = $podcast->podcastimage();
            snippet('patterns/molecules/card/card', ["entry" => $podcast, "image" => $image, "srcset" => "podcastcard" ]);
          }
      ?>
    </div>
  </section>
  <?php snippet('pagination') ?>

</main>

<?php snippet('footer') ?>