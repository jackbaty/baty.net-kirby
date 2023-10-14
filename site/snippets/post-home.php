<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The note snippet renders an excerpt of a blog article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<article class="post-excerpt">
  <a href="<?= $post->url() ?>">
    <header>
      <figure class="img" style="--w: 16; --h:9">
        <?php if ($cover = $post->cover()): ?>
          <img src="<?= $cover->crop(320, 180)->url() ?>" alt="<?= $cover->alt()->esc() ?>">
        <?php endif ?>
      </figure>

      <h2 class="post-excerpt-title"><?= $post->title()->esc() ?></h2>
    </header>
    <?php if (($excerpt ?? true) !== false): ?>
    <div class="post-excerpt-text">
      <?php if ($post->summary()->isEmpty()): ?>
      	<?= $post->text()->toBlocks()->excerpt(80) ?>
      <?php else: ?>
      	<?= $post->summary()->kt() ?>
      <?php endif ?>
    </div>
    <?php endif ?>
  </a>
</article>
