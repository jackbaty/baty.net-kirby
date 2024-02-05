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
</ul>
