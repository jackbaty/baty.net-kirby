<?php snippet('header') ?>
<?php snippet('intro') ?>

<form id="search-form">
  <input type="search" class="search-field" aria-label="Search" name="q" value="<?= html($query) ?>" autofocus>
  <input type="submit" class="search-button" value="Search">
</form>

<ul class="search-results">
  <?php foreach ($results as $result): ?>
  <li>
    <a href="<?= $result->url() ?>">
      <?= $result->title() ?>
    </a>
  </li>
  <?php endforeach ?>
</ul>

<?php snippet('footer') ?>