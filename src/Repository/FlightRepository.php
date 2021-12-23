<?php

namespace App\Repository;

use App\Entity\Flight;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FlightRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Flight::class);
    }

    public function findById(int $id): ?Flight
    {
        return $this->findOneBy(['id' => $id]);
    }

//    public function findByStatus(string $status): array
//    {
//        return $this->findBy(['status' => $status]);
//    }

}