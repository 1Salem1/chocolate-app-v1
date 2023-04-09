<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_user = null;

    #[ORM\Column(length: 255)]
    private ?string $code_postal_user = null;

    #[ORM\Column(length: 255)]
    private ?string $ville_user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresseUser(): ?string
    {
        return $this->adresse_user;
    }

    public function setAdresseUser(string $adresse_user): self
    {
        $this->adresse_user = $adresse_user;

        return $this;
    }

    public function getCodePostalUser(): ?string
    {
        return $this->code_postal_user;
    }

    public function setCodePostalUser(string $code_postal_user): self
    {
        $this->code_postal_user = $code_postal_user;

        return $this;
    }

    public function getVilleUser(): ?string
    {
        return $this->ville_user;
    }

    public function setVilleUser(string $ville_user): self
    {
        $this->ville_user = $ville_user;

        return $this;
    }
}
