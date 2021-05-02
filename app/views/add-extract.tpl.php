<main class="main">

    <h2>Ajoute ton extrait</h2>
    <form action="" method="POST" class="new-extract">
        <div class="new-extract__wrapper">
            <select name="categories" id="categories" class="header__select">
                <option value="">Catégorie: </option>
                <?php foreach($categories as $category): ?>
                    <option value="<?= $category->getOption_selected(); ?>"><?= $category->getName(); ?></option>
                <?php endforeach; ?>
            </select>
            <div class="new-extract__div">
                <label for="book-title" class="new-extract__label">Titre du livre:</label>
                <input type="text" name="book-title" id="book-title" class="new-extract__input">
            </div>
            <div class="new-extract__div">
                <label for="book-author" class="new-extract__label">Nom de l'auteur:</label>
                <input type="text" name="book-author" id="book-author" class="new-extract__input">
            </div>
            <div class="new-extract__div">
                <label for="book-extract" class="new-extract__label">Extrait:</label>
                <textarea name="book-extract" id="book-extract" class="new-extract__input" cols="30" rows="10"></textarea>
            </div>
            <input type="submit" value="Envoyer" class="submit">
        </div>
    </form>

</main>