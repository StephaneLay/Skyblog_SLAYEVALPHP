<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\Repository\CommentRepo;
use Hb\SkyblogSlayevalphp\View\ComsListView;

class ComListController extends BaseController{
    protected function doGet(): \Hb\SkyblogSlayevalphp\Core\BaseView{
        $comRepo = new CommentRepo();
        return new ComsListView($comRepo->getCommentsByPublicationId($_GET["id"]));
    }
}