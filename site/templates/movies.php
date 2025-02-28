<?php
/*
  
*/
?>
<?php snippet('header',['extracss' => 'movie.css']) ?>

<?php if (empty($tag) === false): ?>
<header class="h1">
  <h1>
    <small>Tag:</small> <?= esc($tag) ?>
    <a href="<?= $page->url() ?>" aria-label="All Posts">&times;</a>
  </h1>
</header>
<?php else: ?>
  <?php snippet('intro') ?>
<?php endif ?>

<div class="post text">
    <?= $page->text()->kt() ?>
</div><br>

<h2><strong>My rating system:</strong></h2>
<div style="margin:30px;">


⭐️⭐️⭐️⭐️⭐️ Loved it!  <br>
⭐️⭐️⭐️⭐️ It was good  <br>
⭐️⭐️⭐️ It was OK  <br>
⭐️⭐️ I didn’t like it  <br>
⭐️ Hated it  <br>
</div>

<hr>

<ul class="post">
  <?php foreach ($movies as $movie): ?>
  <li>
      <?php snippet('movie-list', ['movie' => $movie]) ?>
  </li>
  <?php endforeach ?>
</ul>

<?php snippet('pagination', ['pagination' => $movies->pagination()]) ?>
<?php snippet('footer') ?>
