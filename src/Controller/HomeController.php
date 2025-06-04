<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\Core\BaseView;
use Hb\SkyblogSlayevalphp\Repository\CategoryRepo;
use Hb\SkyblogSlayevalphp\Repository\CommentRepo;
use Hb\SkyblogSlayevalphp\Repository\PublicationRepo;
use Hb\SkyblogSlayevalphp\View\HomeView;

class HomeController extends BaseController
{

    protected function doGet(): BaseView
    {
        $publiRepo = new PublicationRepo();
        $commentRepo = new CommentRepo();
        $categoryRepo = new CategoryRepo();

        return new HomeView($publiRepo->findAll(), $commentRepo->getCommentSum(), $categoryRepo->findAll());
    }

    protected function doPost()
    {
        $publiRepo = new PublicationRepo();
        $commentRepo = new CommentRepo();

        if (isset($_POST["search"]) && !empty($_POST["search"])) {

        }
    }
}