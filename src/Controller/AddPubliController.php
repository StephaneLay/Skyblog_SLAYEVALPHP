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
}