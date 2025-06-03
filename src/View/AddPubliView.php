<?php

namespace Hb\SkyblogSlayevalphp\View;

use Hb\SkyblogSlayevalphp\Core\BaseView;
use Hb\SkyblogSlayevalphp\Entity\Category;

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
        echo '<h1>Add a new publication</h1>';
        echo '<form action="">
    <label for="Titre">Entrez un titre</label>
    <input type="text" name="titre">
    <label for="img">Ajoutez une image</label>
    <input type="image" name="img">
    <label for="content">Ajoutez une image</label>
    <textarea name="content" ></textarea>
    <select name="category" >';
        foreach ($this->categories as $category) {
            echo '<option value="' . $category->getId() . '">' . $category->getName() . '</option>';
        }
        echo '<button>Ajouter article</button>
    </select></form>';


    }
}
