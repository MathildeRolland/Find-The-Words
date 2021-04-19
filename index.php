<?php

require __DIR__ . "./controllers/MainController.php";

$controller = new MainController();
$page = filter_input(INPUT_GET, 'page');
var_dump($page);

if($page = '/') {
    $controller->home();
}