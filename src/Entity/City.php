<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CityRepository")
 */
class City
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer")
     */
    private ?int $id;
    /**
     * @ORM\Column(name="city_name", type="string", length=100)
     */
    private string $city_name;

    public function getCityName(): string
    {
        return $this->city_name;
    }

    public function setCityName(string $city_name): void
    {
        $this->city_name = $city_name;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

}