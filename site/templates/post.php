<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This post template renders a blog article. It uses the `$page->cover()`
  method from the `post.php` page model (/site/models/page.php)

  It also receives the `$tag` variable from its controller
  (/site/controllers/post.php) if a tag filter is activated.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>

<?php if ($cover = $page->assignedCover()): ?>
<a href="<?= $cover->url() ?>" data-lightbox class="img" style="--w:2; --h:1">
  <img src="<?= $cover->crop(1200, 800)->url() ?>" alt="<?= $cover->alt()->esc() ?>">
</a>
<?php endif ?>

<article class="post">
  <header class="post-header h1">
    <h1 class="post-title"><?= $page->title()->esc() ?></h1>
    <?php if ($page->subheading()->isNotEmpty()): ?>
    <p class="post-subheading"><small><?= $page->subheading()->esc() ?></small></p>
    <?php endif ?>
  </header>
  <div class="post text">
    <?= $page->text()->kt() ?>
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
