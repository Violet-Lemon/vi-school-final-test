<?php

namespace App\Repository;

use App\Entity\Airport;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AirportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Airport::class);
    }

    public function findById(int $id): ?Airport
    {
        return $this->findOneBy(['id' => $id]);
    }

}