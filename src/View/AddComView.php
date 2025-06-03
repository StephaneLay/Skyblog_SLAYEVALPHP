<?php

namespace Hb\SkyblogSlayevalphp\View;

use Hb\SkyblogSlayevalphp\Core\BaseView;

class AddComView extends BaseView{
    public function content(){
        ?>
        <form class="addcom-form"  method="post">
            <label for="username">Your name</label>
            <input type="text" name="username" value="Visiteur" id="username">
            <label for="content">Your comment</label>
            <textarea name="content" id="content" rows="10" ></textarea>
            <button>Publier commentaire</button>
        </form>
        <?php
    }
}