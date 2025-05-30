<?php

namespace Hb\SkyblogSlayevalphp\Core;

class BaseView{
    public function render(){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="/style.css">
                <title>Skyblog</title>
            </head>
            <body>
              <?php
              $this->content();
              ?>
            </body>
            </html>
        <?php
    }

    public function content(){
        echo 'BaseView display';
    }
}