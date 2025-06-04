<?php

namespace Hb\SkyblogSlayevalphp\View;

use Hb\SkyblogSlayevalphp\Core\BaseView;
use Hb\SkyblogSlayevalphp\Entity\Publication;
use Hb\SkyblogSlayevalphp\View\Part\NavBar;

class HomeView extends BaseView
{
    /**
     * Summary of publications
     * @var Publication[]
     */
    private array $publications = [];
    private int $commentSum;
    private array $categories;

    

    public function __construct($publications, int $commentSum,$categories,)
    {
        $this->publications = $publications;
        $this->commentSum = $commentSum;
        $this->categories = $categories;
        
    }
    public function content()
    {
        $navbar = new NavBar($this->categories);
        $navbar->render();
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
                    <h3>Description : </h3>
                    <p>Kikoo mwa c Faustine mé vs pouvé mapl Faus' le rock domine le rap s'incline les beybey</p>
                </div>
                <div class="usernav">
                    <ul>
                        <li><a href="#">Ecrire un message</a></li>
                        <li><a href="#">Ajouter à mes amis</a></li>
                        <li><a href="#">Fais tourner ce blog</a></li>
                    </ul>
                </div>
            </div>
            <div class="article-container">
                <?php
                foreach ($this->publications as $publication) {
                    echo '
            <article class="publication">
                <div class="publication-header">
                <h2>' . $publication->getTitle() . '</h2>
                <p>' . $publication->getCategory()->getName() . '</p>
                </div>';
                if (!empty($publication->getImgUrl())) {
                    echo '<img src="' . $publication->getImgUrl() . '">';
                }
                echo '
                
                <p>' . $publication->getContent() . '</p>
                <div class="publication-com-section">
                    
                <div class="comment-banner">[<img src="assets/global/addcom.png" alt="Ajouter un commentaire">
                <a href="#" onclick="window.open(\'/add-com?id=' . $publication->getId() . '\', \'popup\', \'width=600,height=400\'); return false;">Ajouter un commentaire</a>]
                </div>
                    <div class="comment-banner">[<img src="assets\global\readcoms.png" alt="Lire commentaires">';
                    if ($publication->getCommentAmount() > 0) {
                        echo '<a href="#" onclick="window.open(\'/list-coms?id=' . $publication->getId() . '\', \'popup\', \'width=600,height=400\'); return false;">' . $publication->getCommentAmount() . ' commentaires</a>]</div>';

                    } else {
                        echo '<a>0 commentaires</a>]</div>';
                    }
                    echo '
                </div>
                <div class="publication-footer">
                    <p>Posté le ' . $publication->getCreationDate() . '</p>
                    <p>Modifié le ' . $publication->getLastUpdate() . '</p>
                </div>
                
            </article>';
                }
                echo '
            </div>
            <div class="infos-container">
                <p>Date création : 27.05.2004/p>
                <p>nb articles : ' . count($this->publications) . '</p>
        
                <p>nb coms : ' . $this->commentSum . '</p>
                

                <h2>RAJOUTER DES IMG ICI OU DES TAGS MOCHES</h2>
            </div>
        </div>';

    }
}

