<?php
// J'inclus l'autoload de vendor
require __DIR__ . "/../vendor/autoload.php";

// J'inclus le MainController
// require __DIR__ . "/../app/controllers/MainController.php";

// J'inclus le Design Pattern : Singleton
// require __DIR__ . "/../app/Utils/Database.php";

// J'inclus les models
// require __DIR__ . "/../app/Models/CoreModel.php";
// require __DIR__ . "/../app/Models/Books.php";
// require __DIR__ . "/../app/Models/Categories.php";
// require __DIR__ . "/../app/Models/Authors.php";


// Je crée mon routeur en instanciant altorouter
$router = new AltoRouter();
$router->setBasePath($_SERVER['BASE_URI']);

$router->map(
    'GET', 
    '/', 
    [
        'controller' => 'MainController',
        'method' => 'home'
    ],
    'main-home'
);

$router->map(
    'GET',
    '/[i:id]',
    [
        'controller' => 'MainController',
        'method' => 'random'
    ],
    'main-random'
);

$router->map(
    'GET', 
    '/add',
    [
        'controller' => 'MainController',
        'method' => 'addExtract'
    ],
    'main-addExtract'
);

$router->map(
    'POST', 
    '/add',
    [
        'controller' => 'MainController',
        'method' => 'add'
    ],
    'main-add'
);

$router->map(
    'GET', 
    '/[a:action]',
    [
        'controller' => 'ListController',
        'method' => 'list'
    ],
    'list-list'
);



$match = $router->match();

if($match !== false) {
    // Je récupère le controller à utiliser
    $controllerToUse = "App\Controllers\\" . $match['target']['controller'];
    // /!\ ne pas oublier d'exécuter la commande: composer dump-autoload

    
    // Je récupère la méthode à utiliser
    $methodToUse = $match['target']['method'];

    // J'instancie un nouvel objet de la classe MainController, qui gèrera l'affichage de ma page
    $controller = new $controllerToUse();

    $controller->$methodToUse($match['params']);
} else {
    echo "Page 404";
}



