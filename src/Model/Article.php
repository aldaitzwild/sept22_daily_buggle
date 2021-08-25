<?php

namespace App\Model;

use DateTime;

class Article
{
    private int $id;
    private string $title;
    private string $author;
    private string $picture;
    private DateTime $date;
    private string $content;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;
        return $this;
    }

    public function getPicture(): string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;
        return $this;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function toAssocArray(): array
    {
        return [
            'id'        => $this->id,
            'title'     => $this->title,
            'author'    => $this->author,
            'picture'   => $this->picture,
            'date'      => $this->date,
            'content'   => $this->content,
        ];
    }
}
