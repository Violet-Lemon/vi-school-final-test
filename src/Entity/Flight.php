<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FlightRepository")
 */
class Flight
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(name="id", type="integer")
     */
    private ?int $id;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Airport")
     * @ORM\JoinColumn(name="airport_departure", referencedColumnName="id", nullable=false)
     */
    private Airport $airport_departure;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Airport")
     * @ORM\JoinColumn(name="airport_arrival", referencedColumnName="id", nullable=false)
     */
    private Airport $airport_arrival;
    /**
     * @ORM\Column(name="flight_time", type="integer")
     */
    private int $flight_time;
    /**
     * @ORM\Column(name="status", type="string", length=100, options={"default" : "активен"})
     */
    private string $status;
    /**
     * @ORM\Column(name="base_price", type="float")
     */
    private float $base_price;

    public function getAirportDeparture(): Airport
    {
        return $this->airport_departure;
    }

    public function setAirportDeparture(Airport $airport_departure): void
    {
        $this->airport_departure = $airport_departure;
    }

    public function getAirportArrival(): Airport
    {
        return $this->airport_arrival;
    }

    public function setAirportArrival(Airport $airport_arrival): void
    {
        $this->airport_arrival = $airport_arrival;
    }

    public function getFlightTime(): DateTime
    {
        return $this->flight_time;
    }

    public function setFlightTime(DateTime $flight_time): void
    {
        $this->flight_time = $flight_time;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getBasePrice(): float
    {
        return $this->base_price;
    }

    public function setBasePrice(float $base_price): void
    {
        $this->base_price = $base_price;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFlightData(): string
    {
        $format = '%s (%s) - %s (%s)';
        $flightData = sprintf(
            $format,
            $this->getAirportDeparture()->getAirportCity()->getCityName(),
            $this->getAirportDeparture()->getAirportCode(),
            $this->getAirportArrival()->getAirportCity()->getCityName(),
            $this->getAirportArrival()->getAirportCode()
        );
        return $flightData;
    }

}