<?php

namespace App\Repository;

use App\Entity\ReservationBungalow;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReservationBungalow|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReservationBungalow|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReservationBungalow[]    findAll()
 * @method ReservationBungalow[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationBungalowRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReservationBungalow::class);
    }

    // /**
    //  * @return ReservationBungalow[] Returns an array of ReservationBungalow objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReservationBungalow
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
