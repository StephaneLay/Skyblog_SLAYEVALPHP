<?php

 namespace Hb\SkyblogSlayevalphp\Repository;

 use Hb\SkyblogSlayevalphp\Entity\Category;
 use Hb\SkyblogSlayevalphp\Entity\Publication;

 class PublicationRepo{
    public function findAll():array{
        $list = [];
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT publication.id,title,img_url,publication.content,name,publication.creation_date,category.id AS category_id,comment.id AS comment_id,COUNT(comment.id) AS amount
        FROM publication LEFT JOIN category ON publication.id = category.id LEFT JOIN comment ON publication.id = comment.id GROUP BY publication.id");
        $preparedQuery->execute();

        foreach ($preparedQuery->fetchAll() as  $line) {
            $publication = new Publication($line["title"],$line["img_url"],$line["content"],
            new Category($line["name"],$line["category_id"]),$line["creation_date"], $line["amount"],$line["id"]);
            $list[] = $publication;
        }
        return $list;
    }
 }