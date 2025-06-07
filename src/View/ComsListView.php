<?php

namespace Hb\SkyblogSlayevalphp\View;

use Hb\SkyblogSlayevalphp\Core\BaseView;
use Hb\SkyblogSlayevalphp\Entity\Comment;

class ComsListView extends BaseView
{

    /**
     * Summary of __construct
     * @param Comment[] $comments
     */
    public function __construct(private array $comments)
    {
        $this->comments = $comments;
    }
    public function content()
    {
        foreach ($this->comments as $comment) {
            echo '
            <article class="com">
                <h2>'.$comment->getUsername().'</h2>
                <p class="com-content">'.$comment->getContent().'</p>
                <p class="com-date">'.$comment->getCreationDate()->format('Y-m-d H:i:s').'</p>
            </article>';

        }
    }
}
?>