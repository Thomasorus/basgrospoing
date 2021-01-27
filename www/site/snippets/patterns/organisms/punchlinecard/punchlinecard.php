<div class="[ punchline ] [ flow-s-1 ]">
  <div class="punchline__header">
    <svg width="124" id="af89c1cf-8cab-4539-95ad-be9d7bf5d31c" data-name="Calque 1"
      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 123.75 116.17">
      <defs>
        <style>
          .\30 35f686a-e290-4b55-946d-9e481c9a3a07 {
            fill: #efd61d
          }
        </style>
      </defs>
      <title>star</title>
      <path class="035f686a-e290-4b55-946d-9e481c9a3a07"
        d="M42.75 116.17L70.49 85.4 104 109.67 87.74 76.3l28.51 3.62-20.02-16.98 27.52-13.27-30.57-3.97 27.32-20.78-31.44 7.53L94.62 0 68.59 29.05 62 10.42l-4.18 20.72L21.75 6.92l22.23 32.06L13 36.92l25.72 17.37L0 62.17l45.75 7L12.5 99.42l42.67-21.81-12.42 38.56z" />
    </svg>
    <h2 class="punchline__title"><?php echo t('punchline') ?></h2>
  </div>
  <blockquote class="punchline__text flow-s0">
    <span><?php  echo $punchline->citation(); ?></span>
    <footer class="punchline__author"><?php  echo $punchline->citationAuhor(); ?></footer>
  </blockquote>
  <a class="absolute-100" href="<?php  echo $punchline->url(); ?>"></a>
</div>