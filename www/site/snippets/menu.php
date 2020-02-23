
<nav class="main-menu" id="<?php if($page->famille() == " magazine") { echo $page->famille(); } ?>">
  <div class="main-menu__container">
    <ul>
      <?php if($kirby->language() == "fr") : ?>
      <?php $count = 0; foreach($pages->listed() as $item): ?>
      <?php $count ++; if($count == 3): ?>
      <li class="menu__logo" id="logo">
        <a href="/<?php echo $kirby->language() ?>/">
          <img src="/assets/images/logo-pink.svg" alt="logo">
        </a>
      </li>
      <li class="menu__item" <?=r($item->isOpen(), "id='active'") ?>>
        <a href="<?= $item->url() ?>">
          <span>
            <?= $item->title()->html() ?></span>
          <i class="<?php echo $item->title()->html()->lower();?>"></i>
        </a>
      </li>
      <?php elseif($count != 3): ?>
      <li class="menu__item" <?=r($item->isOpen(), "id='active'") ?>>
        <a href="<?= $item->url() ?>">
          <span>
            <?= $item->title()->html() ?></span>
          <i class="<?php echo $item->title()->html()->lower();?>"></i>
        </a>
      </li>
      <?php endif ?>
      <?php endforeach ?>
      <li class="menu__item" <?=r($item->isOpen(), "id='active'") ?>>
        <a href="<?php echo t('about') ?>" target="_blank" rel="noopener">
          <span>
            <?php echo t('soutenez') ?>
          </span>
          <i class="help"></i>
        </a>
      </li>
      <?php endif ?>
      <?php if($kirby->language() == "en") : ?>
        <?php foreach($pages->listed() as $item): ?>
        <?php if($item->title() == "Articles"): ?>
        <li class="menu__item" <?=r($item->isOpen(), "id='active'") ?>>
          <a href="<?= $item->url() ?>">
            <span>
              <?= $item->title()->html() ?></span>
            <i class="<?php echo $item->title()->html()->lower();?>"></i>
          </a>
        </li>
        <li class="menu__logo" id="logo">
          <a href="/<?php echo $kirby->language() ?>/">
            <img src="/assets/images/logo-pink.svg" alt="logo">
          </a>
        </li>


        <?php endif ?>
     
      <?php endforeach ?>
      <li class="menu__item" <?=r($item->isOpen(), "id='active'") ?>>
        <a href="<?php echo t('about') ?>" target="_blank" rel="noopener">
          <span>
            <?php echo t('soutenez') ?>
          </span>
          <i class="help"></i>
        </a>
      </li>
      <?php endif ?>


    </ul>

  </div>
  <div id="Reading-progress">
    <h5>
      <?php echo $page->title() ?>
    </h5>
    <span id="Progress-bar" class="bar">

    </span>
  </div>

</nav>


