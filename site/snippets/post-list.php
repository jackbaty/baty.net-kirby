<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The post snippet renders an excerpt of a blog article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<article class="post-excerpt">
<h2 class="post-excerpt-title"><a href="<?= $post->url() ?>"><?= $post->title()->esc() ?></a></h2>
<time class="post-excerpt-date" datetime="<?= $post->published('c') ?>"><?= $post->published() ?><?php if (!empty($post->tags())): ?> | Tags: <?= $post->tags() ?><?php endif ?></time> 
    <?php if (($excerpt ?? true) !== false): ?>
    <div class="post-excerpt-text">
      <?php if ($post->summary()->isEmpty()): ?>
      	<?= $post->text()->kt()->excerpt(280) ?>
      <?php else: ?>
      	<?= $post->summary()->text() ?>
      <?php endif ?>
      <div class="read-more"><a href="<?= $post->url() ?>">Read more…</a></div>
    </div>
    <?php endif ?>
</article>
