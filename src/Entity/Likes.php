<?php

namespace App\Entity;

use App\Repository\LikesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LikesRepository::class)]
class Likes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Likes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLikes(): ?string
    {
        return $this->Likes;
    }

    public function setLikes(string $Likes): static
    {
        $this->Likes = $Likes;

        return $this;
    }
}
