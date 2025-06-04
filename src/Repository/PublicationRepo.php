<?php

 namespace Hb\SkyblogSlayevalphp\Repository;

 use Hb\SkyblogSlayevalphp\Entity\Category;
 use Hb\SkyblogSlayevalphp\Entity\Publication;

 class PublicationRepo{
    public function findAll():array{
        $list = [];
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT publication.id,title,img_url,publication.content,name,publication.creation_date,category.id AS category_id,comment.id AS comment_id,COUNT(comment.id) AS amount
        FROM publication LEFT JOIN category ON publication.category_id = category.id LEFT JOIN comment ON publication.id = comment.publication_id GROUP BY publication.id");
        $preparedQuery->execute();

        foreach ($preparedQuery->fetchAll() as  $line) {
            $publication = new Publication($line["title"],$line["img_url"],$line["content"],
            new Category($line["name"],$line["category_id"]),$line["creation_date"], $line["amount"],$line["id"]);
            $list[] = $publication;
        }
        return $list;
    }

    public function persist(Publication $publication){
        $connection = Database::connect();

        $preparedQuery = $connection->prepare('INSERT INTO publication(title,img_url,content,creation_date,comment_count,category_id) 
        VALUES(:titre,:url,:content,NOW(),0,:category_id)');

        $preparedQuery->bindValue(":titre",$publication->getTitle());
        $preparedQuery->bindValue(":url",$publication->getImgUrl());
        $preparedQuery->bindValue(":content",$publication->getContent());
        $preparedQuery->bindValue(":category_id",$publication->getCategory()->getId());

        $preparedQuery->execute();

 
    }
 }