<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarOwnerRepository")
 */
class CarOwner
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
     * @ORM\Column(type="string", length=50)
     */
    private $middle_name;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Car", mappedBy="owner")
     */
    private $cars;

    public function __construct()
    {
        $this->cars = new ArrayCollection();
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

    public function getMiddleName(): ?string
    {
        return $this->middle_name;
    }

    public function setMiddleName(string $middle_name): self
    {
        $this->middle_name = $middle_name;

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
     * @return Collection|Car[]
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }

    public function addCar(Car $car): self
    {
        if (!$this->cars->contains($car)) {
            $this->cars[] = $car;
            $car->setOwner($this);
        }

        return $this;
    }

    public function removeCar(Car $car): self
    {
        if ($this->cars->contains($car)) {
            $this->cars->removeElement($car);
            // set the owning side to null (unless already changed)
            if ($car->getOwner() === $this) {
                $car->setOwner(null);
            }
        }

        return $this;
    }
}
