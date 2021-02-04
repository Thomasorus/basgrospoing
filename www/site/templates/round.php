<?php snippet('header') ?>
<main>
<section class="[ wrapper ] [ flow-s1 ]" aria-label="<?= $round->title(); ?>">
            <!--Header Round-->
            <?php  snippet('patterns/molecules/sectionhead/sectionhead', ['title' => $round]);?>

            <?php if($round->doublelayout == true): ?>
                <!-- If article and podcast, add a special grid -->
                <div class="grid-2-1 flow-colors">
                <?php 
                    foreach($round->magazine->data as $page) {
                        $image = $page->magazineimage();
                        snippet('patterns/molecules/card/card', ["entry" => $page, "image" => $image, "srcset" => "magazinecard" ]);
                    }
                    foreach($round->historique->data as $page) {
                        $image = $page->podcastimage();
                        snippet('patterns/molecules/card/card', ["entry" => $page, "image" => $image, "srcset" => "podcastcard" ]);
                    }
                ?>
                </div>
            <?php endif; ?>

           
            <?php if($round->doublelayout == false): ?>
                 <!-- Historic or magazine only -->
                <?php  if($round->historique->data != null):?>
                    <div class="grid-1-2 flow-colors">
                        <?php
                            foreach($round->historique as $page) {
                                $image = $page->podcastimage();
                                snippet('patterns/molecules/card/card', ["entry" => $page, "image" => $image, "srcset" => "podcastcard" ]);
                                snippet('patterns/organisms/punchlinecard/punchlinecard', ["punchline" => $page, "class" => ""]);
                            }
                        ?>
                    </div>
                <?php endif; ?>
                <?php if($round->magazine->data != null): ?>
                    <div class="grid-2-1 flow-colors">
                        <?php 
                            foreach($round->magazine->data as $page) {
                                $image = $page->magazineimage();
                                snippet('patterns/molecules/card/card', ["entry" => $page, "image" => $image, "srcset" => "magazinecard" ]);
                                snippet('patterns/organisms/punchlinecard/punchlinecard', ["punchline" => $page, "class" => ""]);
                            }
                        ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
           
            
            <div class="grid-1-1 flow-colors">
                <!-- Non magazine or historic -->
                <?php 
                    foreach($round->others->data as $page) {
                        $image = $page->archiveimage();
                        snippet('patterns/molecules/card/card', ["entry" => $page, "image" => $image, "srcset" => "magazinecard" ]);
                    }
                ?>
            </div>
        </section>
</main>

<?php snippet('footer') ?>
