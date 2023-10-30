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
      
    </div>
  </footer>

  <?= js([
      'assets/js/prism.js',
      'assets/js/lightbox.js',
      'assets/js/index.js',
      '@auto'
  ]) ?>

  <script src="https://tinylytics.app/embed/uyf-fc8iNz6N3kmnRreZ.js?kudos" defer></script>
</body>
</html>
