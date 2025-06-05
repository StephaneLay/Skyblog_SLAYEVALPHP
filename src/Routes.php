<?php

namespace Hb\SkyblogSlayevalphp;

use Hb\SkyblogSlayevalphp\Controller\AddComController;
use Hb\SkyblogSlayevalphp\Controller\AddPubliController;
use Hb\SkyblogSlayevalphp\Controller\ComListController;
use Hb\SkyblogSlayevalphp\Controller\HomeController;
use Hb\SkyblogSlayevalphp\Controller\ManagePubliController;
use Hb\SkyblogSlayevalphp\Controller\UpdatePubliController;

class Routes{
    public static function defineRoutes(){
        return [
            "/" => new HomeController(),
            "/add-com" => new AddComController(),
            "/list-coms" => new ComListController(),
            "/new-publi" => new AddPubliController(),
            "/manage-publi" => new ManagePubliController(),
            "/update-publi" => new UpdatePubliController()


        ];
    }
}