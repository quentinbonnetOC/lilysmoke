<?php

namespace App\Repository;

use App\Entity\Eliquid;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Eliquid|null find($id, $lockMode = null, $lockVersion = null)
 * @method Eliquid|null findOneBy(array $criteria, array $orderBy = null)
 * @method Eliquid[]    findAll()
 * @method Eliquid[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EliquidRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Eliquid::class);
    }

    // /**
    //   * @return Eliquid[] Returns an array of Eliquid objects
    //  */

    
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Eliquid
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
