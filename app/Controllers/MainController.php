<?php

namespace App\Controllers;

use App\Models\Books;
use App\Models\Categories;
use App\Models\Authors;

class MainController {


    public function home() {

        $this->show('home');

    }

    public function random($params) {
        // Je récupère le nombre aléatoire généré par app.js et passé en URL. C'est l'id de l'extrait que je souhaite afficher.
        $randomNumber = $params['id'];

        // Je crée une nouvelle instance de la classe Books afin de récupérer toute les infos de cet extrait.
        // J'utilise la fonction find avec le nombre aléatoire en  paramètre.
        $bookModel = new Books;
        $extract = $bookModel->find($randomNumber);

        // Je crée un objet de la classe Catégories et récupère toute ses infos à partir de son ID
        $categoryId = $extract->getCategory_id(); 
        dump($categoryId);
        $categoryModel = new Categories;
        $category = $categoryModel->find($categoryId);

        // Je crée un objet de la classe Authors et récupère toutes ses infos à partir de son ID
        $authorId = $extract->getAuthor_id();
        $authorModel = new Authors;
        $author = $authorModel->find($authorId);

        // J'ajoute $extract, $category et $author afin de pouvoir utiliser toutes leurs infos dans mon template
        $this->show('random', $viewVars = [
            'extract' => $extract,
            'category' => $category,
            'author' => $author
        ]);
    }

    public function show($viewName, $viewVars = []) {

        // J'instancie la classe Books et récupère tous les extraits grâce à sa fonction findAll()
        $bookModel = new Books;
        $totalExtracts = $bookModel->findAll();

        extract($viewVars);

        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }

}