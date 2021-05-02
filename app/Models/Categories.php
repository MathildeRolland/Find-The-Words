<?php

namespace App\Models;

use App\Utils\Database;
use PDO;


class Categories extends CoreModel {

    private $option_selected;
    
    // Fonction trouvant une catégorie à partir de son id
    public function find($categoryId) {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `categories` WHERE `id` = ' . $categoryId;

        $pdoStatement = $pdo->query($sql);

        $category = $pdoStatement->fetchObject(self::class);

        return $category;
    }

    // Fonction trouvant une catégorie à partir de son option
    public function findByOption($themeSelected) {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `categories` WHERE `option_selected`=' . '"' . $themeSelected . '"';
        
        $pdoStatement = $pdo->query($sql);

        $category = $pdoStatement->fetchObject(self::class);

        return $category;
    }
    

    public function findAll() {
        $pdo = Database::getPDO();

        $sql = 'SELECT * FROM `categories`';

        $pdoStatement = $pdo->query($sql);

        $categories = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $categories;
    }


    /**
     * Get the value of option_selected
     */ 
    public function getOption_selected()
    {
        return $this->option_selected;
    }

    /**
     * Set the value of option_selected
     *
     * @return  self
     */ 
    public function setOption_selected($option_selected)
    {
        $this->option_selected = $option_selected;

        return $this;
    }
}