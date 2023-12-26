<?php
/*
  Renders an individual journal note
*/
?>
<?php snippet('header') ?>

<?php if ($cover = $page->assignedCover()): ?>
<a href="<?= $cover->url() ?>" data-lightbox class="img" style="--w:2; --h:1">
  <img src="<?= $cover->url() ?>" alt="<?= $cover->alt()->esc() ?>">
</a>
<?php endif ?>
<article class="post">
<header class="post-header h1"><h1 class="post-title"><?= $page->title()->esc() ?></h1>
    <time class="note-excerpt-date">Daily Note: <a href="<?= $page->parent()->url() ?>"><?= html($page->parent()->title()) ?></a></time>
</header>
  <div class="post text">
  	<?php snippet('small-image',['note' => $page]) ?>
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
    

    
  </footer>
  
</article>

    <?php snippet('reply-by-email') ?>

<?php snippet('footer') ?>
