<?php

namespace Hb\SkyblogSlayevalphp\View\Part;

class NavBar{
    public function render(){?>
        <header>
            <img src="assets\global\skyblog-logo.avif" alt="skyblog logo">
            <div class="search">
                <input type="text" name="search">
                <button><img src="assets\global\recherche.png" alt=""></button>
            </div>
            <div class="buttons">
                <a href="/">Home</a>
                <a href="/new-publi">Ajouter un article</a>
                <a href="">Gerer les publications</a>
            </div>
        </header>
        <?php
    }
}