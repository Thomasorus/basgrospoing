<?php snippet('header') ?>

<main>
    <section>
        <?php snippet('patterns/molecules/sectionhead/sectionhead', ['title' => $page->title()]); ?>
        <div class="other-grid">
        <?php foreach($articles as $other): 
            snippet('patterns/organisms/othercard/othercard', ['other' => $other]);?>
        <?php endforeach ?>
        </div>

    </section>
    <?php snippet('pagination') ?>
</main>

<?php snippet('footer') ?>