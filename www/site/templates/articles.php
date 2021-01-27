<?php snippet('header') ?>

<main class="flow-s4">
    <section class="[ wrapper ] [ flow-s1 ]" data-state="larger">
        <?php snippet('patterns/molecules/sectionhead/sectionhead', ['title' => $page->title()]); ?>
        <div class="grid-1-1 flow-colors">
        <?php foreach($articles as $other): 
            $image = $other->archiveimage();
            snippet('patterns/molecules/card/card', ["entry" => $other, "image" => $image, "srcset" => "magazinecard" ]);?>
        <?php endforeach ?>
        </div>

    </section>
    <?php snippet('pagination') ?>
</main>

<?php snippet('footer') ?>