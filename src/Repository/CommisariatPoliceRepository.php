<?php

namespace App\Repository;

use App\Entity\CommisariatPolice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommisariatPolice|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommisariatPolice|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommisariatPolice[]    findAll()
 * @method CommisariatPolice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommisariatPoliceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommisariatPolice::class);
    }

    // /**
    //  * @return CommisariatPolice[] Returns an array of CommisariatPolice objects
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
    public function findOneBySomeField($value): ?CommisariatPolice
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
