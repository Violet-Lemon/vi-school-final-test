<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AirportRepository")
 */
class Airport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer")
     */
    private ?int $id;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\City")
     * @ORM\JoinColumn(name="airport_city", referencedColumnName="id", nullable=false)
     */
    private City $airport_city;
    /**
     * @ORM\Column(name="airport_code", type="string", length=10)
     */
    private string $airport_code;

    public function getAirportCity(): City
    {
        return $this->airport_city;
    }

    public function setAirportCity(City $airport_city): void
    {
        $this->airport_city = $airport_city;
    }

    public function getAirportCode(): string
    {
        return $this->airport_code;
    }

    public function setAirportCode(string $airport_code): void
    {
        $this->airport_code = $airport_code;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

}