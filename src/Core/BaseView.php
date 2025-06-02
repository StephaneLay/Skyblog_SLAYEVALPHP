<?php

namespace Hb\SkyblogSlayevalphp\Core;

use Hb\SkyblogSlayevalphp\View\Part\Footer;
use Hb\SkyblogSlayevalphp\View\Part\Header;

class BaseView{
    public function render(){
              $header = new Header();
              $footer = new Footer();

              $header->render();
              $this->content();
              $footer->render();
            
    }

    public function content(){
        echo 'BaseView display';
    }
}