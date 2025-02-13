<?php

namespace App\Entity;

use App\Repository\NetworkRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NetworkRepository::class)]
class Network
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Networt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNetwort(): ?string
    {
        return $this->Networt;
    }

    public function setNetwort(string $Networt): static
    {
        $this->Networt = $Networt;

        return $this;
    }
}
