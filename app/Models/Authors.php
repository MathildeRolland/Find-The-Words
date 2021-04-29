<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Authors extends CoreModel {
    

    public function find($authorId) {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `authors` WHERE `id` = ' . $authorId;

        $pdoStatement = $pdo->query($sql);

        $author = $pdoStatement->fetchObject(self::class);

        return $author;
    }

    public function findAll() {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `authors`';

        $pdoStatement = $pdo->query($sql);

        $authors = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        // Je crée un tableau qui remanie les données.
        // Les clés sont maintenant les ids de chaque auteur
        $sortedAuthors = [];
        foreach($authors as $author) {
            $sortedAuthors[$author->getId()] = $author;
        }

        return $sortedAuthors;
    }

    public function findById($authorId) {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `authors` WHERE `id` =' . $authorId;

        $pdoStatement = $pdo->query($sql);

        $authors = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $authors;
    }
}