<?php

namespace Hb\SkyblogSlayevalphp\Repository;

use Hb\SkyblogSlayevalphp\Entity\Comment;
use Hb\SkyblogSlayevalphp\Entity\Publication;

class CommentRepo
{
    public function addComment(string $username,string $content,int $publicationId)
    {
        $connection = Database::connect();

        $preparedQuery = $connection->prepare(
            "INSERT INTO comment (user_name,content,creation_date,publication_id) VALUES
            (:username,:content,NOW(),:publicationId)"
        );
        $preparedQuery->bindValue(":username", $username);
        $preparedQuery->bindValue(":content", $content);
        $preparedQuery->bindValue(":publicationId", $publicationId);
        $preparedQuery->execute();
    }

    public function getCommentSum(): int{
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT Count(*) AS count from comment");
        $preparedQuery->execute();
        $line = $preparedQuery->fetch();
        return $line["count"];
    }

    public function getCommentsByPublicationId($publicationId){
        $list = [];

        $connection = Database::connect();
        
        $preparedQuery = $connection->prepare("SELECT * from comment where publication_id = :publicationId" );

        $preparedQuery->bindValue(":publicationId",$publicationId);
        $preparedQuery->execute();

        foreach ($preparedQuery->fetchAll() as $line) {
            
            $comment = new Comment($line["user_name"],$line["content"]
            ,$line["creation_date"],$publicationId);
            $list[] = $comment;
        }
        return $list;

    }
    
}