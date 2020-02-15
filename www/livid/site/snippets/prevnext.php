<?php

/*

The $flip parameter can be passed to the snippet to flip
prev/next items visually:

```
<?php snippet('prevnext', ['flip' => true]) ?>
```

Learn more about snippets and parameters at:
https://getkirby.com/docs/templates/snippets

*/

$directionPrev = @$flip ? 'right' : 'left';
$directionNext = @$flip ? 'left'  : 'right';

if($page->hasNextListed() || $page->hasPrevListed()): ?>
  <nav class="pagination <?= !@$flip ?: ' flip' ?> wrap cf">

    <?php if($page->hasPrevListed()): ?>
      <a class="pagination-item <?= $directionPrev ?>" href="<?= $page->PrevListed()->url() ?>" rel="prev" title="<?= $page->PrevListed()->title()->html() ?>">
        <svg viewBox="0 0 24 12"><path d="M22 6a28.38 28.38 0 0 1-8-4.47L15.22 5H3v2h12.22L14 10.47A28.4 28.4 0 0 1 22 6z"/></svg>
      </a>
    <?php else: ?>
      <span class="pagination-item <?= $directionPrev ?> is-inactive">
        <svg viewBox="0 0 24 12"><path d="M22 6a28.38 28.38 0 0 1-8-4.47L15.22 5H3v2h12.22L14 10.47A28.4 28.4 0 0 1 22 6z"/></svg>
      </span>
    <?php endif ?>

    <?php if($page->hasNextListed()): ?>
      <a class="pagination-item <?= $directionNext ?>" href="<?= $page->nextListed()->url() ?>" rel="next" title="<?= $page->nextListed()->title()->html() ?>">
       <svg viewBox="0 0 24 12"><path d="M1.94 6a28.38 28.38 0 0 0 8-4.47L8.71 5h12.23v2H8.71L10 10.47A28.4 28.4 0 0 0 1.94 6z"/></svg>
      </a>
    <?php else: ?>
      <span class="pagination-item <?= $directionNext ?> is-inactive">
        <svg viewBox="0 0 24 12"><path d="M1.94 6a28.38 28.38 0 0 0 8-4.47L8.71 5h12.23v2H8.71L10 10.47A28.4 28.4 0 0 0 1.94 6z"/></svg>
      </span>
    <?php endif ?>

  </nav>
<?php endif ?>