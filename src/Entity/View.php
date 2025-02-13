<?php

namespace App\Entity;

use App\Repository\ViewRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ViewRepository::class)]
class View
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $View = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getView(): ?string
    {
        return $this->View;
    }

    public function setView(string $View): static
    {
        $this->View = $View;

        return $this;
    }
}
