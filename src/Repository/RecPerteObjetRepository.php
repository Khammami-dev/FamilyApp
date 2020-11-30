<?php

namespace App\Repository;

use App\Entity\RecPerteObjet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecPerteObjet|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecPerteObjet|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecPerteObjet[]    findAll()
 * @method RecPerteObjet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecPerteObjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecPerteObjet::class);
    }

    // /**
    //  * @return RecPerteObjet[] Returns an array of RecPerteObjet objects
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
    public function findOneBySomeField($value): ?RecPerteObjet
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
