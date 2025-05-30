<?php

namespace Hb\SkyblogSlayevalphp\Entity;

class Category{
    private int $id;
    private string $name;

    public function __construct($name,$id=null) {
        $this->name = $name;
        $this->id = $id;
    }
}