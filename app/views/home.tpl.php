
<main class="main">
    <div class="counter__div">Nombre d'extraits: <span class="counter"><?= count($totalExtracts); ?></span></div>

        <div class="description">
            <p class="description__content">Bienvenue sur <strong>Find The Words</strong>, un outil qui génère des extraits inspirants de livres qu'on aime!</p>
            <p class="description__content">Clique sur le bouton "Generate" pour trouver les mots qui toucheront ton âme...</p>
        </div>
        <div class="buttons">
            <div class="buttons__states">
                <button class="buttons__btn buttons__options buttons__random"><a href='#' class="buttons__link">Random</a></button>
                <button class="buttons__btn buttons__options buttons__themes"><a href='#' class="buttons__link">Theme</a></button>
            </div>
            <button class="buttons__btn buttons__generate">Generate</button>
        </div>

</main>



