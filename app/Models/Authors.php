<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Authors extends CoreModel {
    

    public function find($authorId) {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `authors` WHERE `id` = ' . $authorId;

        $pdoStatement = $pdo->query($sql);

        $author = $pdoStatement->fetchObject('Authors');

        return $author;
    }

    public function findAll() {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `authors`';

        $pdoStatement = $pdo->query($sql);

        $authors = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        return $authors;
    }

}