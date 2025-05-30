<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\Core\BaseView;
use Hb\SkyblogSlayevalphp\View\HomeView;

class HomeController extends BaseController{

    protected function doGet(): BaseView{
        return new HomeView();
    }
}