<figure class="magazine__imageleft" <?= attr(['class' => $attrs->css()->value()], ' ') ?>>
  <?php if ($attrs->link()->isNotEmpty()): ?>
  <a href="<?= $attrs->link()->toUrl() ?>">
    <img srcset="<?= $attrs->id()->toFile()->srcset([300, 600, 800]) ?>" />
  </a>
  <?php else: ?>
    <img srcset="<?= $attrs->id()->toFile()->srcset([300, 600, 800]) ?>" />
  <?php endif ?>
  <?php if ($attrs->caption()->isNotEmpty()): ?>
  <figcaption class="magazine__sub-image-citation">
    <small>
    <?= $attrs->caption() ?>
    </small>
  </figcaption>
  <?php endif ?>
</figure>