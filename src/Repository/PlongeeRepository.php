<?php

namespace App\Repository;

use App\Entity\Plongee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Plongee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Plongee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Plongee[]    findAll()
 * @method Plongee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlongeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Plongee::class);
    }

    // /**
    //  * @return Plongee[] Returns an array of Plongee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Plongee
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
