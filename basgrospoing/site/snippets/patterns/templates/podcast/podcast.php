<main>
    <section>
       <div class="giant-container">
       <h2 class="heading-giant">
            Podcast
        </h2>
       </div>
        <article class="podcast">
            <div class="podcast__poster">
                <?php if($image =  $podcast->Podcastposter()->toFile()): ?>
                <div class="bg-lazy">
                    <?php 
                        if($podcast->Podcastposter()->toFile()): ?>
                       <img srcset="<?= $podcast->podcastimage()->toFile()->srcset([
                            '420w' => [
                                'width' => 410,
                                'height' => 430,
                                'crop' => 'center'
                            ],
                            '613w' => [
                                'width' => 600,
                                'height' => 430,
                                'crop' => 'center'
                            ],
                            '710w' => [
                                'width' => 700,
                                'height' => 430,
                                'crop' => 'center'
                            ],
                            '926w' => [
                                'width' => 550,
                                'height' => 530,
                                'crop' => 'center'
                            ],
                                '1920w' => [
                                'width' => 320,
                                'height' => 430,
                                'crop' => 'center'
                            ]
                            ]) ?>" 
                            />
                        <?php endif ?>
                </div>
                <?php else: ?>
                <span class="bg-img" style="background-image: url('<?php  echo $podcast->Podcastposterold(); ?>')"></span>
                <?php endif?>
            </div>
            <div class="podcast-title">
                <h1 class="underline-m--green">
                    <?php  echo $podcast->Title(); ?>
                </h1>

            </div>

            <div class="podcast__date">
                <p>
                    <small>
                        <?php echo t('published') ?> 
                        <?php echo $podcast->Date()->toDate('d/m/Y'); ?>
                        
                    </small>
                </p>
            </div>
            <div class="podcast__text">
                <?php  echo $podcast->text()->kirbytext(); ?>
            </div>
            <div class="podcast__player">
                <h5>
                <?php echo t('listen podcast') ?> 
                    </h4>
                    <div class="podcast-player">
                        <?php 
                            //If old podcast
                            if($podcast->isOldPodcast()->bool()) {
                                $audioFile = $podcast->podcastLink();
                                snippet('patterns/molecules/audioplayer/audioplayer', ['audioFile' => $audioFile]);
                            }
                        ?>
                        <?php 
                            //If new podcast
                            $audioFiles = array();
                            if($page->hasAudio()) {
                                foreach($page->audio() as $audio) {
                                    $audioFiles[] = "https://dts.podtrac.com/redirect.mp3/basgrospoing.fr/fr/podcasts/" . $page->uid() . '/' . $audio->filename();
                                }
                            } 
                            foreach ($audioFiles as $audioFile) {
                                snippet('patterns/molecules/audioplayer/audioplayer', ['audioFile' => $audioFile]);
                            }  
                        ?>
                    </div>
            </div>

            <?php if($podcast->isOldPodcast()->bool()): ?>
            <div class="podcast__download">

                <a href="<?php echo $podcast->podcastLink(); ?>">

                    <img src="/assets/images/download-arrow.svg" alt="Télécharger" class="underline-s--pink podcast-arrow">
                    <h5>
                    <?php echo t('download') ?> 
                    </h5>
                </a>
            </div>
            <?php else: ?>
            <?php foreach ($audioFiles as $audioFile) : ?>
            <div class="podcast__download">
                <a href="<?php echo $audioFile; ?>">
                    <img src="/assets/images/download-arrow.svg" alt="Télécharger" class="underline-s--pink podcast-arrow">
                    <h5>
                    <?php echo t('download') ?> 
                    </h5>
                </a>
            </div>
            <?php endforeach; ?>
            <?php endif ?>

        </article>

    </section>
</main>