<?php

class MainController {
    public function home() {
        $this->show('home');
    }

    public function show($viewName) {
        require __DIR__ . '/../views/header.tpl.php';
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.tpl.php';
    }
}