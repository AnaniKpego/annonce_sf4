<?php

namespace App\Repository;

use App\Entity\BandeDessinee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method BandeDessinee|null find($id, $lockMode = null, $lockVersion = null)
 * @method BandeDessinee|null findOneBy(array $criteria, array $orderBy = null)
 * @method BandeDessinee[]    findAll()
 * @method BandeDessinee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BandeDessineeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, BandeDessinee::class);
    }

    // /**
    //  * @return BandeDessinee[] Returns an array of BandeDessinee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BandeDessinee
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
