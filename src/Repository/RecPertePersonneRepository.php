<?php

namespace App\Repository;

use App\Entity\RecPertePersonne;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecPertePersonne|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecPertePersonne|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecPertePersonne[]    findAll()
 * @method RecPertePersonne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecPertePersonneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecPertePersonne::class);
    }

    // /**
    //  * @return RecPertePersonne[] Returns an array of RecPertePersonne objects
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
    public function findOneBySomeField($value): ?RecPertePersonne
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
