<?php

namespace Hb\SkyblogSlayevalphp\View;

use Hb\SkyblogSlayevalphp\Core\BaseView;
use Hb\SkyblogSlayevalphp\Entity\Publication;
use Hb\SkyblogSlayevalphp\View\Part\NavBar;

class UpdatePubliView extends BaseView{
    public function __construct(
        private Publication $publication,
        private array $categories


    ) {}
    public function content(){
        $navbar = new NavBar($this->categories,false);
        $navbar->render();

        echo '<h1>Update your publication</h1>';
        echo '<form class="add-publi-form" enctype="multipart/form-data" method="post">
    <label for="Titre">Entrez un titre*</label>
    <input type="text" name="titre" value="'.$this->publication->getTitle().'">
    <label for="image" >Ajoutez une image</label>
    <input type="file"  accept="image/*"  name="image" >
    <label for="content">Ecrivez du contenu</label>
    <textarea name="content"  >'.$this->publication->getContent().'</textarea>
    <label for="category">Selectionnez une catégorie*</label>
    <select name="category" >
    <option value="">--Choose category</option>';
        foreach ($this->categories as $category) {
            echo '<option value="' . $category->getId() . '"'; 
            if ($category->getName() === $this->publication->getCategory()->getName()) {
                echo 'selected="selected"';
            }
            echo '>' . $category->getName() . '</option>';
        }
        echo '</select><button>Ajouter article</button></form>';
    }
}