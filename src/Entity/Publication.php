<?php

namespace Hb\SkyblogSlayevalphp\Entity;

class Publication
{
    private int $id;
    private string $title;

    private string $img_url;

    private string $content;

    private Category $category;

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


    public function getTitle(): string
    {
        return $this->title;
    }

    public function getImgUrl(): string
    {
        return $this->img_url;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }


    public function setImgUrl(string $img_url): void
    {
        $this->img_url = $img_url;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }


    public function __construct(string $title, string $img_url, string $content, Category $category, ?int $id = null)
    {
        $this->title = $title;
        $this->img_url = $img_url;
        $this->content = $content;
        $this->category = $category;
        $this->id = $id;
    }


}