<?php

namespace Hb\SkyblogSlayevalphp\View\Part;

use Hb\SkyblogSlayevalphp\Entity\Theme;

class Header
{

    public function render(Theme $theme)
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <?php
            echo '
            <style>
                :root{
                    --main-background-color :'.$theme->getMainBgColor().';
                --side-menu-color:'.$theme->getSideBgColor().';
                --publi-background--color:'.$theme->getPubliBgColor().';
                --publi-secondary-color :'.$theme->getSecondaryPubliColor().';
                }
                
            </style>';
            ?>
            <link rel="stylesheet" href="/style.css">
            <title>Skyblog</title>
        </head>

        <body>
            <main>
                <?php
    }
}