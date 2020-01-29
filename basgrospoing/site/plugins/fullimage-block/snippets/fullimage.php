<div class="magazine__full-img white-bg">
<figure<?= attr(['class' => $attrs->css()->value()], ' ') ?>>
  <?php if ($attrs->link()->isNotEmpty()): ?>
  <a href="<?= $attrs->link()->toUrl() ?>">
    <img srcset="<?= $attrs->id()->toFile()->srcset([300, 600, 800, 1600]) ?>" />
  </a>
  <?php else: ?>
    <img srcset="<?= $attrs->id()->toFile()->srcset([300, 600, 800, 1600]) ?>" />
  <?php endif ?>
  <?php if ($attrs->caption()->isNotEmpty()): ?>
  <figcaption class="magazine__sub-image-citation">
    <small>
    <?= $attrs->caption() ?>
    </small>
  </figcaption>
  <?php endif ?>
</figure>
</div>