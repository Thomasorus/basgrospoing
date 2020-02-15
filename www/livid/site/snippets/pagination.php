<?php if($pagination->hasPages()): ?>
  <nav class="pagination wrap cf">

    <?php if($pagination->hasPrevPage()): ?>
      <a class="pagination-item left" href="<?= $pagination->prevPageURL() ?>" rel="prev" title="newer articles">
        <svg viewBox="0 0 24 12"><path d="M1.94 6a28.38 28.38 0 0 0 8-4.47L8.71 5h12.23v2H8.71L10 10.47A28.4 28.4 0 0 0 1.94 6z"/></svg>
      </a>
    <?php else: ?>
      <span class="pagination-item left is-inactive">
      <svg viewBox="0 0 24 12"><path d="M1.94 6a28.38 28.38 0 0 0 8-4.47L8.71 5h12.23v2H8.71L10 10.47A28.4 28.4 0 0 0 1.94 6z"/></svg>
      </span>
    <?php endif ?>

    <?php if($pagination->hasNextPage()): ?>
      <a class="pagination-item right" href="<?= $pagination->nextPageURL() ?>" rel="next" title="older articles">
     <svg viewBox="0 0 24 12"><path d="M22 6a28.38 28.38 0 0 1-8-4.47L15.22 5H3v2h12.22L14 10.47A28.4 28.4 0 0 1 22 6z"/></svg>
      </a>
    <?php else: ?>
      <span class="pagination-item right is-inactive">
      <svg viewBox="0 0 24 12"><path d="M22 6a28.38 28.38 0 0 1-8-4.47L15.22 5H3v2h12.22L14 10.47A28.4 28.4 0 0 1 22 6z"/></svg>
      </span>
    <?php endif ?>

  </nav>
<?php endif ?>