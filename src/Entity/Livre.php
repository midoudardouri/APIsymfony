<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\LivreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivreRepository::class)]
#[ApiResource]
class Livre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 17)]
    private ?string $isbn = null;

    #[ORM\Column(length: 100)]
    private ?string $titre = null;

    #[ORM\ManyToOne(inversedBy: 'livres')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Auteur $auteurs = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): static
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getAuteurs(): ?Auteur
    {
        return $this->auteurs;
    }

    public function setAuteurs(?Auteur $auteurs): static
    {
        $this->auteurs = $auteurs;

        return $this;
    }
}
