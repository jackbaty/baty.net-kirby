<?php
/*
  The post snippet renders an excerpt of a blog article.
*/
?>
<ul class="archivelist">
<li>
	<a href="<?= $post->url() ?>"><?= $post->title()->esc() ?></a> - 
	
		<?= $post->published() ?>
		<?php if (!empty($post->tags())): ?> | <?= $post->tags() ?><?php endif ?>


    <?php if (($excerpt ?? true) !== false): ?>
    <p class="post-excerpt-text">
      <?php if ($post->summary()->isEmpty()): ?>
      	<?= $post->text()->kt()->excerpt(80) ?>
      <?php else: ?>
      	<?= $post->summary()->text() ?>
      <?php endif ?>
  
    </p>
    <?php endif ?>
</ul>
