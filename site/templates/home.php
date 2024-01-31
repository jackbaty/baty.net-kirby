<?php
/*
   Templates render the content of your pages.

   They contain the markup together with some control structures
   like loops or if-statements. The `$page` variable always
   refers to the currently active page.

   To fetch the content from each field we call the field name as a
   method on the `$page` object, e.g. `$page->title()`.

   This home template renders content from others pages, the children of
   the `photography` page to display a nice gallery grid.

   Snippets like the header and footer contain markup used in
   multiple templates. They also help to keep templates clean.

   More about templates: https://getkirby.com/docs/guide/templates/basics
 */
$latestJournal = collection('journals')->first();
$recentJournals = collection('journals')->limit(7);
$latestJournalDay = $latestJournal->date()->toDate('Y-m-d');

if ($latestJournalDay == date('Y-m-d')) {
    $dayHeading = 'Today,';
 } else {
    $dayHeading = '';
}

$recentPosts = collection('posts')->limit(10);
?>

<?php snippet('header') ?>
  
<?php snippet('welcome') ?>

<article class="post home">
  <header class="post-header h1">
    <h2 class="post-title"><?= $dayHeading ?> <a href="<?= $latestJournal->url() ?>"><?= $latestJournal->title()->esc() ?></a></h2>
    <?php if ($latestJournal->subheading()->isNotEmpty()): ?>
        <p class="post-subheading"><small><?= $latestJournal->subheading()->esc() ?></small></p>
    <?php endif ?>
  </header>
  <?php if ($cover = $latestJournal->assignedCover()): ?>
<a href="<?= $cover->url() ?>" data-lightbox class="img" style="--w:2; --h:1">
  <img src="<?= $cover->crop(1200, 800)->url() ?>" alt="<?= $cover->alt()->esc() ?>">
</a>
<?php endif ?>
  <?php if ($latestJournal->text()->isNotEmpty()): ?>
  <div class="post text">
    <?= $latestJournal->text()->kt() ?>
  </div>
  <?php endif ?>

<ul class="note">
  <?php foreach($latestJournal->children() as $note): ?>
  <li>
    <?php snippet('note-list-item', ['note' => $note]) ?>
  </li>
  <?php endforeach ?>
</ul>
</article>

<?php if(false): ?>
<!-- recent posts links -->
<div class="recent-posts">
  <h2 class="uppercase color-grey">Recent blog posts</h2>

<ul>
<?php foreach ($recentPosts as $post): ?>
	<?php if ($post->url() != $latestJournal->url()): ?>
      <?php snippet('post-list-home', ['post' => $post]) ?>
  <?php endif ?>
  <?php endforeach ?>
</ul>

<div class="more-posts"><a href="/posts">More posts &rarr;</a></div>
</div>
<!-- /recent posts links -->
<?php endif ?>

<!-- recent posts full text -->
<ul>
  <?php foreach ($recentPosts as $post): ?>
	  <?php if ($post->url() != $latestJournal->url()): ?>

<article class="post home">
  <header class="post-header h1">
    <h2 class="post-title"><a href="<?= $post->url() ?>"><?= $post->title()->esc() ?></a></h2>
    <?php if ($post->subheading()->isNotEmpty()): ?>
        <p class="post-subheading"><small><?= $post->subheading()->esc() ?></small></p>
    <?php endif ?>
  </header>
  <?php if ($post->text()->isNotEmpty()): ?>
  <div class="post text">
    <?= $post->text()->kt() ?>
    
    <time class="post-excerpt-date" datetime="<?= $post->published('c') ?>"><?= $post->published() ?><?php if (!empty($post->tags())): ?><?php endif ?></time>
  </div>
  <?php endif ?>
</article>
    <?php endif ?>
  <?php endforeach ?>
</ul>
<!-- /recent posts full text -->


<?php if(false): ?>
<!-- recent daily notes full text -->
<ul>
  <?php foreach ($recentJournals as $journal): ?>
	  <?php if ($journal->url() != $latestJournal->url()): ?>


<article class="post home">
  <header class="post-header h1">
    <h2 class="post-title"><a href="<?= $journal->url() ?>"><?= $journal->title()->esc() ?></a></h2>
    <?php if ($journal->subheading()->isNotEmpty()): ?>
        <p class="post-subheading"><small><?= $journal->subheading()->esc() ?></small></p>
    <?php endif ?>
  </header>
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
    <?php endif ?>
  <?php endforeach ?>
</ul>
<!-- /recent daily notes full text -->
<?php endif ?>

<?php snippet('footer') ?>
