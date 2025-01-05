<?php
/*
  The post-home snippet renders an excerpt of a blog article on the home page

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/



?>

<article class="post home">
  <header class="post-header h1">
    <h2 class="post-title"><?= $slot ?><a href="<?= $journal->url() ?>"><?= $journal->title()->esc() ?></a></h2>
    <?php if ($journal->summary()->isNotEmpty()): ?>
        <p class="post-subheading"><em><?= $journal->summary()->esc() ?></em></p>
    <?php endif ?>
  </header>
  <?php if ($cover = $journal->assignedCover()): ?>
  <figure class="featured-image-container">
<a href="<?= $cover->url() ?>" data-lightbox>
  <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->esc() ?>">
</a>
  <?php if ($cover->caption()): ?>
<figcaption><?= $cover->caption() ?>
<?php endif ?>
  </figure>
<?php endif ?>
  
  <?php if ($journal->text()->isNotEmpty()): ?>
  <div class="post text">
    <?= $journal->text()->kt() ?>
  </div>
  <?php endif ?>
<ul class="note">
  <?php foreach($journal->children() as $note): ?>
  <li>
    <?php snippet('note-list-item', ['note' => $note]) ?>
  </li>
  <?php endforeach ?>
</ul>
</article>