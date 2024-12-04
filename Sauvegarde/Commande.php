<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommande(): ?string
    {
        return $this->Commande;
    }

    public function setCommande(?string $Commande): static
    {
        $this->Commande = $Commande;

        return $this;
    }

    public function setId(?string $id): static
    {
        $this->id = $id;

        return $this;
    }
}
