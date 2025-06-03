<?php

namespace Hb\SkyblogSlayevalphp\Entity;

use DateTime;

class Comment{
    private int $id;
    private string $username;
    private string $content;
    private string $creationDate;

    private Publication $publication;
    
    public function getId(): int {return $this->id;}

	public function getUsername(): string {return $this->username;}

	public function getContent(): string {return $this->content;}

	public function getCreationDate(): string {return $this->creationDate;}

	public function getPublication(): Publication {return $this->publication;}

	public function setId(int $id): void {$this->id = $id;}

	public function setUsername(string $username): void {$this->username = $username;}

	public function setContent(string $content): void {$this->content = $content;}

	public function setCreationDate(string $creationDate): void {$this->creationDate = $creationDate;}

	public function setPublication(Publication $publication): void {$this->publication = $publication;}

	

	public function __construct(string $username,string $content,string $creationDate,Publication $publication,?int $id =null) {
        $this->username = $username;
        $this->content = $content;
        $this->creationDate = $creationDate;
        $this->publication = $publication;
        $this->id = $id;
    }
}