<nav class="main-menu" id="menu-color">
<ul>
   <li class="menu__logo" >
    <a href="/">
    <img loading="lazy"  src="/assets/images/logo-pink.svg" alt="logo" id="logo">
    </a>
  </li>
  <?php foreach($pages->listed() as $item): ?>
  <li class="menu__item<?= r($item->isOpen(), ' is-active') ?>">
    <a href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
  </li>
 <?php endforeach ?>
</ul>
</nav>
