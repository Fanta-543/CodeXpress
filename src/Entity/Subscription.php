<?php

namespace App\Entity;

use App\Repository\SubscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubscriptionRepository::class)]
class Subscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Subscription = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubscription(): ?string
    {
        return $this->Subscription;
    }

    public function setSubscription(?string $Subscription): static
    {
        $this->Subscription = $Subscription;

        return $this;
    }
}
