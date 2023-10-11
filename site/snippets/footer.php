<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  This footer snippet is reused in all templates.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
  </main>

  <footer class="footer">
    <div class="grid">
      <div class="column" style="--columns: 8">
        <p>
         Copyright © 2000-2023 Jack Baty
        </p>
      </div>
      <div class="column" style="--columns: 2">
        <h2>Pages</h2>
        <ul>
          <?php foreach ($site->children()->listed() as $example): ?>
          <li><a href="<?= $example->url() ?>"><?= $example->title()->esc() ?></a></li>
          <?php endforeach ?>
        </ul>
      </div>
      <div class="column" style="--columns: 2">
        <h2>Elsewhere</h2>
        <ul>
          <li><a href="https://wiki.baty.net">Wiki</a></li>
          <li><a href="https://social.lol/@jbaty">Mastodon</a></li>
          <li><a href="https://flickr.com/photos/jbaty">Flickr</a></li>
        </ul>
      </div>
    </div>
  </footer>

  <?= js([
    'assets/js/prism.js',
    'assets/js/lightbox.js',
    'assets/js/index.js',
    '@auto'
  ]) ?>

<script src="https://tinylytics.app/embed/uyf-fc8iNz6N3kmnRreZ.js" defer></script>
</body>
</html>
