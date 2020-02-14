<?php if($pagination->hasPages()): ?>
  <nav class="pagination-container">
  <div class="chronofooter">

    <?php if($pagination->hasPrevPage()): ?>
    <div class="chronofooter__text">

      <a href="<?= $pagination->prevPageURL() ?>" rel="prev" title="newer articles">
        <h3>
        <?php echo t('forwarddash') ?>
        </h3>
      </a>
      </div>
    <?php else: ?>
    <div class="chronofooter__text">
    <a href="#">

            <h3>Game Over</h3>
        </a>
    </div>
    <?php endif ?>
    <div class="chronofooter__bar--double"></div>

    <?php if($pagination->hasNextPage()): ?>
        <div class="chronofooter__text">
        <a href="<?= $pagination->nextPageURL() ?>" rel="next" title="Anciens podcasts">

                <h3>
                <?php echo t('backdash') ?>
</h3>
            </a>
        </div>

    <?php else: ?>
    <div class="chronofooter__text">
    <a href="#" rel="next" title="Anciens podcasts">

            <h3>Game over</h3>
        </a>
    </div>
    <?php endif ?>
    </div>

  </nav>
<?php endif ?>