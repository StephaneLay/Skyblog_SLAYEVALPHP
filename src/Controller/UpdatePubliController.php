<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\Repository\CategoryRepo;
use Hb\SkyblogSlayevalphp\Repository\PublicationRepo;
use Hb\SkyblogSlayevalphp\View\UpdatePubliView;

class UpdatePubliController extends BaseController
{
    public function doGet(): \Hb\SkyblogSlayevalphp\Core\BaseView
    {   $categoryRepo = new CategoryRepo();
        $publiRepo = new PublicationRepo();
        return new UpdatePubliView($publiRepo->findById($_GET["id"]),$categoryRepo->findAll());
    }

    public function doPost(){
        // FAIRE UN PEU COMME DANS ADDPUBLICONTROLLER SAUF QUE TOUT CE QUI EST VIDE = ON REPRENDS LA VALEUR D'AVANT . 
        //ON VA DONC FAIRE ICI  LA VERIF DES INFOS ET SI C'EST VIDE ON CHANGERA PAS LES DATAS
        //ON DEVRA ENCOYER DANS UNE REQ UPDATE UNE NOUVELLE PUBLI DONC ON RECUPERERA LANCIENNE EN SQL 
        //PUIS ON LA COMPARE ET ON ENVOIE AU SQL
    }

}