<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @var Collection<int, subscription>
     */
    #[ORM\OneToMany(targetEntity: subscription::class, mappedBy: 'offer')]
    private Collection $subscription;

    public function __construct()
    {
        $this->subscription = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, subscription>
     */
    public function getSubscription(): Collection
    {
        return $this->subscription;
    }

    public function addSubscription(subscription $subscription): static
    {
        if (!$this->subscription->contains($subscription)) {
            $this->subscription->add($subscription);
            $subscription->setOffer($this);
        }

        return $this;
    }

    public function removeSubscription(subscription $subscription): static
    {
        if ($this->subscription->removeElement($subscription)) {
            // set the owning side to null (unless already changed)
            if ($subscription->getOffer() === $this) {
                $subscription->setOffer(null);
            }
        }

        return $this;
    }
}
