<?php
/*
  The post-home snippet renders an excerpt of a blog article on the home page
  
  Called from home.php

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
  
*/
?>

<article class="post home">
  <header class="post-header h1">
    <h2 class="post-title"><?= $slot ?><a href="<?= $post->url() ?>"><?= $post->title()->esc() ?></a></h2>
    <?php if ($post->summary()->isNotEmpty()): ?>
        <p class="post-subheading"><em><?= $post->summary()->esc() ?></em></p>
    <?php endif ?>
  </header>
  <?php if ($cover = $post->assignedCover()): ?>
  <figure class="featured-image-container">
<a href="<?= $cover->url() ?>" data-lightbox class="img" style="--w:2; --h:1">
  <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->esc() ?>">
</a>
  <?php if ($cover->caption()): ?>
<figcaption><?= $cover->caption() ?>
<?php endif ?>
  </figure>
<?php endif ?>
  

  
  
  <?php if($post->template() == 'post'): ?>
  	<div class="post text">
    	<?= $post->postContent() ?>
    </div>
  <?php else: ?>
  	 <?php if ($post->text()->isNotEmpty()): ?>
  		<div class="post text">
    		<?= $post->text()->kt() ?>
  		</div>
  		<?php endif ?>
  <?php endif ?>


<ul class="note">
  <?php foreach($post->children() as $note): ?>
  <li>
    <?php snippet('note-list-item', ['note' => $note]) ?>
  </li>
  <?php endforeach ?>
</ul>
</article>