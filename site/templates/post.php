<?php

?>
<?php snippet('header') ?>

<?php if ($cover = $page->assignedCover()): ?>
<figure class="featured-image-container">
<figcaption>My garage workbench. Canon AE-1 Program</figcaption></figure>
<a href="<?= $cover->url() ?>" data-lightbox class="img" style="--w:2; --h:1">
  <img src="<?= $cover->crop(1200, 800)->url() ?>" alt="<?= $cover->alt()->esc() ?>">
</a>
</figure>
<?php endif ?>

<article class="post">
  <header class="post-header h1">
    <h1 class="post-title"><?= $page->title()->esc() ?></h1>
    <?php if ($page->summary()->isNotEmpty()): ?>
    <p class="post-subheading"><em><?= $page->summary()->esc() ?></em></p>
    <?php endif ?>
  </header>
  <div class="post text">
    <?= $page->postContent(); ?>
  </div>
  <footer class="post-footer">
    <?php if (!empty($tags)): ?>
    <ul class="post-tags">
      <?php foreach ($tags as $tag): ?>
      <li>
        <a href="<?= $site->find('posts')->url(['params' => ['tag' => $tag]]) ?>"><?= esc($tag) ?></a>
      </li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>

    <time class="post-date" datetime="<?= $page->date()->toDate('c') ?>">Published on <?= $page->date()->esc() ?></time>
    

  </footer>

</article>
<footer class="post-footer">
<?php snippet('reply-by-email') ?>
</footer>

<?php /* snippet('prevnext') */ ?>
 <nav class="blog-prevnext">
  <h2 class="h2">More posts</h2>

  <div class="autogrid" style="--gutter: 1.5rem">
    <?php if ($prev = $page->nextListed()): ?>
    <div>← <a href="<?= $prev->url() ?>"><?= $prev->title()  ?></a></div>
    <?php endif ?>

    <?php if ($next = $page->prevListed()): ?>
    <div style="text-align: right;"><a href="<?= $next->url() ?>"><?= $next->title()  ?></a> →</div>
    <?php endif ?>
  </div>
</nav>

<?php snippet('footer') ?>
