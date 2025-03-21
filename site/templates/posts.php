<?php
/*
  This template lists all the subpages of the `posts` page with
  their title date sorted by date and links to each subpage.

  This template receives additional variables like $tag and $posts
  from the `posts.php` controller in `/site/controllers/posts.php`

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/

?>
<?php snippet('header') ?>

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

<ul class="post">
  <?php foreach ($posts as $post): ?>
  <li>
      <?php snippet('post-list-condensed', ['post' => $post]) ?>
  </li>
  <?php endforeach ?>
</ul>

<?php snippet('pagination', ['pagination' => $posts->pagination()]) ?>
<?php snippet('footer') ?>
