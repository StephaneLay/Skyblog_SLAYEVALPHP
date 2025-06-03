<?php

namespace Hb\SkyblogSlayevalphp\Repository;

class CommentRepo
{
    public function addComment($username, $content, $publicationId)
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

    
}