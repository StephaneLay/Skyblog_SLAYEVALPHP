<?php

namespace Hb\SkyblogSlayevalphp\Entity;

class Category{
    private int $id;

    private string $name;
    public function getId(): int {return $this->id;}

    public function setId(int $id): void {$this->id = $id;}

	public function getName(): string {return $this->name;}

	public function setName(string $name): void {$this->name = $name;}
	    
    public function __construct($name,$id) {
        $this->name = $name;
        $this->id = $id;
    }
}