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

    public function getCategoryById($id)  :Category{
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT name FROM category where id=:id");
        $preparedQuery->bindValue(":id",$id);
        $preparedQuery->execute();

        return new Category($preparedQuery->fetch()["name"],$id);
    }
}