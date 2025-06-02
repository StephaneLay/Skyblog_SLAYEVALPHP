<?php

namespace Hb\SkyblogSlayevalphp\Entity;

use DateTime;

class Comment{
    private int $id;
    private string $username;
    private string $content;
    private string $creationDate;

    private Publication $publication;
    
    

	public function __construct(string $username,string $content,string $creationDate,Publication $publication,?int $id =null) {
        $this->username = $username;
        $this->content = $content;
        $this->creationDate = $creationDate;
        $this->publication = $publication;
        $this->id = $id;
    }
}