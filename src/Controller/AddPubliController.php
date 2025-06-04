<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\Entity\Publication;
use Hb\SkyblogSlayevalphp\Repository\CategoryRepo;
use Hb\SkyblogSlayevalphp\Repository\CommentRepo;
use Hb\SkyblogSlayevalphp\Repository\PublicationRepo;
use Hb\SkyblogSlayevalphp\View\AddPubliView;

class AddPubliController extends BaseController
{
    protected function doGet(): \Hb\SkyblogSlayevalphp\Core\BaseView
    {
        $categoryRepo = new CategoryRepo();
        return new AddPubliView($categoryRepo->findAll(), null);
    }

    protected function doPost()
    {

        $categoryRepo = new CategoryRepo();
        if (!isset($_POST["titre"]) || empty(trim($_POST["titre"]))) {
            return new AddPubliView($categoryRepo->findAll(), "Vous devez rentrer un type !");
        }
        if (!isset($_POST["category"])) {
            return new AddPubliView($categoryRepo->findAll(), "Vous devez selectionner une catégorie !");
        }
        if (!empty($_FILES["image"]["name"])) {
            $filename = uniqid() . "." . pathinfo($_FILES["image"]["name"])["extension"];
            if (!file_exists("uploads")) {
                mkdir("uploads");
            }
            $path = "uploads/" . "$filename";
            move_uploaded_file($_FILES["image"]["tmp_name"], $path);
        }else {
            $path = "";
        }
        $publicationRepo = new PublicationRepo();

        $publicationRepo->persist(new Publication(
            $_POST["titre"],
            $path,
            $_POST["content"],
            $categoryRepo->getCategoryById($_POST["category"]),
            "",
            0
        ));
        return new AddPubliView($categoryRepo->findAll(), null);
    }
}