<?php

namespace Hb\SkyblogSlayevalphp\View;

use Hb\SkyblogSlayevalphp\Core\BaseView;
use Hb\SkyblogSlayevalphp\Entity\Publication;

class HomeView extends BaseView
{
    /**
     * Summary of publications
     * @var Publication[]
     */
    private array $publications = [];

    public function __construct($publications)
    {
        $this->publications = $publications;
    }
    public function content()
    {
        ?>
        <div class="blog-container">
            <div class="user-container">
                <h2>Blog</h2>
                <div class="user-card">
                    <h3>D.a.a.a.r.K EE.mmm.oooo x3x3x3x3</h3>
                    <img src="assets\global\rolling-stones.jpg" alt="logo-rollingstones">
                    <a href="#">Dark-emo</a>
                </div>
            <div class="user-description">
                <h3>Description</h3>
                <p>Kikoo mwa c Faustine mé vs pouvé mapl Faus' le rock domine le rap s'incline les beybey</p>
            </div>
        </div>
        <div class="article-container"><?php
            foreach ($this->publications as $publication) {
                echo '
            <article class="publication">
                <div class="publication-header">
                <h2>' . $publication->getTitle() . '</h2>
                <p>' . $publication->getCategory()->getName() . '</p>
                </div>
                <img src="' . $publication->getImgUrl() . '">
                <p>' . $publication->getContent() . '</p>
                <div class="publication-footer">
                    <p>AJOUTER LES REACTIONS ICI</p>
                    <a href="#">Lire les commentaires</a>
                    <a href="#">Commenter</a>
                </div>
            </article>';
        }
        ?>
        </div>
    <div class="infos-container">
        <p>Date création : ?</p>
        <p>nb articles : ?</p>
        <p>nb coms : ?</p>
        <p>nb reactions : ?</p>
    
        <h2>RAJOUTER DES IMG ICI OU DES TAGS MOCHES</h2>
    </div>
    </div><?php
    }
}


    