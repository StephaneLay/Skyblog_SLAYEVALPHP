<?php

 namespace Hb\SkyblogSlayevalphp\Repository;

 use Hb\SkyblogSlayevalphp\Entity\Category;
 use Hb\SkyblogSlayevalphp\Entity\Publication;

 class PublicationRepo{
    public function findAll():array{
        $list = [];
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT *,category.id AS category_id FROM publication LEFT JOIN category ON publication.id = category.id");
        $preparedQuery->execute();

        foreach ($preparedQuery->fetchAll() as  $line) {
            $publication = new Publication($line["title"],$line["img_url"],$line["content"],
            new Category($line["name"],$line["category_id"]),$line["creation_date"],$line["id"]);
            $list[] = $publication;
        }
        return $list;
    }
 }