<?php if ($icon = $note->smallimage()->toFile()): ?>
  		<img class="small-image-right" src="<?= $icon->crop(100)->url() ?>" alt="<?= $icon->alt()->esc() ?>">
<?php endif ?>