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
        
        if (isset($_GET["search"]) && !empty(trim($_GET["search"]))) {
            $publications = $publiRepo->filterResults($_GET["search"]);
            $lastSearch = $_GET["search"];
        }elseif (isset($_GET["category"])) {
            $publications = $publiRepo->findByCategoryId($_GET["category"]);
            $lastSearch = $_GET["category"];
        }else {
            $publications = $publiRepo->findAll();
            $lastSearch = null;
        }
        return new HomeView($publications, $commentRepo->getCommentSum(), $categoryRepo->findAll(),$lastSearch);
    }

    
}