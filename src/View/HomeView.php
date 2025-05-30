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
        foreach ($this->publications as $publication) {
            echo'
        <article class="publication">
            <div class="publication-header">
            <h2>'.$publication->getTitle().'</h2>
            <p>'.$publication->getCategory()->getName().'</p>
            </div>
            <img src="'.$publication->getImgUrl().'">
            <p>'.$publication->getContent().'</p>
        </article>';
        }
    }
}
?>