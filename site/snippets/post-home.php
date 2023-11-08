<?php
/*
  The post-home snippet renders an excerpt of a blog article on the home page

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>

<article class="post-excerpt">
  <a href="<?= $post->url() ?>">
    <header>

<?php if ($cover = $post->cover()): ?>
<figure>
          <img src="<?= $cover->crop(320, 180)->url() ?>" alt="<?= $cover->alt()->esc() ?>">
</figure>
<?php endif ?>

      <h2 class="post-excerpt-title"><?= $post->title()->esc() ?></h2>
    </header>
    <?php if (($excerpt ?? true) !== false): ?>
    <div class="post-excerpt-text">
      <?php if ($post->summary()->isEmpty()): ?>
      	<?= $post->text()->excerpt(140) ?>
      <?php else: ?>
      	<?= $post->summary()->text() ?>
      <?php endif ?>
    </div>
    <?php endif ?>
  </a>
</article>
