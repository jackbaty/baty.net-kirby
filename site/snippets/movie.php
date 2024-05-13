        <?php if($image = $page->cover()->toFile()): ?>
        <img class="floatright" width="185px" src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
        <?php endif ?>
<div class="text">
        <?php if ($info = $page->info()->toObject()): ?>
        
        <div class="movieinfo">
            🎬 <b>Directed by:</b> <?= $info->director() ?><br>
            🗓️ <b>Released:</b> <?= $info->year() ?><br>
            🧐 <b>My rating:</b> <?= $info->rating() ?><br>
            🍿 <b>URL:</b> <?php if($page->letterboxd()->isNotEmpty()): ?> <a href="<?= $page->letterboxd() ?>">Letterboxd</a> <?php endif ?>
        </div>
        <?php endif ?> 
                
        

        <blockquote><?= $page->summary() ?></blockquote>  
        
        <div style="margin-top: 30px;">
        <?= $page->text()->kt() ?>
        </div>
        
    </div>  

</div>

<br clear=all>