
<main class="main">
    <div class="counter__div">Nombre d'extraits: <span class="counter"><?= count($totalExtracts); ?></span></div>

        <div class="extract">
            <p class="extract__category"><?= $category->getName(); ?></p>
            <div class="extract__card">
                <blockquote class="extract__content">
                    <?= $extract->getExtract(); ?>
                </blockquote>
                <p class="extract__sources"><?= $extract->getTitle(); ?>, <?= $author->getName(); ?></p>
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