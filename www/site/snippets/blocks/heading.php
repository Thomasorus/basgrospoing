<div class="magazine-container">
  <div class="magazine__text">
    <<?= $level = $block->level()->or('h2') ?>>
      <?= $block->text() ?>
    </<?= $level ?>>
  </div>
</div>