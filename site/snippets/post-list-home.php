<?php
/*
  The post snippet renders an excerpt of a blog article.
*/
?>
<li class="post-list-title"><a href="<?= $post->url() ?>"><?= $post->title()->esc() ?></a>
  - <time class="post-list-date" datetime="<?= $post->published('c') ?>">
        <?= $post->published() ?>
        <?php if (!empty($post->tags())): ?>
            | <?= $post->tags() ?>
        <?php endif ?>
    </time>
</li>
