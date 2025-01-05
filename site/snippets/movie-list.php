<?php
/*
  The movie snippet renders an excerpt of a movie post.
*/
?>
<article class="post-excerpt">
<h2 class="post-excerpt-title"><a class="dummy" href="<?= $movie->url() ?>"><?= $movie->postTitle() ?></a></h2>
<time class="post-excerpt-date" datetime="<?= $movie->date('c') ?>"><?= $movie->date()->toDate('M d, Y') ?></time>
     <?php if ($poster = $movie->poster()): ?>
        <img class="floatleft" style="margin-right: 10px;" width="80px" src="<?= $poster->url() ?>" alt="<?= $poster->alt() ?>"><?php endif ?>
<?= $movie->rating() ?>
    <div class="post-excerpt-text">
      	<?= $movie->text()->text() ?>
      	<div class="read-more"><a href="<?= $movie->url() ?>">Read more…</a></div>
    </div>
</article>
