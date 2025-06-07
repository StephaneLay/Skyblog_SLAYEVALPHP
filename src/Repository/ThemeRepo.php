<?php

namespace Hb\SkyblogSlayevalphp\Repository;

use Hb\SkyblogSlayevalphp\Entity\Theme;

class ThemeRepo{
    public function getActive(): Theme{
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT * FROM theme where is_active = true");
        $preparedQuery->execute();
        $line = $preparedQuery->fetch();
        return new Theme($line["main_bgcolor"],$line["side_bgcolor"],$line["publi_bgcolor"],$line["secondarypubli_color"],true,$line["id"]);
    }

    public function persist(Theme $theme){

        $connection = Database::connect();

        $preparedQuery = $connection->prepare("INSERT INTO theme (main_bgcolor,side_bgcolor,publi_bgcolor,secondarypubli_color) 
        VALUES (:main,:side,:publibg,:publisecond)");

        $preparedQuery->bindValue(":main", $theme->getMainBgColor());
        $preparedQuery->bindValue(":side", $theme->getSideBgColor());
        $preparedQuery->bindValue(":publibg", $theme->getPubliBgColor());
        $preparedQuery->bindValue(":publisecond", $theme->getSecondaryPubliColor());
        $preparedQuery->execute();
    }


    public function getAll(): array{
        $list = [];
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT * FROM theme");
        $preparedQuery->execute();
        foreach ($preparedQuery->fetchAll() as $line) {
            $list[] = new Theme($line["main_bgcolor"],$line["side_bgcolor"],
            $line["publi_bgcolor"],$line["secondarypubli_color"],$line["is_active"],$line["id"]);
        }
        return $list;
    }

    public function setActive(int $id){
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("UPDATE theme set is_active = true where id = :id");
        $preparedQuery->bindValue(":id",$id);

        $preparedQuery->execute();
    }

    public function reset(){
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("UPDATE theme SET is_active = false");
        $preparedQuery->execute();
    }
}