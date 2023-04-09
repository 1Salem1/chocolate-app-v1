<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prix_article = null;

    #[ORM\Column]
    private ?int $qunatie_article = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixArticle(): ?float
    {
        return $this->prix_article;
    }

    public function setPrixArticle(float $prix_article): self
    {
        $this->prix_article = $prix_article;

        return $this;
    }

    public function getQunatieArticle(): ?int
    {
        return $this->qunatie_article;
    }

    public function setQunatieArticle(int $qunatie_article): self
    {
        $this->qunatie_article = $qunatie_article;

        return $this;
    }
}
