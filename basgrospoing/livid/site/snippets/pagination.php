<?php if($pagination->hasPages()): ?>
  <nav class="pagination wrap cf">

    <?php if($pagination->hasPrevPage()): ?>
      <a class="pagination-item left" href="<?= $pagination->prevPageURL() ?>" rel="prev" title="newer articles">
        <? $image = new Kirby\Image\image('assets/images/arrow-left.svg'); ?>
      </a>
    <?php else: ?>
      <span class="pagination-item left is-inactive">
      <? $image = new Kirby\Image\image('assets/images/arrow-left.svg'); ?>
      </span>
    <?php endif ?>

    <?php if($pagination->hasNextPage()): ?>
      <a class="pagination-item right" href="<?= $pagination->nextPageURL() ?>" rel="next" title="older articles">
      <? $image = new Kirby\Image\image('assets/images/arrow-left.svg'); ?>
      </a>
    <?php else: ?>
      <span class="pagination-item right is-inactive">
      <? $image = new Kirby\Image\image('assets/images/arrow-left.svg'); ?>
      </span>
    <?php endif ?>

  </nav>
<?php endif ?>