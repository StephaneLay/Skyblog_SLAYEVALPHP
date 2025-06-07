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
        echo '<form method="post">';
        foreach ($this->publications as $publication) {
            echo '<div class="publi-line">
            <input type="checkbox" id="'.$publication->getTitle().'" name="'.$publication->getTitle().'" value="'.$publication->getId().'" >
            <label for="'.$publication->getTitle().'">'.$publication->getTitle().'</label>
            <label for="'.$publication->getTitle().'">'.$publication->getCategory()->getName().'</label>
            <label for="'.$publication->getTitle().'">'.$publication->getCreationDate()->format('Y-m-d H:i:s').'</label>
            <label for="'.$publication->getTitle().'">'.$publication->getCommentAmount().'</label>
            <a href="/update-publi?id='.$publication->getId().'">Modifier</a></div>';
        }
            
        echo '<button>Supprimer selection</button></form>';
    }
}

