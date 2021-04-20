<?php
require __DIR__ . "./controllers/MainController.php";
require __DIR__ . "./db.php";

// J'instancie un nouvel objet de la classe MainController, qui gèrera l'affichage de ma page
$controller = new MainController;

// Je récupère le paramètre GET passé en URL
$page = filter_input(INPUT_GET, 'page');

// J'adapte la page en fonction du paramètre passé (ici il n'y en a qu'une)
if($page = '/') {
    $controller->home();
}


