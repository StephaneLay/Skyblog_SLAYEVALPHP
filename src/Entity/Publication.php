<?php

namespace Hb\SkyblogSlayevalphp\Entity;

use DateTime;

class Publication
{
    private ?int $id;
    private string $title;

    private string $img_url;

    private string $content;

    private DateTime $creationDate;
    private ?DateTime $lastUpdate;

    private int $commentAmount;

    private Category $category;
    public function getId(): ?int {return $this->id;}

	public function getTitle(): string {return $this->title;}

	public function getImgUrl(): string {return $this->img_url;}

	public function getContent(): string {return $this->content;}

	public function getCreationDate(): DateTime {return $this->creationDate;}

	public function getLastUpdate(): ?DateTime {return $this->lastUpdate;}

	public function getCategory(): Category {return $this->category;}
	public function getCommentAmount(): int {return $this->commentAmount;}

	public function setId(?int $id): void {$this->id = $id;}

	public function setTitle(string $title): void {$this->title = $title;}

	public function setImgUrl(string $img_url): void {$this->img_url = $img_url;}

	public function setContent(string $content): void {$this->content = $content;}

	public function setCreationDate(DateTime $creationDate): void {$this->creationDate = $creationDate;}

    public function setLastUpdate(DateTime $lastUpdate): void {$this->lastUpdate = $lastUpdate;}

    public function setCommentAmount(int $commentAmount): void {$this->commentAmount = $commentAmount;}

    public function setCategory(Category $category): void {$this->category = $category;}




    public function __construct(string $title, string $img_url, string $content, Category $category,DateTime $creationDate,int $commentAmount, ?int $id = null,?DateTime $lastUpdate = null)
    {
        $this->title = $title;
        $this->img_url = $img_url;
        $this->content = $content;
        $this->category = $category;
        $this->creationDate = $creationDate;
        $this->lastUpdate = $lastUpdate;
        $this->commentAmount = $commentAmount;
        $this->id = $id;
    }


}