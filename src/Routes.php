<?php

namespace Hb\SkyblogSlayevalphp;

use Hb\SkyblogSlayevalphp\Controller\AddComController;
use Hb\SkyblogSlayevalphp\Controller\ComListController;
use Hb\SkyblogSlayevalphp\Controller\HomeController;

class Routes{
    public static function defineRoutes(){
        return [
            "/" => new HomeController(),
            "/add-com" => new AddComController(),
            "/list-coms" => new ComListController()
        ];
    }
}