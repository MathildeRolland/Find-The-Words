<?php 
    require __DIR__ . '/../db.php'; 
?>

<main class="main">
    <div class="counter__div">Total extracts: <span class="counter"><?= count($booksDatas); ?></span></div>

        <div class="extract">
            <p class="extract__category"><?= $booksDatas[$randomId]['category_name']; ?></p>
            <div class="extract__card">
                <blockquote class="extract__content">
                    <?= $booksDatas[$randomId]['extract']; ?>
                </blockquote>
                <p class="extract__sources"><?= $booksDatas[$randomId]['book_title']; ?> , <?= $booksDatas[$randomId]['author_name']; ?></p>
            </div>
        </div>
        <div class="buttons">
            <div class="buttons__states">
                <button class="buttons__btn buttons__options buttons__random"><a href='#' class="buttons__link">Random</a></button>
                <button class="buttons__btn buttons__options buttons__themes"><a href='#' class="buttons__link">Theme</a></button>
            </div>
            <button class="buttons__btn buttons__generate">Generate</button>
        </div>

</main>



