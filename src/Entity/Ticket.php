<?php

namespace App\Entity;

use App\DTO\PassengerDTO;
use App\DTO\TicketDTO;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer")
     */
    private ?int $id;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Passenger")
     * @ORM\JoinColumn(name="passenger", referencedColumnName="id", nullable=false)
     */
    private Passenger $passenger;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Flight")
     * @ORM\JoinColumn(name="flight", referencedColumnName="id", nullable=false)
     */
    private Flight $flight;
    /**
     * @ORM\Column(name="flight_date", type="datetime", nullable=false)
     */
    private DateTime $flight_date;
    /**
     * @ORM\Column(name="status", type="string", length=100, options={"default" : "забронирован"})
     */
    private string $status = 'забронирован';

    public function getPassenger(): Passenger
    {
        return $this->passenger;
    }

    public function setPassenger(Passenger $passenger): void
    {
        $this->passenger = $passenger;
    }

    public function getFlight(): Flight
    {
        return $this->flight;
    }

    public function setFlight(Flight $flight): void
    {
        $this->flight = $flight;
    }

    public function getFlightDate(): DateTime
    {
        return $this->flight_date;
    }

    public function setFlightDate(DateTime $flight_date): void
    {
        $this->flight_date = $flight_date;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct(
        Passenger $passenger,
        Flight $flight
//        DateTime $flight_date
    )
    {
        $this->passenger = $passenger;
        $this->flight = $flight;
        $this->flight_date = new DateTime();
    }
    public static function createFromDTO(TicketDTO $dto): self
    {
        return new self(
            $dto->getPassenger(),
            $dto->getFlight()
//            $dto->getFlightDate()
        );
    }
}