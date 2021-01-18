<?php snippet('header') ?>
<main>

    <?php 
    foreach($rounds as $round): ?>
        <section>
            <!--Header Round-->
            <?php  snippet('patterns/molecules/sectionhead/sectionhead', ['title' => $round]); 
            echo $round->doublelayout;
           
            ?>

            <!-- If article and podcast, add a special grid -->
            <?php if($round->doublelayout == true): ?>
                <div class="magazine-grid">
                <?php 
                    foreach($round->historique->data as $page) {
                        snippet('patterns/organisms/podcastcard/podcastcard', ["podcast" => $page]);
                    }
                    foreach($round->magazine->data as $page) {
                        snippet('patterns/organisms/articlecard/articlecard', ["magazine" => $page]);
                    }
                ?>
                </div>
            <?php endif; ?>

            <!-- Historic or magazine only -->
            <?php if($round->doublelayout == false): ?>
                <?php  if($round->historique->data != null):?>
                    <div class="historique-grid">
                        <?php
                            foreach($round->historique as $page) {

                                snippet('patterns/organisms/podcastcard/podcastcard', ["podcast" => $page]);
                                snippet('patterns/organisms/punchlinecard/punchlinecard', ["punchline" => $page, "class" => ""]);
                            }
                        ?>
                    </div>
                <?php endif; ?>
                <?php if($round->magazine->data != null): ?>
                    <div class="magazine-grid">
                        <?php 
                            foreach($round->magazine->data as $page) {
                                snippet('patterns/organisms/articlecard/articlecard', ["magazine" => $page]);
                                snippet('patterns/organisms/punchlinecard/punchlinecard', ["punchline" => $page, "class" => ""]);
                            }
                        ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
           
            <!-- Non magazine or historic -->
            <div class="other-grid">
                <?php 
                    foreach($round->others->data as $page) {
                        snippet('patterns/organisms/othercard/othercard', ['other' => $page]);
                    }
                ?>
            </div>

        </section>
    <?php endforeach; ?>
</main>

<?php snippet('footer') ?>
