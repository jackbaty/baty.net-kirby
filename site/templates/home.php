<?php
/*

 */
$latestJournal = collection('journals')->first();
$recentJournals = collection('journals')->limit(7);
$latestJournalDay = $latestJournal->date()->toDate('Y-m-d');

if ($latestJournalDay == date('Y-m-d')) {
    $dayHeading = '☀️ ';
 } else {
    $dayHeading = '';
    $dayWeatherIcon = $dayHeading;
}

$allPosts = collection('posts-and-movies');
$allPostsCount = $allPosts->count();
$recentPosts = $allPosts->limit(10);

?>

<?php snippet('header',['extracss' => 'home.css']) ?>
  
<?php snippet('welcome') ?>

<!-- most recent daily journal -->
<?php snippet('journal-home',['journal' => $latestJournal], slots: true) ?>
	
<?php endsnippet() ?>
<!-- /most recent daily post -->

<?php if(true): ?>
<!-- recent daily notes full text -->
<!-- <h2 class="recent">{ Recent journals }</h2> -->
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
