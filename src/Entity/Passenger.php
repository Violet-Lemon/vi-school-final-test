<?php

namespace App\Entity;

use App\DTO\PassengerDTO;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PassengerRepository")
 */
class Passenger
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer")
     */
    private ?int $id;
    /**
     * @ORM\Column(name="surname", type="string", length=100)
     */
    private string $surname;
    /**
     * @ORM\Column(name="name", type="string", length=100)
     */
    private string $name;
    /**
     * @ORM\Column(name="patronymic", type="string", length=100)
     */
    private string $patronimic;
    /**
     * @ORM\Column(name="passport_series", type="integer")
     */
    private int $passportSeries;
    /**
     * @ORM\Column(name="passport_number", type="integer")
     */
    private int $passportNumber;

    public function __construct(
        string $surname,
        string $name,
        string $patronimic,
        int    $passportSeries,
        int    $passportNumber
    )
    {
        $this->surname = $surname;
        $this->name = $name;
        $this->patronimic = $patronimic;
        $this->passportSeries = $passportSeries;
        $this->passportNumber = $passportNumber;
    }

    public static function createFromDTO(PassengerDTO $dto): self
    {
        return new self(
            $dto->getSurname(),
            $dto->getName(),
            $dto->getPatronymic(),
            $dto->getPassportSeries(),
            $dto->getPassportNumber()
        );
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPatronimic(): string
    {
        return $this->patronimic;
    }

    public function setPatronimic(string $patronimic): void
    {
        $this->patronimic = $patronimic;
    }

    public function getPassportSeries(): int
    {
        return $this->passportSeries;
    }

    public function setPassportSeries(int $passportSeries): void
    {
        $this->passportSeries = $passportSeries;
    }

    public function getPassportNumber(): int
    {
        return $this->passportNumber;
    }

    public function setPassportNumber(int $passportNumber): void
    {
        $this->passportNumber = $passportNumber;
    }

    public function getFullPassengerData(): string
    {
        $format = '%s %s %s (%d %d)';
        $fullData = sprintf(
            $format,
            $this->getSurname(),
            $this->getName(),
            $this->getPatronimic(),
            $this->getPassportSeries(),
            $this->getPassportNumber()
        );
        return $fullData;
    }

}