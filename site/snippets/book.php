<article>
    <div class="book">
        <?php if($image = $page->cover()->toFile()): ?>
        <img class="floatleft" width="185px" src="<?= $image->url() ?>" alt="<?= $image->alt() ?>">
        <?php endif ?>

        <?php if ($info = $page->info()->toObject()): ?>
        <p>
            ✍️ <b>Written by:</b> <?= $info->author() ?><br>
            🏷️ <b>Genre:</b> <?= $info->genre() ?><br>
            🗓️ <b>Published:</b> <?= $info->published() ?><br>
            📄 <b>Pages:</b> <?= $info->pages() ?><br>
            🧐 <b>My rating:</b> <?= $info->rating() ?>
        </p>
        <?php endif ?> 
                
        <div class="spacer"></div>

        <p markdown="1"><?= $page->summary() ?></p>  
    </div>  

    <?php if($page->amazon()->isNotEmpty()): ?> <a class="button" href="<?= $page->amazon() ?>">Buy on Amazon</a> <?php endif ?> &nbsp;&nbsp;&nbsp;&nbsp; <?php if($page->kobo()->isNotEmpty()): ?> <a class="button" href="<?= $page->kobo() ?>">Buy on Kobo</a> <?php endif ?>

    <?= $page->text()->kirbytext() ?>