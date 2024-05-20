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
<article class="post">
  <header class="post-header h1">
    <h1 class="post-title"><?= $page->title()->esc() ?> (<?= $page->year() ?>)</h1>
    <?php if ($page->subheading()->isNotEmpty()): ?>
    <p class="post-subheading"><small><?= $page->subheading()->esc() ?></small></p>
    <?php endif ?>
  </header>

<?php snippet('movie') ?>

</article>
<footer class="post-footer">
🍿 <a href="/movies">See all Movies</a>

<?php snippet('reply-by-email') ?>
</footer>

<?php snippet('footer') ?>

    