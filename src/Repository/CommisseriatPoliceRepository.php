<?php

namespace App\Repository;

use App\Entity\CommisseriatPolice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommisseriatPolice|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommisseriatPolice|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommisseriatPolice[]    findAll()
 * @method CommisseriatPolice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommisseriatPoliceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommisseriatPolice::class);
    }

    // /**
    //  * @return CommisseriatPolice[] Returns an array of CommisseriatPolice objects
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
    public function findOneBySomeField($value): ?CommisseriatPolice
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
