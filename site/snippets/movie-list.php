<?php
/*
  The movie snippet renders an excerpt of a movie post.
*/
?>
<article class="post-excerpt">
<h2 class="post-excerpt-title"><a href="<?= $movie->url() ?>"><?= $movie->title()->esc() ?></a> (<?= $movie->year() ?>)</h2>
<time class="post-excerpt-date" datetime="<?= $movie->published('c') ?>"><?= $movie->published()->toDate('M d, Y') ?></time>
     <?php if ($cover = $movie->cover()): ?>
        <img class="floatleft" style="margin-right: 10px;" width="80px" src="<?= $cover->url() ?>" alt="<?= $cover->alt() ?>"><?php endif ?>
<?= $movie->rating() ?>
    <div class="post-excerpt-text">
      	<?= $movie->text()->text() ?>
      	<div class="read-more"><a href="<?= $movie->url() ?>">Read more…</a></div>
    </div>

</article>
