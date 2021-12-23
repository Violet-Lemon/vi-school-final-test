<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints as Assert;

class PassengerDTO
{
    /**
     * @Assert\NotBlank(message="Поле должно быть заполнено")
     * @Assert\Length(max=100)
     */
    private ?string $surname;
    /**
     * @Assert\NotBlank(message="Поле должно быть заполнено")
     * @Assert\Length(max=100)
     */
    private ?string $name;
    /**
     * @Assert\NotBlank(message="Поле должно быть заполнено")
     * @Assert\Length(max=100)
     */
    private ?string $patronymic;
    /**
     * @Assert\NotBlank(message="Поле должно быть заполнено")
     */
    private ?int $passportSeries;
    /**
     * @Assert\NotBlank(message="Поле должно быть заполнено")
     */
    private ?int $passportNumber;

//    public static function createFromEntity(Passenger $passenger): self
//    {
//        $dto = new self();
//
//        $dto->setSurname($passenger->getSurname());
//        $dto->setName($passenger->getName());
//        $dto->setPatronymic($passenger->getPatronymic());
//        $dto->setPassportSeries($passenger->getPassportSeries());
//        $dto->setPassportNumber($passenger->getPassportNumber());
//
//        return $dto;
//    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(?string $surname): void
    {
        $this->surname = $surname;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getPatronymic(): ?string
    {
        return $this->patronymic;
    }

    public function setPatronymic(?string $patronymic): void
    {
        $this->patronymic = $patronymic;
    }

    public function getPassportSeries(): ?int
    {
        return $this->passportSeries;
    }

    public function setPassportSeries(?int $passportSeries): void
    {
        $this->passportSeries = $passportSeries;
    }

    public function getPassportNumber(): ?int
    {
        return $this->passportNumber;
    }

    public function setPassportNumber(?int $passportNumber): void
    {
        $this->passportNumber = $passportNumber;
    }

}