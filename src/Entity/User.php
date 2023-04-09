<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]

#[ORM\Table(name: '`T_USER`')]
class User implements UserInterface {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "id_user")]
    private ?int $id ;

    #[ORM\Column(name: "nom_user")]
    
    private ?string $nom ;

    #[ORM\Column(name: "prenom_user")]
    public ?string $prenom ;

    #[ORM\Column(name: "address_user" , nullable:true)]
    private string $address ;

    #[ORM\Column(name: "tel_user" , nullable:true )]
    private string $tel ;

    #[ORM\Column(name: "email_user", length: 180, unique: true)]
    private string $email ;

   
   

   

    #[ORM\Column(name: "password_user")]
    private ?string $password ;

    #[ORM\Column(name: "role_user")]
    private array $roles = [];

    #[ORM\Column(name: "code_postal_user" , nullable:true)]
    private string $code_postal ;

    #[ORM\Column(name: "ville_user" , nullable:true)]
    private string $ville ;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->nom;
    }

    public function setUserName(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }


    public function getnom(): ?string
    {
        return $this->nom;
    }

    public function setnom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

   

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password_user): self
    {
        $this->password = $password_user;

        return $this;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        // nous devons nous assurer d'avoir au moins un rôle
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $role_user): self
    {
        $this->roles = $role_user;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal_user): self
    {
        $this->code_postal = $code_postal_user;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville_user): self
    {
        $this->ville = $ville_user;

        return $this;
    }

    public function getSalt()
{
    // not needed when using the "bcrypt" algorithm in security.yaml
}

public function eraseCredentials()
{
    // remove sensitive data from the object
    // e.g. plain-text passwords
    $this->password ;
}

public function getUserIdentifier(): string
{
    return $this->email;
}
}

