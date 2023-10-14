<?php
/** @var \Kirby\Cms\Block $block */
$caption = $block->caption();
$crop    = $block->crop()->isTrue();
$ratio   = $block->ratio()->or('auto');
$gallery = $block->images()->toFiles();
?>


<figure<?= Html::attr(['data-ratio' => $ratio, 'data-crop' => $crop], null, ' ') ?>>
  <ul class="grid" style="--gutter: 1.5rem">
    <?php foreach ($block->images()->toFiles() as $image): ?>
    <li class="column" style="--columns: 3">
    	<figure>
      <a href="<?= $image->url() ?>" data-lightbox><img src="<?= $image->resize(800)->url() ?>" alt="<?= $image->alt()->esc() ?>"></a>
      <?php if ($image->caption()->isNotEmpty()): ?>
      <figcaption>
      <?= $image->caption() ?>
      <figcaption>
      <?php endif ?>
      </figure>
    </li>
    <?php endforeach ?>
  </ul>
  <?php if ($caption->isNotEmpty()): ?>
  <figcaption>
    <?= $caption ?>
  </figcaption>
  <?php endif ?>
</figure>
