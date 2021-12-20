<?php

namespace App\Repository;

use App\Entity\Passenger;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class PassengerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Passenger::class);
    }

    public function findById(int $id): ?Passenger
    {
        return $this->findOneBy(['id' => $id]);
    }

}