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
</div>

<ul class="post">
  <?php foreach ($journals as $journal): ?>
  <li>
      <?php snippet('journal-list', ['post' => $journal]) ?>
  </li>
  <?php endforeach ?>
</ul>

<?php snippet('pagination', ['pagination' => $journals->pagination()]) ?>
<?php snippet('footer') ?>
