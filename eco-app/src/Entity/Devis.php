<?php

namespace App\Entity;

use App\Repository\DevisRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DevisRepository::class)]
class Devis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'devis')]
    private ?Service $id_service = null;

    #[ORM\Column]
    private ?float $tarif_ht = null;

    #[ORM\Column]
    private ?float $tarif_ttc = null;

    #[ORM\ManyToOne(inversedBy: 'devis')]
    private ?DetailEcoservices $detail_eco = null;

    #[ORM\ManyToOne(inversedBy: 'devis')]
    private ?user $id_user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdService(): ?Service
    {
        return $this->id_service;
    }

    public function setIdService(?Service $id_service): self
    {
        $this->id_service = $id_service;

        return $this;
    }

    public function getTarifHt(): ?float
    {
        return $this->tarif_ht;
    }

    public function setTarifHt(float $tarif_ht): self
    {
        $this->tarif_ht = $tarif_ht;

        return $this;
    }

    public function getTarifTtc(): ?float
    {
        return $this->tarif_ttc;
    }

    public function setTarifTtc(float $tarif_ttc): self
    {
        $this->tarif_ttc = $tarif_ttc;

        return $this;
    }

    public function getDetailEco(): ?DetailEcoservices
    {
        return $this->detail_eco;
    }

    public function setDetailEco(?DetailEcoservices $detail_eco): self
    {
        $this->detail_eco = $detail_eco;

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
}
