<?php

namespace App\Entity;

use App\Repository\OrdersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrdersRepository::class)]
class Orders
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $prix_total = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    private ?user $id_user = null;

    #[ORM\OneToMany(mappedBy: 'id_order', targetEntity: LineOrder::class)]
    private Collection $lineOrders;

    public function __construct()
    {
        $this->lineOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixTotal(): ?float
    {
        return $this->prix_total;
    }

    public function setPrixTotal(float $prix_total): self
    {
        $this->prix_total = $prix_total;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getIdUser(): ?user
    {
        return $this->id_user;
    }

    public function setIdUser(?user $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * @return Collection<int, LineOrder>
     */
    public function getLineOrders(): Collection
    {
        return $this->lineOrders;
    }

    public function addLineOrder(LineOrder $lineOrder): self
    {
        if (!$this->lineOrders->contains($lineOrder)) {
            $this->lineOrders->add($lineOrder);
            $lineOrder->setIdOrder($this);
        }

        return $this;
    }

    public function removeLineOrder(LineOrder $lineOrder): self
    {
        if ($this->lineOrders->removeElement($lineOrder)) {
            // set the owning side to null (unless already changed)
            if ($lineOrder->getIdOrder() === $this) {
                $lineOrder->setIdOrder(null);
            }
        }

        return $this;
    }
}
