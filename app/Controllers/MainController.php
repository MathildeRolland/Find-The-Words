<?php

namespace App\Controllers;

use App\Controllers\CoreController;
use App\Models\Books;
use App\Models\Categories;
use App\Models\Authors;

class MainController extends CoreController {


    public function home() {

        // J'instancie la classe Books et récupère tous les extraits grâce à sa fonction findAll()
        $bookModel = new Books;
        $totalExtracts = $bookModel->findAll();


        $this->show('home', ['totalExtracts' => $totalExtracts]);

    }

    public function random($params) {
        // Je récupère le nombre aléatoire généré par app.js et passé en URL. C'est l'id de l'extrait que je souhaite afficher.
        $randomNumber = $params['id'];

        // Je crée une nouvelle instance de la classe Books afin de récupérer toute les infos de cet extrait.
        // J'utilise la fonction find avec le nombre aléatoire en  paramètre.
        $bookModel = new Books;
        $extract = $bookModel->find($randomNumber);

        $totalExtracts = $bookModel->findAll();

        // Je crée un objet de la classe Catégories et récupère toute ses infos à partir de son ID
        $categoryId = $extract->getCategory_id(); 
        $categoryModel = new Categories;
        $category = $categoryModel->find($categoryId);

        // Je crée un objet de la classe Authors et récupère toutes ses infos à partir de son ID
        $authorId = $extract->getAuthor_id();
        $authorModel = new Authors;
        $author = $authorModel->find($authorId);

        // J'ajoute $extract, $category et $author afin de pouvoir utiliser toutes leurs infos dans mon template
        $this->show('random', [
            'extract' => $extract,
            'totalExtracts' => $totalExtracts,
            'categorie' => $category,
            'author' => $author,
            'randomNumber' => $randomNumber
        ]);
    }


    public function addExtract() {

        // Je récupère tous les extraits pour le compteur: 
        $bookModel = new Books();
        $totalExtracts = $bookModel->findAll();

        $this->show('add-extract', ['totalExtracts' => $totalExtracts]);
    }

    public function add() {
        if(isset($_POST)) {
            if($_POST['categories'] != "Catégorie: ") {
                $category = new Categories();
                $currentCategory = $category->findByOption(filter_input(INPUT_POST, 'categories'));
                $categoryId = $currentCategory->getId();
                $categoryName = $currentCategory->getName();
            }
            if(!empty($_POST['book-extract'])) {
                $newExtract = filter_input(INPUT_POST, 'book-extract', FILTER_SANITIZE_SPECIAL_CHARS);
            }
            if(strlen($_POST['book-title']) > 2) {
                $newTitle = filter_input(INPUT_POST, 'book-title', FILTER_SANITIZE_SPECIAL_CHARS);
            }
            if(strlen($_POST['book-author']) > 2) {
                $newAuthor = filter_input(INPUT_POST, 'book-author', FILTER_SANITIZE_SPECIAL_CHARS);
            }
            
        }

        $authorModel = new Authors();

        // Je cherche l'auteur dans la BDD
        $author = $authorModel->findByName($newAuthor);
        
        // Si je ne le trouve pas, alors il n'existe pas et je le crée
        if($author == null) {
            $authorModel->setName($newAuthor);
        } 


        $bookModel = new Books();

        // J'attribue à chaque propriété de l'objet la valeur de l'input correspondant
        $bookModel->setTitle($newTitle);
        $bookModel->setExtract($newExtract);
        $bookModel->setAuthor_id($author->getId());
        $bookModel->setCategory_id($categoryId);

        $bookModel->create();

        header('Location:' . $_SERVER['BASE_URI'] . '/add');

    }

}