<?php

namespace App\Repository;

use App\Entity\Bungalow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bungalow|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bungalow|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bungalow[]    findAll()
 * @method Bungalow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BungalowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bungalow::class);
    }

    // /**
    //  * @return Bungalow[] Returns an array of Bungalow objects
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
    public function findOneBySomeField($value): ?Bungalow
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
