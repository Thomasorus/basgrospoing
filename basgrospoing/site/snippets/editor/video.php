<div class="magazine-container">

<?php if ($iframe): ?>
<figure class="iframe-embed"<?= attr(['class' => $attrs->css()->value()], ' ') ?>>
  <?= $iframe ?>
  <?php if ($attrs->caption()->isNotEmpty()): ?>
  <figcaption><?= $attrs->caption() ?></figcaption>
  <?php endif ?>
</figure>
<?php endif ?>
</div>