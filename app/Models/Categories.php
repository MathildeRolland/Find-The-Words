<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Categories extends CoreModel {


    public function find($categoryId) {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `categories` WHERE `id` = ' . $categoryId;

        $pdoStatement = $pdo->query($sql);

        $category = $pdoStatement->fetchObject('Categories');

        return $category;
    }

    public function findAll() {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `categories`';

        $pdoStatement = $pdo->query($sql);

        $categories = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        return $categories;
    }

}