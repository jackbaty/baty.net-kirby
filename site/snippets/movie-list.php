<?php
/*
  The post snippet renders an excerpt of a blog article.
*/
?>
<article class="post-excerpt">
<h2 class="post-excerpt-title"><a href="<?= $movie->url() ?>"><?= $movie->title()->esc() ?></a></h2>
<time class="post-excerpt-date" datetime="<?= $movie->published('c') ?>"><?= $movie->published() ?>
    <?php if (($excerpt ?? true) !== false): ?>
    <div class="post-excerpt-text">
      <?php if ($movie->summary()->isEmpty()): ?>
      	<?= $movie->text()->kt()->excerpt(280) ?>
      <?php else: ?>
      	<?= $movie->summary()->text() ?>
      <?php endif ?>
      <div class="read-more"><a href="<?= $movie->url() ?>">Read more…</a></div>
    </div>
    <?php endif ?>
</article>
