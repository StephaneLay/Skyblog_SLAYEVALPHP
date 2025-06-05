<?php

namespace Hb\SkyblogSlayevalphp\View;

use Hb\SkyblogSlayevalphp\Core\BaseView;
use Hb\SkyblogSlayevalphp\View\Part\NavBar;

class MessageView extends BaseView
{
    public function __construct(private string $message)
    {
    }

    public function content(){
        $navbar = new NavBar([],false);
        $navbar->render();
        echo '<h1>'.$this->message.'</h1>';
    }
}