<?php

namespace Hb\SkyblogSlayevalphp\Core;

use Hb\SkyblogSlayevalphp\Entity\Theme;
use Hb\SkyblogSlayevalphp\View\Part\Footer;
use Hb\SkyblogSlayevalphp\View\Part\Header;

class BaseView{
    public function render(Theme $theme){
              $header = new Header();
              $footer = new Footer();

              $header->render($theme);
              $this->content();
              $footer->render();
            
    }

    public function content(){
        echo 'BaseView display';
    }
}