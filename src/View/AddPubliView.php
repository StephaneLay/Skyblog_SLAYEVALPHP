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
    public function __construct(private array $categories)
    {
        $this->categories = $categories;
    }
    public function content()
    {
        $navbar = new NavBar();
        $navbar->render();
        echo '<h1>Add a new publication</h1>';
        echo '<form class="add-publi-form" method="post">
    <label for="Titre">Entrez un titre</label>
    <input type="text" name="titre">
    <label for="image">Ajoutez une image</label>
    <input type="file" name="image">
    <label for="content">Ajoutez une image</label>
    <textarea name="content" ></textarea>
    <select name="category" >';
        foreach ($this->categories as $category) {
            echo '<option value="' . $category->getId() . '">' . $category->getName() . '</option>';
        }
        echo '</select><button>Ajouter article</button>
    </form>';
    }
}
