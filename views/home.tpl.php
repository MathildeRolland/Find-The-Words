<?php 
    require __DIR__ . '/../db.php'; 
?>

<main class="main">
    <?php foreach($booksDatas as $id => $extract): ?>
        <div class="extract">
            <p class="extract__category"><?= $extract['category_name']; ?></p>
            <div class="extract__card">
                <blockquote class="extract__content">
                    <?= $extract['extract']; ?>
                </blockquote>
                <p class="extract__sources"><?= $extract['book_title']; ?> from <?= $extract['author_name']; ?></p>
            </div>
        </div>
        <div class="buttons">
            <div class="buttons__states">
                <button class="buttons__btn buttons__random">Random</button>
                <button class="buttons__btn buttons__themes">Theme</button>
            </div>
            <button class="buttons__btn buttons__generate" onclick="handleClick()">Generate</button>
        </div>
    <?php endforeach; ?>
</main>



