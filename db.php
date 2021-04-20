<?php

/**
 * Connexion à la BDD
 */
$dsn = 'mysql:host=localhost;dbname=findthewords';
$user = 'root';
$pass = '';

$pdo = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));




/**
 * UILISATION DE LA BDD
 */
// J'exécute ma requête sql: je sélectionne toutes les infos de la table books, jointes aux tables catégories et authors
$sql = "
SELECT * FROM books
INNER JOIN categories ON books.category_id=categories.id
INNER JOIN authors ON books.author_id=authors.id
";
$pdoStatement = $pdo->query($sql);


// Je récupère les données
$rawDatas = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);
$booksDatas = [];
foreach($rawDatas as $id => $extract) {
    $booksDatas[] = $extract;
}

