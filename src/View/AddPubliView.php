<?php

namespace Hb\SkyblogSlayevalphp\View;

use Hb\SkyblogSlayevalphp\Core\BaseView;
use Hb\SkyblogSlayevalphp\Entity\Category;
use Hb\SkyblogSlayevalphp\View\Part\NavBar;

class AddPubliView extends BaseView
{
    /**
     * Summary of __construct
     * @param Category[] $categories
     */
    public function __construct(private array $categories,private ?string $errorMsg)
    {
        $this->categories = $categories;
        $this->errorMsg = $errorMsg;
    }
    public function content()
    {
        
        // $navbar = new NavBar();
        // $navbar->render();
        echo '<h1>Add a new publication</h1>';
        echo '<form class="add-publi-form" enctype="multipart/form-data" method="post">
    <label for="Titre">Entrez un titre*</label>
    <input type="text" name="titre">
    <label for="image">Ajoutez une image</label>
    <input type="file"  accept="image/*"  name="image">
    <label for="content">Ecrivez du contenu</label>
    <textarea name="content" ></textarea>
    <label for="category">Selectionnez une catégorie*</label>
    <select name="category" >';
        foreach ($this->categories as $category) {
            echo '<option value="' . $category->getId() . '">' . $category->getName() . '</option>';
        }
        echo '</select><button>Ajouter article</button></form>';
        if ($this->errorMsg) {
            echo '<p class="error-msg">'.$this->errorMsg.'</p>';
        }
    }
}
?>

