<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $first_name;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $last_name;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $passport_series;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $passport_number;

    /**
     * @ORM\Column(type="string", length=4)
     */
    private $license_series;

    /**
     * @ORM\Column(type="string", length=6)
     */
    private $license_number;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $phone;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Rent", mappedBy="client")
     */
    private $rents;

    public function __construct()
    {
        $this->rents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getPassportSeries(): ?string
    {
        return $this->passport_series;
    }

    public function setPassportSeries(string $passport_series): self
    {
        $this->passport_series = $passport_series;

        return $this;
    }

    public function getPassportNumber(): ?string
    {
        return $this->passport_number;
    }

    public function setPassportNumber(string $passport_number): self
    {
        $this->passport_number = $passport_number;

        return $this;
    }

    public function getLicenseSeries(): ?string
    {
        return $this->license_series;
    }

    public function setLicenseSeries(string $license_series): self
    {
        $this->license_series = $license_series;

        return $this;
    }

    public function getLicenseNumber(): ?string
    {
        return $this->license_number;
    }

    public function setLicenseNumber(string $license_number): self
    {
        $this->license_number = $license_number;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * @return Collection|Rent[]
     */
    public function getRents(): Collection
    {
        return $this->rents;
    }

    public function addRent(Rent $rent): self
    {
        if (!$this->rents->contains($rent)) {
            $this->rents[] = $rent;
            $rent->setClient($this);
        }

        return $this;
    }

    public function removeRent(Rent $rent): self
    {
        if ($this->rents->contains($rent)) {
            $this->rents->removeElement($rent);
            // set the owning side to null (unless already changed)
            if ($rent->getClient() === $this) {
                $rent->setClient(null);
            }
        }

        return $this;
    }
}
