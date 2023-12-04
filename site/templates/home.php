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
$latestJournalDay = $latestJournal->date()->toDate('Y-m-d');

if ($latestJournalDay == date('Y-m-d')) {
    $dayHeading = 'Today';
 } else {
    $dayHeading = 'Latest Journal Entry';
}

$recentPosts = collection('posts')->limit(7);
?>
<?php snippet('header') ?>
  


<article class="post home">
<?php snippet('welcome') ?>

	<h2 class="uppercase color-grey"><?= $dayHeading ?></h2>
  <header class="post-header h1">
    <h2 class="post-title"><a href="<?= $latestJournal->url() ?>"><?= $latestJournal->title()->esc() ?></a></h2>
    <?php if ($latestJournal->subheading()->isNotEmpty()): ?>
    <p class="post-subheading"><small><?= $latestJournal->subheading()->esc() ?></small></p>
    <?php endif ?>
  </header>
  <div class="post text">
    <?= $latestJournal->text()->kt() ?>
  </div>
  <hr>
  <div class="recent-posts">
  <h2 class="uppercase color-grey">Recent posts</h2>

<ul class="grid">
<?php foreach ($recentPosts as $post): ?>
	<?php if ($post->url() != $latestJournal->url()): ?>
  <li class="column" style="--columns: 4">
      <?php snippet('post-home', ['post' => $post]) ?>
  </li>
  <?php endif ?>
  <?php endforeach ?>
</ul>

<div class="more-posts"><a href="/posts">More posts &rarr;</a></div>
</article>

  <?php if (false): ?>
  <?php /* if ($photographyPage = page('photography')): */ ?>
  <ul class="home-grid">
    <?php foreach ($photographyPage->children()->listed() as $album): ?>
    <li>
      <a href="<?= $album->url() ?>">
        <figure>
          <?php
          /*
            The `cover()` method defined in the `album.php`
            page model can be used everywhere across the site
            for this type of page

            We can automatically resize images to a useful
            size with Kirby's built-in image manipulation API
          */
          ?>
          <?php if ($cover = $album->cover()): ?>
          <img src="<?= $cover->resize(1024, 1024)->url() ?>" alt="<?= $cover->alt()->esc() ?>">
          <?php endif ?>
          <figcaption>
            <span>
              <span class="example-name"><?= $album->title()->esc() ?></span>
            </span>
          </figcaption>
        </figure>
      </a>
    </li>
    <?php endforeach ?>
  </ul>
  <?php endif ?>
<?php snippet('footer') ?>
