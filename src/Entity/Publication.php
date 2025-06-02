<?php

namespace Hb\SkyblogSlayevalphp\Entity;

use DateTime;

class Publication
{
    private int $id;
    private string $title;

    private string $img_url;

    private string $content;

    private string $creationDate;
    private string $lastUpdate;

    private Category $category;
    public function getId(): int {return $this->id;}

	public function getTitle(): string {return $this->title;}

	public function getImgUrl(): string {return $this->img_url;}

	public function getContent(): string {return $this->content;}

	public function getCreationDate(): string {return $this->creationDate;}

	public function getLastUpdate(): string {return $this->lastUpdate;}

	public function getCategory(): Category {return $this->category;}

	public function setId(int $id): void {$this->id = $id;}

	public function setTitle(string $title): void {$this->title = $title;}

	public function setImgUrl(string $img_url): void {$this->img_url = $img_url;}

	public function setContent(string $content): void {$this->content = $content;}

	public function setCreationDate(string $creationDate): void {$this->creationDate = $creationDate;}



    public function __construct(string $title, string $img_url, string $content, Category $category,$creationDate, ?int $id = null)
    {
        $this->title = $title;
        $this->img_url = $img_url;
        $this->content = $content;
        $this->category = $category;
        $this->creationDate = $creationDate;
        $this->lastUpdate = $creationDate;
        $this->id = $id;
    }


}