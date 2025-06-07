<?php

namespace Hb\SkyblogSlayevalphp\Repository;

use Hb\SkyblogSlayevalphp\Entity\Theme;

class ThemeRepo{
    public function getActive(): Theme{
        $connection = Database::connect();

        $preparedQuery = $connection->prepare("SELECT * FROM theme where is_active = true");
        $preparedQuery->execute();
        $line = $preparedQuery->fetch();
        return new Theme($line["id"],$line["main_bgcolor"],$line["side_bgcolor"],$line["publi_bgcolor"],$line["secondarypubli_color"]);
    }
}