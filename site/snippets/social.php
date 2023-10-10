<?php
/*
  Snippets are a great way to store code snippets for reuse
  or to keep your templates clean.

  In this snippet the svg() helper is a great way to embed SVG
  code directly in your HTML. Pass the path to your SVG
  file to load it.

  More about snippets:
  https://getkirby.com/docs/guide/templates/snippets
*/
?>
<span class="social">
  <a rel="me" href="https://social.lol/@jbaty" aria-label="Follow me on Mastodon">
    <?= svg('assets/icons/mastodon.svg') ?>
  </a>
  <a rel="me" href="https://instagram.com/jackbatyphoto" aria-label="Follow me on Instagram">
    <?= svg('assets/icons/instagram.svg') ?>
  </a>
</span>
