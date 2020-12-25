<?php

namespace App\Repository;

use App\Entity\RecPersonnePerdue;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecPersonnePerdue|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecPersonnePerdue|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecPersonnePerdue[]    findAll()
 * @method RecPersonnePerdue[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecPersonnePerdueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecPersonnePerdue::class);
    }

    // /**
    //  * @return RecPersonnePerdue[] Returns an array of RecPersonnePerdue objects
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
    public function findOneBySomeField($value): ?RecPersonnePerdue
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
