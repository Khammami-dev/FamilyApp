<?php

namespace App\Repository;

use App\Entity\RecHarcelement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecHarcelement|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecHarcelement|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecHarcelement[]    findAll()
 * @method RecHarcelement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecHarcelementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecHarcelement::class);
    }

    // /**
    //  * @return RecHarcelement[] Returns an array of RecHarcelement objects
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
    public function findOneBySomeField($value): ?RecHarcelement
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
