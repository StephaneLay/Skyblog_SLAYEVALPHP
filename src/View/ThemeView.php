<?php

namespace Hb\SkyblogSlayevalphp\View;

use Hb\SkyblogSlayevalphp\Core\BaseView;
use Hb\SkyblogSlayevalphp\View\Part\NavBar;

class ThemeView extends BaseView
{


    /**
     * Summary of __construct
     * @param \Hb\SkyblogSlayevalphp\Entity\Theme[] 
     */
    public function __construct(private array $themes)
    {
    }
    public function content()
    {
        $navbar = new NavBar([], false);
        $navbar->render();

        echo '<div class="theme-container">';
        foreach ($this->themes as $theme) {
            echo '<div class=';
            if ($theme->getIsActive()) {
                echo "active-theme";
            } else {
                echo "theme";
            }
            echo '>';
            echo '<div class="theme-line"><div class="theme-color" style="background-color:' . $theme->getMainBgColor() . ';">Main Background Color</div></div>';
            echo '<div class="theme-line"><div class="theme-color" style="background-color:' . $theme->getSideBgColor() . ';">Side Menus Color</div></div>';
            echo '<div class="theme-line"><div class="theme-color" style="background-color:' . $theme->getPubliBgColor() . ';">Publication Background Color</div></div>';
            echo '<div class="theme-line"><div class="theme-color" style="background-color:' . $theme->getSecondaryPubliColor() . ';">Secondary Publication Color</div></div>';
            echo '<a href="/theme?id=' . $theme->getId() . '">Choose this theme</a>';
            echo '</div>';
        }
        echo '</div>';

        ?>
        <div class="adding-theme">
            <h2>Add a new theme</h2>
            <form class="add-theme-form" method="post">
                <label for="mainbgcolor">Main Background Color</label>
                <input type="color" name="mainbgcolor" id="mainbgcolor">

                <label for="sidebgcolor">Side Menus Color</label>
                <input type="color" name="sidebgcolor" id="sidebgcolor">

                <label for="publibgcolor">Publication Background Color</label>
                <input type="color" name="publibgcolor" id="publibgcolor">

                <label for="secondarypublicolor">Secondary Publication Color</label>
                <input type="color" name="secondarypublicolor" id="secondarypublicolor">

                <button>Ajouter Theme</button>
            </form>

        </div>

        <?php
    }

}