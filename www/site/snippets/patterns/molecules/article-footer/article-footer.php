<?php $fighter = page('fighters')
      ->children()
      ->listed()
      ->filterBy('name', '==', $page->author())
      ->first();
    ?>
<div class="article__footer">
  <div class="article__KO">
    <span>K</span>.<span>O</span>.
  </div>
  <div class="article__author">
    <?php if($fighter != null): ?>
    <h4>
      <?php echo $fighter->title() ?>
    </h4>
    <p><small>
        <?= $fighter->shortbio()->kirbytextinline(); ?></small></p>
    <?php else: ?>
    <h4>
      <?php echo $page->author() ?>
    </h4>
    <?php endif ?>
  </div>

</div>

<div>
  <?php if($page->credits()): ?>
  <div class="article__credits">
    <p><small>
        <?php echo $page->credits()->kirbytextinline() ?></small></p>
  </div>
  <?php endif ?>
</div>
<?php if($fighter != null):
  if($fighter->kofi() == "true" && $fighter->membre() == "false"  && $kirby->language() == "en"): ?>
  <div class="article__kofi">
    <div class="article__kofi-author">
      <p>
        <?= t('kofi') ?>
      </p>
      <a href="<?= $fighter->kofiurl(); ?>">
        <svg id="Calque_1" data-name="Calque 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1057.09 391.19">
          <defs>
            <style>
              .cls-1 {
                fill: #fe5f5f;
              }

              .cls-2 {
                fill: #434b57;
              }

              .cls-3 {
                fill: #fefefe;
              }
            </style>
          </defs>
          <title>Ko-fi_Logo_Blue_1000px</title>
          <path class="cls-1" d="M173.45,476q-261.84,0-523.69.1c-4,0-4.86-.85-4.85-4.6q.18-191,0-382c0-3.75.89-4.59,4.85-4.59q523.69.15,1047.38,0c4,0,4.86.84,4.86,4.59q-.18,191,0,382c0,3.75-.89,4.6-4.86,4.6Q435.3,475.94,173.45,476Z"
            transform="translate(355.09 -84.91)" />
          <path class="cls-2" d="M107,278.68c9.09-9.71,18-19.66,27.33-29.09,16.2-16.31,32.69-32.34,49.12-48.43,8.5-8.33,18.61-7.51,23.91,1.79,3.36,5.89,2.48,11.94-2.94,17.16-16.07,15.49-32.12,31-48.47,46.19-3.84,3.57-4.16,5.64-.83,9.93,17,22,33.69,44.27,50.42,66.48,4.23,5.62,5.64,11.91,2.1,18.23s-9.32,8.76-16.45,8.2c-4.69-.37-7.87-3-10.61-6.63-16.55-21.93-33.24-43.76-49.73-65.75-2.18-2.89-3.39-3.07-5.93-.45-5.21,5.38-10.7,10.49-16.26,15.52a10.25,10.25,0,0,0-3.79,8.6c.28,11.32.22,22.66,0,34-.13,7.69-5,13.4-11.9,14.57-8.23,1.38-14.92-1.8-17.93-8.5A15.09,15.09,0,0,1,74,354.16q0-71,0-142c0-9.35,5.93-15.23,15.29-15.33,9.54-.1,15.57,5.4,15.65,14.88.15,20,0,40,0,60v5.43Z"
            transform="translate(355.09 -84.91)" />
          <path class="cls-2" d="M354.46,303.41c.1,39-28.29,68.3-66.21,68.43-39,.13-68-28.37-68.09-67-.1-40.77,28-70,67.17-70C325.91,234.86,354.36,263.92,354.46,303.41Z"
            transform="translate(355.09 -84.91)" />
          <path class="cls-2" d="M494.84,312.7c0-13.16-.32-26.34.15-39.48.19-5.5-1.67-6.9-6.63-6.28a48.43,48.43,0,0,1-8,0c-7.37-.32-12.48-5.84-12.53-13.44s5-13.13,12.32-13.65c.16,0,.33,0,.49,0,4.59-.43,10.69,2,13.36-1.07,2.28-2.65.74-8.56.95-13,.93-19.72,14.48-34.43,34.84-37.75,8.26-1.35,16.57-2.12,24.78.14,10.13,2.79,14.5,9.83,11.76,18.5-1.8,5.69-6.07,8.93-12,8.53-3.63-.24-7.22-1.16-10.83-1.74-11.77-1.9-18.66,3.93-18.71,15.82-.05,10.57-.05,10.57,10.66,10.57,4.16,0,8.34-.14,12.49,0,7.67.34,12.91,6,12.85,13.73A13.05,13.05,0,0,1,547.64,267c-6.16.11-12.34.23-18.49-.06-3.52-.17-4.42.9-4.4,4.4.16,26,.1,52,.07,78a50.17,50.17,0,0,1-.48,7.46c-1.28,8.27-7.16,12.79-15.91,12.4a13.82,13.82,0,0,1-13.48-14c-.24-14.16-.07-28.32-.07-42.49Z"
            transform="translate(355.09 -84.91)" />
          <path class="cls-2" d="M607.15,303.61c0,16.82.14,33.64,0,50.46-.12,10-6.57,15.64-16.44,15.08A13.78,13.78,0,0,1,578,358.86a28.71,28.71,0,0,1-.82-6.91q-.08-48.72,0-97.43c0-9.26,3.82-14.85,11.18-16.72,9.94-2.51,18.54,3.84,18.69,14.35.25,17.15.07,34.31.07,51.46Z"
            transform="translate(355.09 -84.91)" />
          <path class="cls-2" d="M412,279c7.15,0,14.31-.06,21.46,0,8.22.09,14.31,5.88,14.7,13.83.42,8.66-4.68,15.14-13.33,15.38q-23.18.61-46.38,0c-8.11-.22-13.64-7-13.37-15.06A14.34,14.34,0,0,1,389.55,279C397,278.9,404.51,279,412,279Z"
            transform="translate(355.09 -84.91)" />
          <path class="cls-2" d="M607.87,207c.08,11.06-2.9,14.09-14.09,14.45-15.24.48-21.2-7.56-16.51-22.3a9.32,9.32,0,0,1,.6-1.37c2.38-4.87,11.08-7.19,20.37-5.44,6.68,1.26,9.1,3.92,9.62,10.68C608,204.35,607.87,205.68,607.87,207Z"
            transform="translate(355.09 -84.91)" />
          <path class="cls-3" d="M-161.18,200h98.47c29.25,0,56.52,22.05,62.54,50.77,5.14,24.52.34,46.46-18.36,64C-33,328.31-50.94,333.5-70.3,333.68c-5.62.05-6.65,1.57-6.75,6.86-.38,19.24-11.35,32.84-29.12,35.83-7,1.18-14.28.6-21.43.61q-58.49.13-117,.15c-20.06,0-31.25-11.57-31.64-31.67-.83-43.64-.28-87.28-.46-130.92,0-11.34,3.2-14.54,14.51-14.54Z"
            transform="translate(355.09 -84.91)" />
          <path class="cls-1" d="M250,303.39c.22-13.28,4.42-24.88,15-33.46,15.28-12.42,38.08-9.74,50.43,5.7,12.53,15.68,12.38,41.43-.52,56-9.94,11.24-22.45,15.26-36.95,11.44-15-3.95-23.25-14.64-26.83-29.28A35.75,35.75,0,0,1,250,303.39Z"
            transform="translate(355.09 -84.91)" />
          <path class="cls-1" d="M-118.83,270.54a35.09,35.09,0,0,1-8.74,23.35c-13.92,16.2-29.78,30.48-45.26,45.14-2.38,2.26-4.42,2.22-6.88-.09-14.22-13.33-28.86-26.21-42.17-40.46-9.15-9.79-13.47-21.36-11.31-34.76,2-12.55,11.69-20.83,24.46-21.7,11.42-.77,21.43,2.61,29.67,10.49,2.38,2.28,3.36,1.66,5.46-.15,10-8.59,21.14-13.31,34.5-9.38C-126.19,246.79-118.78,257-118.83,270.54Z"
            transform="translate(355.09 -84.91)" />
          <path class="cls-1" d="M-75.87,266.72c0-9.49.14-19-.07-28.47-.07-3.36,1.07-4.41,4.3-4.15,7.67.61,15.56-1.43,22.86,3.05,12.7,7.8,17.34,19.16,15.75,33.53-1.48,13.4-8.1,23-21,27.83-6.44,2.43-13.17,1.37-19.79,1.37-2.86,0-2-2.55-2-4.2C-75.9,286-75.87,276.37-75.87,266.72Z"
            transform="translate(355.09 -84.91)" />
        </svg>

      </a>
    </div>
  <?php endif ?>
  <?php endif ?>
</div>