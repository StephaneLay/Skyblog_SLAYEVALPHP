<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\Entity\Category;
use Hb\SkyblogSlayevalphp\Entity\Publication;
use Hb\SkyblogSlayevalphp\Repository\CategoryRepo;
use Hb\SkyblogSlayevalphp\Repository\PublicationRepo;
use Hb\SkyblogSlayevalphp\View\MessageView;
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
        $categoryRepo = new CategoryRepo();
        $publiRepo = new PublicationRepo();
        $publication = $publiRepo->findById($_GET["id"]);

        if(isset($_POST["titre"]) && !empty(trim($_POST["titre"]))){
            $publication->setTitle($_POST["titre"]);
        }

        if (!empty($_FILES["image"]["name"])) {
            if (!file_exists("uploads")) {
                mkdir("uploads");
            }
            $path = $publication->getImgUrl();
            move_uploaded_file($_FILES["image"]["tmp_name"], $path);
        }

        if(isset($_POST["content"]) && !empty(trim($_POST["content"]))){
            $publication->setContent($_POST["content"]);
        }

         if(isset($_POST["category"]) && !empty(trim($_POST["category"]))){
            $publication->setCategory($categoryRepo->getCategoryById($_POST["category"]));
        }
        $publication->setLastUpdate(new \DateTime());
        $publiRepo->update($_GET["id"],$publication);
        return new MessageView("Article modifié !");

    }

}