<?php
namespace App\Controllers;

use App\Models\Categories;
use App\Models\Books;
use App\Models\Authors;

class ListController extends CoreController {


    public function list($params) {
        // Je récupère la valeur du select
        $currentTheme = $params['action'];
       
        // Je récupère la catégorie en fonction de cette valeur
        $categoryModel = new Categories();
        $category = $categoryModel->findByOption($currentTheme);

        // Je récupère tous les livres de cette catégorie
        $bookModel = new Books();
        $books = $bookModel->findByCategory($category->getId());

        // Je récupère tous les auteurs (dans un tableau réorganisé)
        $authorModel = new Authors();
        $authors = $authorModel->findAll();

        $this->show('list', [
            'totalExtracts' => $books,
            'categorie' => $category,
            'authors' => $authors
        ]);
    }
}