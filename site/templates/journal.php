<?php
/*
  Templates render the content of your pages.

  They contain the markup together with some control structures
  like loops or if-statements. The `$page` variable always
  refers to the currently active page.

  To fetch the content from each field we call the field name as a
  method on the `$page` object, e.g. `$page->title()`.

  This post template renders a blog article. It uses the `$page->cover()`
  method from the `post.php` page model (/site/models/page.php)

  It also receives the `$tag` variable from its controller
  (/site/controllers/post.php) if a tag filter is activated.

  Snippets like the header and footer contain markup used in
  multiple templates. They also help to keep templates clean.

  More about templates: https://getkirby.com/docs/guide/templates/basics
*/
?>
<?php snippet('header') ?>

<article class="post">
  <header class="post-header h1">
    <h1 class="post-title"><?= $page->title()->esc() ?></h1>
    <?php if ($page->subheading()->isNotEmpty()): ?>
    <p class="post-subheading"><small><?= $page->subheading()->esc() ?></small></p>
    <?php endif ?>
  </header>
  	<?php if ($page->weather()->isNotEmpty()): ?>
    <div class="post-weather">
    	Weather: <?= $page->weather() ?>
    </div>
    <?php endif ?>

  
  <div class="post text">
    <?= $page->text()->kt() ?>
  </div>

<ul class="note">
  <?php foreach($page->children() as $note): ?>
  <li>
    <?php snippet('note-list', ['note' => $note]) ?>
  </li>
  <?php endforeach ?>
</ul>

	
  <footer class="post-footer">
    <?php if (!empty($tags)): ?>
    <ul class="post-tags">
      <?php foreach ($tags as $tag): ?>
      <li>
        <a href="<?= $site->find('posts')->url(['params' => ['tag' => $tag]]) ?>"><?= esc($tag) ?></a>
      </li>
      <?php endforeach ?>
    </ul>
    <?php endif ?>
    <?php snippet('reply-by-email') ?>
      
  </footer>

  <?php snippet('prevnext') ?>
</article>

<?php snippet('footer') ?>
