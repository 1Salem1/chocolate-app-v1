<?php

namespace App\Entity;

use App\Repository\CollectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use \Doctrine\ORM\PersistentCollection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CollectionRepository::class)]
#[ORM\Table(name: '`T_COLLECTION`')]
class Collection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_collection = null;

    #[ORM\OneToMany(mappedBy: 'collection', targetEntity: Chocolate::class)]
    private  PersistentCollection $chocolates;

    public function __construct()
    {
        $this->chocolates = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCollection(): ?string
    {
        return $this->nom_collection;
    }

    public function setNomCollection(?string $nom_collection): self
    {
        $this->nom_collection = $nom_collection;

        return $this;
    }


    public function __toString(): string
{
    return $this->nom_collection ?? 'Unnamed Collection';
}



    public function getChocolates(): array
    {
        return $this->chocolates->toArray();
    }

    public function addChocolates(Chocolate $chocolate): self
    {
        if (!$this->chocolates->contains($chocolate)) {
            $this->chocolates->add($chocolate);
            $chocolate->setCollection($this);
        }

        return $this;
    }

    public function removeChocolates(Chocolate $chocolate): self
    {
        if ($this->chocolates->removeElement($chocolate)) {
            if ($chocolate->getCollection() === $this) {
                $chocolate->setCollection(null);
            }
        }

        return $this;
    } 
}