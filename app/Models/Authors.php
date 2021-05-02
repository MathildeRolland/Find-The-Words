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

    public function findByName($authorName) {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM `authors` WHERE `name` = '{$authorName}'";

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

    public function create() {
        $pdo = Database::getPDO();
        
        // Requête sql
        $sql="
            INSERT INTO `authors` (name)
            VALUES ('{$this->name}')
        ";

        // J'exécute cette requête
        $insertedRows = $pdo->exec($sql);

        // Si au moins une ligne est insérée, son id sera égal au dernier id inséré (auto-incrémentation)
        if($insertedRows > 0) {
            $this->id = $pdo->lastInsertId();

            return true;
        }

        return false;

    }
}