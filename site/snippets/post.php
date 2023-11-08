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
  <a href="<?= $post->url() ?>">
    <header>
    <h2 class="post-excerpt-title"><?= $post->title()->esc() ?></h2>
      <time class="post-excerpt-date" datetime="<?= $post->published('c') ?>"><?= $post->published() ?></time>
    
    	<?php if ($cover = $post->cover()): ?>
				<figure class="img" style="--w: 16; --h:9">       
						<img src="<?= $cover->crop(640, 360)->url() ?>" alt="<?= $cover->alt()->esc() ?>">
				</figure>
      <?php else: ?>
        	
      <?php endif ?>

      
    </header>
  </a>
    <?php if (($excerpt ?? true) !== false): ?>
    <div class="post-excerpt-text">
      <?php if ($post->summary()->isEmpty()): ?>
      	<?= $post->text()->kt()->excerpt(280) ?>
      <?php else: ?>
      	<?= $post->summary()->text() ?>
      <?php endif ?>
    </div>
    <?php endif ?>
  
</article>
