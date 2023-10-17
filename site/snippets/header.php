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
  <title><?= $site->title()->esc() ?> | <?= $page->title()->esc() ?></title>

  <?php
  /*
    Stylesheets can be included using the `css()` helper.
    Kirby also provides the `js()` helper to include script file.
    More Kirby helpers: https://getkirby.com/docs/reference/templates/helpers
  */
  ?>
  <?= css([
    'assets/css/prism.css',
    'assets/css/lightbox.css',
    'assets/css/index.css?ver=' . filemtime("assets/css/index.css") . '',
    '@auto'
  ]) ?>

  <link rel="shortcut icon" type="image/x-icon" href="<?= url('favicon.ico') ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= url('favicon-16x16.png')?>">
  <link rel=icon type="image/png" sizes="32x32" href="<?= url('favicon-32x32.png') ?>">
  <link rel=apple-touch-icon href="<?= url('apple-touch-icon.png') ?>">
  <link rel=mask-icon href="<?= url('safari-pinned-tab.svg') ?>">
  <meta name=theme-color content="#2e2e33">
  <meta name=msapplication-TileColor content="#2e2e33">
  
  <link rel=alternate type="application/rss+xml" href="feed">
</head>
<body>
  
	<div class="hero-image"<?php if($header = $site->image('header.png')): ?> style="background-image: url(<?= $header->url() ?>);" <?php endif ?>>
  <div class="hero-text">
    <h1><a href="<?= $site->url() ?>"><?= $site->title()->esc() ?></a></h1>
    <h3>Notes from Jack about everything</h3>
  </div>
  <?php if($extraImg = $site->image('extra.png')): ?><img id="extra-image" src="<?= $extraImg->url() ?>"><?php endif ?>
</div>
  <header class="header">
    <?php
    /*
      We use `$site->url()` to create a link back to the homepage
      for the logo and `$site->title()` as a temporary logo. You
      probably want to replace this with an SVG.
    */
    ?>
    <a class="logo" href="<?= $site->url() ?>">
      <?= $site->title()->esc() ?>
    </a>

    <nav class="menu">
      <?php
      /*
        In the menu, we only fetch listed pages,
        i.e. the pages that have a prepended number
        in their foldername.

        We do not want to display links to unlisted
        `error`, `home`, or `sandbox` pages.

        More about page status:
        https://getkirby.com/docs/reference/panel/blueprints/page#statuses
      */
      ?>
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
