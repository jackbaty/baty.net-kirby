<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This header snippet is reused in all templates.
  It fetches information from the `site.txt` content file
  and contains the site navigation.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">

  <?php
  /*
    In the title tag we show the title of our
    site and the title of the current page
  */
  ?>
  <title><?= $page->title()->esc() ?> | <?= $site->title()->esc() ?></title>

  <?php
  /*
     Stylesheets can be included using the `css()` helper.
     Kirby also provides the `js()` helper to include script file.
     More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers
   */
   
   if (isset($extracss)) {
   $extracssurl = '/assets/css/templates/' . $extracss . '?ver=' . filemtime("assets/css/templates/" . $extracss);
   } else {
   $extracssurl = '@auto';
   }
  ?>
  <?= css([
    'assets/css/prism.css?v=20231109',
    'assets/css/lightbox.css',
    'assets/css/index.css?ver=' . filemtime("assets/css/index.css") . '',
    $extracssurl
  ]) ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="//fonts.googleapis.com/css?family=Ubuntu:400,500i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">

  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= url('favicon-16x16.png')?>">
  <link rel=icon type="image/png" sizes="32x32" href="<?= url('favicon-32x32.png') ?>">
  <link rel=apple-touch-icon href="<?= url('apple-touch-icon.png') ?>">
  <link rel=mask-icon href="<?= url('safari-pinned-tab.svg') ?>">
  <meta name=theme-color content="#2e2e33">
  <meta name=msapplication-TileColor content="#2e2e33">

  <?php if ($page->summary()->isEmpty()): ?>
      <meta property="og:description" content="<?= $page->text()->kt()->inline()->excerpt(140) ?>">
      <meta name="description" content="<?= $page->text()->kt()->inline()->excerpt(140) ?>">
  <?php else: ?>
      <meta property="og:description" content="<?= $page->summary()->kt()->inline() ?>">
      <meta name="description" content="<?= $page->summary()->kt()->inline() ?>">
  <?php endif ?>
  <meta property="og:title" content="<?= $page->title() ?>">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="Baty.net">
  <meta property="og:url" content="<?= $page->url() ?>">
  <?php if (($page->image()) && ($page->image()->width() > 200)): ?>
  			<?php $image = $page->image() ?>
      <meta property="og:image" content="<?= $image->url() ?>">
  <?php else: ?>
      <meta property="og:image" content="<?= url('assets/images/pipeguy-og.png') ?>">
  <?php endif ?>
  
  <meta name="fediverse:creator" content="@jbaty@social.lol">
  <link rel=alternate type="application/rss+xml" href="/feed">
  
</head>
<body>
  
<!-- 	<div class="hero-image"<?php if($header = $site->header()): ?> style="background-image: url(/header-images/<?= $site->header() ?>);" <?php endif ?>> -->
	
	<div class="hero-container">
  <div class="hero-text">
    <h1><a href="<?= $site->url() ?>"><?= $site->title()->esc() ?></a></h1>
    <h3>Daily notes from Jack about everything</h3>
  </div>
  <?php if($extraImg = $site->extra()): ?><img id="extra-image" src="/header-images/<?= $site->extra() ?>"><?php endif ?>
  </div>
  <header class="header">
    <nav class="menu">
      <?php foreach ($site->children()->listed() as $item): ?>
      <a <?php e($item->isOpen(), 'aria-current="page"') ?> href="<?= $item->url() ?>"><?= $item->title()->esc() ?></a>
      <?php endforeach ?>
      <a href="/search"><svg width="16" height="16" fill="currentColor">
  <title>Search</title>
  <path d="M12.7 11.3c.9-1.2 1.4-2.6 1.4-4.2 0-3.9-3.1-7.1-7-7.1S0 3.2 0 7.1c0 3.9 3.2 7.1 7.1 7.1 1.6 0 3.1-.5 4.2-1.4l3 3c.2.2.5.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4l-3-3.1zm-5.6.8c-2.8 0-5.1-2.2-5.1-5S4.3 2 7.1 2s5.1 2.3 5.1 5.1-2.3 5-5.1 5z"></path>
</svg></a>
      <?php snippet('social') ?>
    </nav>
  </header>

  <main class="main">
