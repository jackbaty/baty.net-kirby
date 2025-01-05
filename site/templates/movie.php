<?php
/*
  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.
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

    