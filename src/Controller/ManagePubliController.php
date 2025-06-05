<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\Repository\CategoryRepo;
use Hb\SkyblogSlayevalphp\Repository\PublicationRepo;
use Hb\SkyblogSlayevalphp\View\ManagePubliView;
use Hb\SkyblogSlayevalphp\View\MessageView;

class ManagePubliController extends BaseController
{
    protected function doGet(): \Hb\SkyblogSlayevalphp\Core\BaseView
    {
        $publiRepo = new PublicationRepo();


        return new ManagePubliView($publiRepo->findAll());
    }

    protected function doPost()
    {
        $publiRepo = new PublicationRepo();
        if (!empty($_POST) ) {
            foreach ($_POST as $publiId) {
                $publiRepo->deleteById($publiId);
            }
            return new MessageView("Publication(s) supprimée(s)");
        } else {
            return new ManagePubliView($publiRepo->findAll());

        }

    }
}