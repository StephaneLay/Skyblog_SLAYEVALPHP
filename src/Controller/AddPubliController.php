<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\Entity\Publication;
use Hb\SkyblogSlayevalphp\Repository\CategoryRepo;
use Hb\SkyblogSlayevalphp\Repository\CommentRepo;
use Hb\SkyblogSlayevalphp\Repository\PublicationRepo;
use Hb\SkyblogSlayevalphp\View\AddPubliView;

class AddPubliController extends BaseController{
    protected function doGet(): \Hb\SkyblogSlayevalphp\Core\BaseView{
        $categoryRepo = new CategoryRepo();
        return new AddPubliView($categoryRepo->findAll());
    }

    protected function doPost(){
        
        $filename = uniqid().".jpg";
        if (!file_exists("uploads")) {
             mkdir("uploads");
        }
        $path = "uploads/"."$filename";
        move_uploaded_file($_FILES["image"]["tmp_name"],$path);

        //2) TOUT INSERT EN SQL ENSUITE AVEC LE BON PATH PRECEDEMMENT RENSEIGNE

        $publicationRepo = new PublicationRepo();
        $categoryRepo = new CategoryRepo();
        $publicationRepo->persist(new Publication($_POST["titre"],$path,$_POST["content"],
        $categoryRepo->getCategoryById($_POST["category"]),"",0));
        return $this->doGet();
    }
}