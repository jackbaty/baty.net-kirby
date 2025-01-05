<?php
/*
  The movie-home snippet renders an excerpt of a movie on the home page
  
  Called from home.php
*/
?>

<article class="post home">
  <header class="post-header h1">
    <h2 class="post-title"><a href="<?= $post->url() ?>"><?= $post->postTitle() ?></a></h2>
    <p class="post-subheading">🍿 <em><?= $post->rating() ?></em></p>
  </header>
  <div class="post text">
  <?php if ($poster = $post->poster()): ?>
        <a href="<?= $post->url() ?>"><img class="floatleft" style="margin-right: 10px;" width="80px" src="<?= $poster->url() ?>" alt="<?= $poster->alt() ?>"></a><?php endif ?>
		<?= $post->text()->text() ?>
    <div class="read-more"><a href="<?= $post->url() ?>">Details…</a></div>
    </div>
    
</article>