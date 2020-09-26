        <article id="magazine">
            <div class="magazine__head white-bg">
                <img loading="lazy"  aria-hidden="true" srcset="<?= $page->coverimage()->toFile()->srcset([
                    '550w' => [
                        'width' => 549,
                        'height' => 976,
                        'crop' => 'center'
                    ],
                    '999w' => [
                        'width' => 1000,
                        'height' => 1000,
                        'crop' => 'center'
                    ],
                    '1920w' => [
                        'width' => 1920,
                        'height' => 1080,
                        'crop' => 'center'
                    ]
                ]) ?>" />
            </div>
            
             <div class="magazine__titles">
                    <h1 class="underline-m--pink"><?php  echo $article->title(); ?></h1>
                </div>
          
            <div class="magazine__content">
            
            <div class="magazine__date">
                <p> 
                    <small>
                    <?php echo t('published') ?> 

                    <?php echo $article->Date()->toDate('d/m/Y'); ?></small>
                </p>
            </div>
                <em><?= $page->introtext()->kirbytextinline() ?></em>
                <p class="article__fight">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Calque_1" viewBox="0 0 89.5 59.9"><style>.st0{fill:#dadada}.st1{fill:#706f6f}</style><path id="XMLID_61_" class="st0" d="M29.7 59.9L44 44l17.2 12.5-8.4-17.2 14.8 1.9-10.4-8.7 14.2-6.9-15.7-2 14-10.8-16.2 3.9L56.4 0 43 15l-3.4-9.6-2.2 10.7L18.8 3.6l11.5 16.5-16-1.1 13.3 9-20 4.1 23.6 3.6-17.1 15.6 22-11.3z"/><g id="XMLID_3_"><g id="XMLID_146_"><path id="XMLID_158_" class="st1" d="M3.2 26.3l11.5-1.4-.8 5-5.2.6-.3 1.8 4.6-.5-.7 4.6-4.6.5-1 6.1-6.3.7 2.8-17.4z"/><path id="XMLID_156_" class="st1" d="M15.9 24.7l6.2-.8-2.7 17.6-6.2.7 2.7-17.5z"/><path id="XMLID_154_" class="st1" d="M40.9 28.8c-.5 2.9-.8 5.3-3.2 7.8-2.1 2.3-5.1 3.7-7.8 4-5.2.6-8.9-2.2-8.1-7.9.9-5.8 5.5-9.7 10.9-10.4 3-.4 6.9.7 7.7 3.5l-6.2 2.9c-.3-.8-1.2-1.2-2.2-1.1-2.2.3-3.8 2.4-4.1 4.5-.3 1.9.6 3.6 2.6 3.4 1-.1 2.3-.7 2.8-1.8l-2.8.3.6-4.2 9.8-1z"/><path id="XMLID_152_" class="st1" d="M43 21.4l6-.7-.9 6 3.8-.5.9-6 6-.7-2.7 17.9-6 .7.9-6.2-3.8.4-.9 6.2-6 .7L43 21.4z"/><path id="XMLID_150_" class="st1" d="M59.3 19.4l13.1-1.6-.9 5.9-3.4.2-1.9 12.3-6.2.7 1.9-12.3-3.5.6.9-5.8z"/><path id="XMLID_147_" class="st1" d="M86.1 31.3c-.3 1.9-2.2 3.2-3.8 3.4-1.7.2-3.2-.7-2.9-2.6.3-1.9 2.2-3.2 3.8-3.4 1.7-.2 3.2.7 2.9 2.6zm-5.7-3.5l1.8-12.4 6-.7-1.8 12.4-6 .7z"/></g></g></svg>
                </p>
                <?php # /site/templates/yourtemplate.php
                    foreach($page->text()->toBuilderBlocks() as $block):
                    snippet('blocks/' . $block->_key(), array('data' => $block));
                    endforeach;
                    ?>
                <?php snippet('patterns/molecules/article-footer/article-footer'); ?>


            </div>

    </article>

