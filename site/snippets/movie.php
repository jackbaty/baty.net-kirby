       
        <?php if($image = $page->cover()->toFile()): ?>
        <img class="floatright" width="185px" src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
        <?php endif ?>
<div class="text">
        
        <div class="movieinfo">
            🎬 <b>Directed by:</b> <?= $page->director() ?><br>
            🗓️ <b>Released:</b> <?= $page->year() ?><br>
            🧐 <b>My rating:</b> <?= $page->rating() ?><br>
            🍿 <b>URL:</b> <?php if($page->letterboxd()->isNotEmpty()): ?> <a href="<?= $page->letterboxd() ?>">Letterboxd</a> <?php endif ?>
        </div>
                
        

        <blockquote><?= $page->summary() ?></blockquote>  
        <br clear="all">
        <div style="margin-top: 30px;">
        <h2>My Review</h2>
        <?= $page->text()->kt() ?>
        </div>
        
    </div>  

</div>

<br clear=all>