<?php

namespace Hb\SkyblogSlayevalphp\Controller;

use Hb\SkyblogSlayevalphp\Core\BaseController;
use Hb\SkyblogSlayevalphp\View\ThemeView;

class ThemeController extends BaseController{
    protected function doGet(): \Hb\SkyblogSlayevalphp\Core\BaseView{
        return new ThemeView();   
    }
}