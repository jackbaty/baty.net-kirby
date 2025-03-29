<?php snippet('header') ?>
<?php snippet('intro') ?>

<article>
  <div class="text">
    <?= $page->text()->kt() ?>
  </div>
</article>

<aside class="contact">
  <h2 class="h1">Contact me</h2>
  <div class="grid" style="--gutter: 1.5rem">
    <section class="column text" style="--columns: 4">
      <h3>Address</h3>
      <?= $page->address() ?>
    </section>
    <section class="column text" style="--columns: 4">
      <h3>Email</h3>
      <p><?= Html::email($page->email()) ?></p>
      <h3>Phone</h3>
      <p><?= Html::tel($page->phone()) ?></p>
    </section>
    <section class="column text" style="--columns: 4">
      <h3>On the web</h3>
      <ul>
        <?php foreach ($page->social()->toStructure() as $social): ?>
        <li><?= Html::a($social->url(), $social->platform()) ?></li>
        <?php endforeach ?>
      </ul>
    </section>
  </div>
</aside>

<?php snippet('footer') ?>
