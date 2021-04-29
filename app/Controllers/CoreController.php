<?php

namespace App\Controllers;

use App\Models\Books;
use App\Models\Categories;

class CoreController {
    public function show($viewName, $viewVars = []) {

        global $router;
        
        // J'instancie la classe Books et récupère tous les extraits grâce à sa fonction findAll()
        $bookModel = new Books;
        $totalExtracts = $bookModel->findAll();

        // J'instancie la classe Categories et les récupère toutes
        $categoryModel = new Categories();
        $categories = $categoryModel->findAll();

        extract($viewVars);

        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }
}