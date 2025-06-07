<?php

namespace Hb\SkyblogSlayevalphp\View\Part;

use Hb\SkyblogSlayevalphp\Entity\Category;

class NavBar
{

    /**
     * Summary of __construct
     * @param Category[] $categories
     */
    public function __construct(private ?array $categories, private bool $searchbar = true, private null|string $lastSearch = "")
    {

    }
    public function render()
    { ?>
        <header>
            <img src="assets\global\skyblog-logo.avif" alt="skyblog logo">
            <?php if ($this->searchbar) {
                echo '<div class="search">
                <form class="searchbar" method="get">
                    <input type="text" name="search"';
                if (!is_numeric($this->lastSearch)) {
                    echo 'value = ' . $this->lastSearch . '';
                }
                echo '><button><img src="assets\global\recherche.png" alt=""></button>
                </form>
                <form class="filter" method="get">
                    <select name="category">
                    <option value="">--Choose category</option>';

                foreach ($this->categories as $category) {
                    echo '<option value="' . $category->getId() . '"';
                    if (is_numeric($this->lastSearch) && intval($this->lastSearch) ==  $category->getId()) {
                        echo 'selected="selected" ';
                    }
                    echo '>' . $category->getName() . '</option>';
                }
                echo '</select><button>Go</button></form></div>';


            }
            ?>

            <div class="buttons">
                <a href="/">Home</a>
                <a href="/new-publi">Ajouter un article</a>
                <a href="/manage-publi">Gerer les publications</a>
                <a href="/theme">Changer theme</a>
            </div>
        </header>
        <?php
    }

}

