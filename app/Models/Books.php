<?php 

namespace App\Models;

use App\Utils\Database;
use PDO;

class Books {

    private $extract;
    private $title;
    private $author_id;
    private $category_id;

    public function find($bookId) {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `books` WHERE `id` = ' . $bookId;

        $pdoStatement = $pdo->query($sql);

        $book = $pdoStatement->fetchObject(self::class);

        return $book;
    }

    public function findByCategory($categoryId) {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `books` WHERE `category_id` = ' . $categoryId;

        $pdoStatement = $pdo->query($sql);

        $books = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $books;
    }

    public function findAll() {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `books`';

        $pdoStatement = $pdo->query($sql);

        $books = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $books;
    }


    /**
     * Get the value of extract
     */ 
    public function getExtract()
    {
        return $this->extract;
    }

    /**
     * Set the value of extract
     *
     * @return  self
     */ 
    public function setExtract($extract)
    {
        $this->extract = $extract;

        return $this;
    }

    /**
     * Get the value of author_id
     */ 
    public function getAuthor_id()
    {
        return $this->author_id;
    }

    /**
     * Set the value of author_id
     *
     * @return  self
     */ 
    public function setAuthor_id($author_id)
    {
        $this->author_id = $author_id;

        return $this;
    }

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }
}