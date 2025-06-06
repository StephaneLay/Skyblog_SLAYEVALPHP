<?php

namespace Hb\SkyblogSlayevalphp\Repository;

use DateTime;
use Hb\SkyblogSlayevalphp\Entity\Category;
use Hb\SkyblogSlayevalphp\Entity\Publication;

class PublicationRepo
{
    public function findAll(): array
    {
        $list = [];
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT publication.id,title,img_url,last_update_time,publication.content,name,publication.creation_date,category.id AS category_id,comment.id AS comment_id,COUNT(comment.id) AS amount
        FROM publication LEFT JOIN category ON publication.category_id = category.id LEFT JOIN comment ON publication.id = comment.publication_id GROUP BY publication.id");
        $preparedQuery->execute();

        foreach ($preparedQuery->fetchAll() as $line) {
            $publication = new Publication(
                $line["title"],
                $line["img_url"],
                $line["content"],
                new Category($line["name"], $line["category_id"]),
                new DateTime($line["creation_date"]),
                $line["amount"],
                $line["id"],
                !empty($line["last_update_time"]) ? new DateTime($line["last_update_time"]): null
            );
            $list[] = $publication;
        }
        return $list;
    }

    public function findById($id): Publication
    {
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT * from publication LEFT JOIN category ON publication.category_id = category.id
        where publication.id = :id");
        $preparedQuery->bindValue(":id", $id);
        $preparedQuery->execute();

        $line = $preparedQuery->fetch();
        return new Publication(
            $line["title"],
            $line["img_url"],
            $line["content"],
            new Category($line["name"], $line["category_id"]),
            new DateTime($line["creation_date"]),
            $line["comment_count"],
            $line["id"],
            $line["last_update_time"] ? new DateTime($line["last_update_time"]): null
        );

    }

    public function getPublicationSum(): int
    {
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT Count(*) AS count from publication");
        $preparedQuery->execute();
        $line = $preparedQuery->fetch();
        return $line["count"];
    }

    public function persist(Publication $publication)
    {
        $connection = Database::connect();

        $preparedQuery = $connection->prepare('INSERT INTO publication(title,img_url,content,creation_date,comment_count,category_id) 
        VALUES(:titre,:url,:content,NOW(),0,:category_id)');

        $preparedQuery->bindValue(":titre", $publication->getTitle());
        $preparedQuery->bindValue(":url", $publication->getImgUrl());
        $preparedQuery->bindValue(":content", $publication->getContent());
        $preparedQuery->bindValue(":category_id", $publication->getCategory()->getId());

        $preparedQuery->execute();
    }

    public function update(int $id, Publication $publication)
    {
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("UPDATE publication SET title = :titre , content = :content ,
        category_id = :category_id , last_update_time = NOW() where id = :id");
        $preparedQuery->bindValue(":titre", $publication->getTitle());
        $preparedQuery->bindValue(":content", $publication->getContent());
        $preparedQuery->bindValue(":category_id", $publication->getCategory()->getId());
        $preparedQuery->bindValue(":id", $id);

        $preparedQuery->execute();

    }

    public function addCommentCount($id)
    {
        $connection = Database::connect();

        $preparedQuery = $connection->prepare('UPDATE publication SET comment_count = comment_count +1 where id = :id');
        $preparedQuery->bindValue(":id", $id);
        $preparedQuery->execute();

    }

    public function findByCategoryId($categoryId)
    {
        $list = [];
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT * from publication LEFT JOIN category ON publication.category_id = category.id
        where category_id = :categoryId");
        $preparedQuery->bindValue(":categoryId", $categoryId);
        $preparedQuery->execute();

        foreach ($preparedQuery->fetchAll() as $line) {
            $publication = new Publication(
                $line["title"],
                $line["img_url"],
                $line["content"],
                new Category($line["name"], $line["category_id"]),
                new DateTime($line["creation_date"]),
                $line["comment_count"],
                $line["id"],
                $line["last_update_time"] ? new DateTime($line["last_update_time"]): null
            );
            $list[] = $publication;
        }
        return $list;
    }

    public function deleteById($id){
        $connection = Database::connect();

        $preparedQuery = $connection->prepare(("DELETE from publication where id = :id"));
        $preparedQuery->bindValue(":id",$id);

        $preparedQuery->execute();
    }

    public function filterResults(string $search)
    {
        $list = [];
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("select * from publication LEFT JOIN category ON publication.category_id = category.id where title 
        LIKE :search OR content LIKE :search");
        $preparedQuery->bindValue("search", "%" . $search . "%");
        $preparedQuery->execute();

        foreach ($preparedQuery->fetchAll() as $line) {
            $publication = new Publication(
                $line["title"],
                $line["img_url"],
                $line["content"],
                new Category($line["name"], $line["category_id"]),
                new DateTime($line["creation_date"]),
                $line["comment_count"],
                $line["id"],
                $line["last_update_time"] ? new DateTime($line["last_update_time"]): null
            );
            $list[] = $publication;
        }
        return $list;
    }
}