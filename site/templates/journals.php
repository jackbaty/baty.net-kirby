<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This template lists all the subpages of the `posts` page with
  their title date sorted by date and links to each subpage.

  This template receives additional variables like $tag and $posts
  from the `posts.php` controller in `/site/controllers/posts.php`

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header',['extracss' => 'journal.css']) ?>

<?php if (empty($tag) === false): ?>
<header class="h1">
  <h1>
    <small>Tag:</small> <?= esc($tag) ?>
    <a href="<?= $page->url() ?>" aria-label="All Posts">&times;</a>
  </h1>
</header>
<?php else: ?>
  <?php snippet('intro') ?>
<?php endif ?>

<div class="post text">
    <?= $page->text()->kt() ?>
</div><br>

<ul class="post">
  <?php foreach ($journals as $journal): ?>
  <li>
      <?php snippet('journal-list', ['post' => $journal]) ?>
  </li>
  <?php endforeach ?>
</ul>

<?php snippet('pagination', ['pagination' => $journals->pagination()]) ?>
<?php snippet('footer') ?>
