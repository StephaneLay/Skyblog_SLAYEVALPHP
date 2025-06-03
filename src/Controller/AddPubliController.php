<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\Repository\CategoryRepo;
use Hb\SkyblogSlayevalphp\View\AddPubliView;

class AddPubliController extends BaseController{
    protected function doGet(): \Hb\SkyblogSlayevalphp\Core\BaseView{
        $categoryRepo = new CategoryRepo();
        return new AddPubliView($categoryRepo->findAll());
    }

    protected function doPost(){
        //ON VA DEVOIR FAIRE 2 CHOSES:
        //1) ENREGISTRER LE FICHIER UPLOADE AVEC LA GLOBALE $_FILES
        //2) TOUT INSERT EN SQL ENSUITE AVEC LE BON PATH PRECEDEMMENT RENSEIGNE
    }
}