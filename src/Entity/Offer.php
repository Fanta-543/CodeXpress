<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OfferRepository::class)]
class Offer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Offer = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOffer(): ?string
    {
        return $this->Offer;
    }

    public function setOffer(string $Offer): static
    {
        $this->Offer = $Offer;

        return $this;
    }
}
