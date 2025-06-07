<?php

namespace Hb\SkyblogSlayevalphp\Core;

use Hb\SkyblogSlayevalphp\Repository\ThemeRepo;

class BaseController{
    public function processRequest(): void{
        $themeRepo = new ThemeRepo();
        $theme = $themeRepo->getActive();
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->doGet()->render($theme);
        }else{
            $this->doPost()->render($theme);
        }
    }

    protected function doGet(): BaseView{
        return new BaseView();
    }

    protected function doPost(){
        return new BaseView();
    }
}