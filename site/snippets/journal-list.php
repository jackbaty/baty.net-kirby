<?php
/*
  The post snippet renders an excerpt of a blog article.
*/
?>
<article class="post-excerpt">
<h2 class="post-excerpt-title"><a href="<?= $post->url() ?>"><?= $post->title()->esc() ?></a></h2>
<?php if ($post->template() == 'journal'): ?>
  <div class="post-excerpt-date"><?= $post->weather() ?></div>
  <?php else: ?>
<time class="post-excerpt-date" datetime="<?= $post->published('c') ?>"><?= $post->published() ?><?php if (!empty($post->tags())): ?> | Tags: <?= $post->tags() ?><?php endif ?></time>
<?php endif ?>
    <?php if (($excerpt ?? true) !== false): ?>
	<div class="post-excerpt-text">
	    <?php if ($post->summary()->isEmpty()): ?>
      		<?= $post->text()->kt()->excerpt(280) ?>
	    <?php else: ?>
      		<?= $post->summary()->text() ?>
	    <?php endif ?>

	    <ul class="compact-note-list">
		<?php foreach($post->children() as $note): ?>
		    <li>
			<a href="<?= $note->url() ?>"><?=$note->title()?></a>
		    </li>
		<?php endforeach ?>
	    </ul>
      <div class="read-more"><a href="<?= $post->url() ?>">Read more…</a></div>
    </div>
    <?php endif ?>
</article>
