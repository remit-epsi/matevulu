<?php

namespace App\Repository;


use App\Entity\ReservationPlongee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReservationPlongee|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReservationPlongee|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReservationPlongee[]    findAll()
 * @method ReservationPlongee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservationPlongeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReservationPlongee::class);
    }


    // /**
    //  * @return ReservationPlongee[] Returns an array of ReservationPlongee objects
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
    public function findOneBySomeField($value): ?ReservationPlongee
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
