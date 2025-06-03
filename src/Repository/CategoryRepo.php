<?php

namespace Hb\SkyblogSlayevalphp\Repository;

use Hb\SkyblogSlayevalphp\Entity\Category;

class CategoryRepo{
    public function findAll(){
        $list = [];
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT * FROM category");
        $preparedQuery->execute();

        foreach ($preparedQuery->fetchAll() as  $line) {
            $category = new Category($line["name"],$line["id"]);
            $list[] = $category;
        }
        return $list;
    }
}