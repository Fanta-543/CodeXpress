<?php

namespace App\Entity;

use App\Repository\NotificationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NotificationRepository::class)]
class Notification
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Notification = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNotification(): ?string
    {
        return $this->Notification;
    }

    public function setNotification(string $Notification): static
    {
        $this->Notification = $Notification;

        return $this;
    }
}
