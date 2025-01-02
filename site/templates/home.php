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
    $dayHeading = '☀️ ';
    if ($latestJournal->weather_icon()->isNotEmpty()) {
    	$dayWeatherIcon = '<img src="/assets/images/weather/day/' . $latestJournal->weather_icon() . '.png" width="32" height="32"> ';
    } else {
      $dayWeatherIcon = $dayHeading;
    }
 } else {
    $dayHeading = '';
}

$allPosts = collection('posts-and-journals');
$allPostsCount = $allPosts->count();
$recentPosts = $allPosts->limit(10);

?>

<?php snippet('header',['extracss' => 'home.css']) ?>
  
<?php snippet('welcome') ?>

<!-- most recent daily journal -->
<?php snippet('journal-home',['journal' => $latestJournal], slots: true) ?>
	<?= $dayWeatherIcon ?>
<?php endsnippet() ?>


<!-- /most recent daily post -->


<?php if(false): ?>
<!-- recent posts links -->
<div class="recent-posts">
  <h2 class="uppercase color-grey">Latest blog posts</h2>

<ul>
<?php foreach ($recentPosts as $post): ?>
	<?php if ($post->url() != $latestJournal->url()): ?>
      <?php snippet('post-list-home', ['post' => $post]) ?>
  <?php endif ?>
  <?php endforeach ?>
</ul>

<div class="more-posts"><a href="/posts">See all <?= $allPostsCount ?> posts in the archive &rarr;</a></div>
</div>
<!-- /recent posts links -->
<?php endif ?>



<!-- recent posts full text -->
<?php if(true): ?>
<h2 class="recent">{ Recent posts and journals }</h2>

<ul>
  <?php foreach ($recentPosts as $post): ?>
	  <?php if ($post->url() != $latestJournal->url()): ?>
	  
		<!-- the post-home snippet decides how to render posts vs journals -->
		<?php snippet('post-home',['post' => $post]) ?>
		
    <?php endif ?>
  <?php endforeach ?>
</ul>
<?php endif ?>
<!-- /recent posts full text -->


<?php if(false): ?>
<!-- recent daily notes full text -->
<ul>
  <?php foreach ($recentJournals as $journal): ?>
	  <?php if ($journal->url() != $latestJournal->url()): ?>

			<?php snippet('journal-home',['journal' => $journal]) ?>

    <?php endif ?>
  <?php endforeach ?>
</ul>
<!-- /recent daily notes full text -->
<?php endif ?>

<div class="more-posts"><a href="/journal">Previous entries &rarr;</a></div>


<?php snippet('footer') ?>
