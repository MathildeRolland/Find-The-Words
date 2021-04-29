
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font: Cormorant Garamond + Crimson Text-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;1,400;1,500&family=Crimson+Text:ital@0;1&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="../public/css/style.css">
    <title>Find The Words</title>
</head>
<body>
    <div class="container">

        <header class="header">
            <div class="header__titles">
                <h1 class="header__first-title"><a href="<?= $router->generate('home'); ?>">Find the words</a></h1>
                <h2 class="header__second-title">(A words from books generator)</h2>
            </div>

            <div class="burger">
                <div class="burger__line line1"></div>
                <div class="burger__line line2"></div>
                <div class="burger__line line3"></div>
            </div>
            <nav class="header__nav">
                <ul class="header__list">
                    <li class="header__list-item">
                        <form>
                            <select name="themes" id="themes">
                            <option value="">Thèmes</option>
                                <?php foreach($categories as $category): ?>
                                    <option value="<?= $category->getOption_selected(); ?>"><?= $category->getName(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </li>
                    <li class="header__list-item"><a href="<?= $router->generate('addExtract'); ?>" class="header__link">Add</a></li>
                    <li class="header__list-item"><a href="#" class="header__link">Dark Mode</a></li>
                </ul>
            </nav>
        </header>