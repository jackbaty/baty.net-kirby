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
    <div class="autogrid">
      <div class="column align-center" style="--columns: 1">
          <p>
              Copyright © 2000-2025 Jack Baty
          </p>
  <p>
  <a rel="me" href="https://social.lol/@jbaty" aria-label="Follow me on Mastodon">
    <?= svg('assets/icons/mastodon.svg') ?>
  </a>
  
    <a rel="me" href="https://mastodon.social/@batybot" aria-label="Posts syndicated to Mastodon">
    <?= svg('assets/icons/mastodon.svg') ?>
  </a>
  
  <a rel="me" href="https://flickr.com/photos/jbaty" aria-label="Flickr">
    <?= svg('assets/icons/flickr.svg') ?>
  </a>
  
  <a rel="me" href="https://glass.photo/jbaty" aria-label="Glass">
    <?= svg('assets/icons/glass.svg') ?>
  </a>

  <a rel="me" href="https://instagram.com/jackbatyphoto" aria-label="Follow me on Instagram">
    <?= svg('assets/icons/instagram.svg') ?>
  </a>

  <a rel="me" href="/feed" aria-label="Subscribe to RSS feed">
      <?= svg('assets/icons/rss.svg') ?>
  </a>
  </p>

      </div>
      
    </div>
  </footer>

  <?= js([
      'assets/js/prism.js?v=20231109',
      'assets/js/lightbox.js',
      'assets/js/index.js',
      '@auto'
  ]) ?>
</body>
</html>
