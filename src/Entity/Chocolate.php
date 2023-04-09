<?php

namespace App\Entity;

use App\Repository\ChocolateRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ChocolateRepository::class)]
class Chocolate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_chocolat = null;

    #[ORM\Column(length: 255)]
    private ?string $description_chocolat = null;

    #[ORM\Column]
    private ?float $prix_chocolat = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Article $id_article = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\ManyToOne( targetEntity : Collection::class, inversedBy: 'chocolates')]
    #[ORM\JoinColumn(nullable: false)]
    private  $collection ;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    #[ORM\Column]
    private ?bool $isBest = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom_chocolat(): ?string
    {
        return $this->nom_chocolat;
    }

    public function setNomChocolat(string $nom_chocolat): self
    {
        $this->nom_chocolat = $nom_chocolat;

        return $this;
    }

    public function getDescription_chocolat(): ?string
    {
        return $this->description_chocolat;
    }

    

    public function setDescriptionChocolat(string $description_chocolat): self
    {
        $this->description_chocolat = $description_chocolat;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix_chocolat;
    }

    public function setprixChocolat(float $prix_chocolat): self
    {
        $this->prix_chocolat = $prix_chocolat;

        return $this;
    }

    public function getIdArticle(): ?Article
    {
        return $this->id_article;
    }

    public function setIdArticle(?Article $id_article): self
    {
        $this->id_article = $id_article;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getCollection(): ?Collection
    {
        return $this->collection;
    }

    public function setCollection(?Collection $collection): self
    {
        $this->collection = $collection;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function isIsBest(): ?bool
    {
        return $this->isBest;
    }

    public function setIsBest(bool $isBest): self
    {
        $this->isBest = $isBest;

        return $this;
    }
}
