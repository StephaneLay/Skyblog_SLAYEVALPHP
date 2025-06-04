<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\Repository\CommentRepo;
use Hb\SkyblogSlayevalphp\Repository\PublicationRepo;
use Hb\SkyblogSlayevalphp\View\AddComView;

class AddComController extends BaseController{
    protected function doGet(): \Hb\SkyblogSlayevalphp\Core\BaseView{
        return new AddComView();
    }

    protected function doPost()
    {
        $publiRepo = new PublicationRepo();
        $comRepo = new CommentRepo();
        $comRepo->addComment($_POST["username"],$_POST["content"],$_GET["id"]);
        $publiRepo->addCommentCount($_GET["id"]);
        echo '<script>window.close();</script>';
        exit;
    }
}