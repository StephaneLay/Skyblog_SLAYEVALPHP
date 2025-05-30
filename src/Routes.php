<?php

namespace Hb\SkyblogSlayevalphp;

use Hb\SkyblogSlayevalphp\Controller\HomeController;

class Routes{
    public static function defineRoutes(){
        return [
            "/" => new HomeController()
        ];
    }
}