<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\Core\BaseView;
use Hb\SkyblogSlayevalphp\Repository\PublicationRepo;
use Hb\SkyblogSlayevalphp\View\HomeView;

class HomeController extends BaseController{

    protected function doGet(): BaseView{
        //ON DEVRA PEUT ETRE LIMITER LES RESULTATS AUX REQUETES DE 
        $publiRepo = new PublicationRepo();
        return new HomeView($publiRepo->findAll());
    }
}