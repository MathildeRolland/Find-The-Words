
<main class="main">
    <div class="counter__div">Nombre d'extraits: <span class="counter"><?= count($books); ?></span></div>

    <h2><?= $categorie->getName(); ?></h2>
        <?php foreach($books as $book): ?>
        <?php $currentAuthor = $authors[$book->getAuthor_id()]; ?>
            <div class="extract">
                <div class="extract__card">
                    <blockquote class="extract__content">
                        <?= $book->getExtract(); ?>
                    </blockquote>
                    <p class="extract__sources"><?= $book->getTitle(); ?>, <?= $currentAuthor->getName(); ?></p>
                </div>
            </div>
        <?php endforeach; ?>    

</main>