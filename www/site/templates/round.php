<?php snippet('header') ?>
<main>
<section class="[ wrapper ] [ flow-s1 ]">
            <!--Header Round-->
            <?php  snippet('patterns/molecules/sectionhead/sectionhead', ['title' => $round]); 
            echo $round->doublelayout;
            ?>

            <!-- If article and podcast, add a special grid -->
            <?php if($round->doublelayout == true): ?>
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

            <!-- Historic or magazine only -->
            <?php if($round->doublelayout == false): ?>
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
           
            <!-- Non magazine or historic -->
            <div class="grid-1-1 flow-colors">
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
