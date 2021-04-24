<?php

namespace App\Controllers;

use App\Models;

class MainController {


    public function home() {
        $this->show('home');
    }

    public function random($params) {
        $book = new Books();
    }

    public function show($viewName, $viewVars = []) {
        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }

}