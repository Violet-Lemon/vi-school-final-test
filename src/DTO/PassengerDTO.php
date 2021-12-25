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
     * @Assert\Length(max=4, maxMessage="Серия паспорта должна состоять из 4 цифр", min=4, maxMessage="Серия паспорта должна состоять из 4 цифр")
     *
     */
    private ?int $passportSeries;
    /**
     * @Assert\NotBlank(message="Поле должно быть заполнено")
     * @Assert\Length(max=6, maxMessage="Номер паспорта должен состоять из 6 цифр", min=6, maxMessage="Номер паспорта должен состоять из 6 цифр")
     */
    private ?int $passportNumber;

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