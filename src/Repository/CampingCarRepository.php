<?php

namespace App\Repository;

use App\Entity\CampingCar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CampingCar|null find($id, $lockMode = null, $lockVersion = null)
 * @method CampingCar|null findOneBy(array $criteria, array $orderBy = null)
 * @method CampingCar[]    findAll()
 * @method CampingCar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CampingCarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CampingCar::class);
    }

    // /**
    //  * @return CampingCar[] Returns an array of CampingCar objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CampingCar
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
