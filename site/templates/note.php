<?php
/*
  Renders an individual journal note
*/
?>
<?php snippet('header') ?>

<article class="post">
<header class="post-header h1"><h1 class="post-title"><?= $page->title()->esc() ?></h1>
    <time class="note-excerpt-date">Daily Note: <a href="<?= $page->parent()->url() ?>"><?= html($page->parent()->title()) ?></a></time>
</header>
  <div class="post text">
    <?= $page->text()->kt() ?>
  </div>
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
  
</article>

<?php snippet('footer') ?>
