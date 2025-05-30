<?php

namespace Hb\SkyblogSlayevalphp\Core;

class BaseController{
    public function processRequest(): void{
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->doGet()->render();
        }else{
            //$this->doPost()->render();
        }
    }

    protected function doGet(): BaseView{
        return new BaseView();
    }

    protected function doPost(){
        throw new \Exception("Controller does not have a doPost");
    }
}