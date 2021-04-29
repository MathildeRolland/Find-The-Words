
<main class="main">
    <div class="counter__div">Nombre d'extraits: <span class="counter"><?= count($totalExtracts); ?></span></div>

        <div class="extract">
            <p class="extract__category"><?= $categorie->getName(); ?></p>
            <div class="extract__card">
                <blockquote class="extract__content">
                    <?= $extract->getExtract(); ?>
                </blockquote>
                <p class="extract__sources"><?= $extract->getTitle(); ?>, <?= $author->getName(); ?></p>
            </div>
        </div>
        <div class="buttons">
            <button class="buttons__btn buttons__generate generate">Generate</button>
        </div>
</main>