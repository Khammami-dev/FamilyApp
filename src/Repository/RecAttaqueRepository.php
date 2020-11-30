<?php

namespace App\Repository;

use App\Entity\RecAttaque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecAttaque|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecAttaque|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecAttaque[]    findAll()
 * @method RecAttaque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecAttaqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecAttaque::class);
    }

    // /**
    //  * @return RecAttaque[] Returns an array of RecAttaque objects
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
    public function findOneBySomeField($value): ?RecAttaque
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
