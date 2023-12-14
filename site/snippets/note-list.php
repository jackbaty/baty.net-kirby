<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  The post snippet renders an excerpt of a blog article.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<article class="note-excerpt">
	<?php if ($note->Showtitle()->toBool() === true): ?>
		<h2 class="note-excerpt-title"><a href="<?= $note->url() ?>"><?= $note->title()->esc() ?></a></h2>
	<?php endif ?>
  <div class="note text">
		<?php if ($note->Showtitle()->toBool() === false): ?><span class="permalink-hash"><a href="<?= $note->url() ?>">#</a></span><?php endif ?>
		<?= $note->text()->kt() ?>
	</div>
</article>
