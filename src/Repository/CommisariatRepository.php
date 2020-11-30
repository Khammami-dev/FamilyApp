<?php

namespace App\Repository;

use App\Entity\Commisariat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Commisariat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commisariat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commisariat[]    findAll()
 * @method Commisariat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommisariatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Commisariat::class);
    }

    // /**
    //  * @return Commisariat[] Returns an array of Commisariat objects
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
    public function findOneBySomeField($value): ?Commisariat
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
