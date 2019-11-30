      <?php // fetch all categories
$categories = $pages->children()->visible()->pluck('Category', ',', true);
?>

  <?php foreach($categories as $cat): ?>
  <li>
    <a href="<?php echo url('/cat:' . $cat)?>">
      <?php echo html($cat) ?>
    </a>
  </li>
  <?php endforeach ?>

