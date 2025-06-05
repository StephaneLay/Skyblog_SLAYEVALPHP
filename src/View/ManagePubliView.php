<?php

namespace Hb\SkyblogSlayevalphp\View;

use Hb\SkyblogSlayevalphp\Core\BaseView;
use Hb\SkyblogSlayevalphp\Entity\Publication;
use Hb\SkyblogSlayevalphp\View\Part\NavBar;

class ManagePubliView extends BaseView{
    public function __construct(private array $publications) {
        
    }

    public function content(){
        $navbar = new NavBar([],false);
        $navbar->render();
        echo '<form method="get">';
        foreach ($this->publications as $publication) {
            echo '<div class="publi-line">
            <input type="checkbox" name="check" >
            <p>'.$publication->getTitle().'</p>
            <p>'.$publication->getCategory()->getName().'</p>
            <p>'.$publication->getCreationDate().'</p>
            <p>'.$publication->getCommentAmount().'</p>
            <a href="#">Modifier</a></div>';
        }
            
        echo '<button>Supprimer selection</button></form>';
    }
}

