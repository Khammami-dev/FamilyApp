<?php

namespace App\Repository;

use App\Entity\RecObjetPerdu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecObjetPerdu|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecObjetPerdu|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecObjetPerdu[]    findAll()
 * @method RecObjetPerdu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecObjetPerduRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecObjetPerdu::class);
    }
    public function getNb() {

        return $this->createQueryBuilder('l')

            ->select('COUNT(l)')

            ->getQuery()

            ->getSingleScalarResult();

    }

    // /**
    //  * @return RecObjetPerdu[] Returns an array of RecObjetPerdu objects
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
    public function findOneBySomeField($value): ?RecObjetPerdu
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
