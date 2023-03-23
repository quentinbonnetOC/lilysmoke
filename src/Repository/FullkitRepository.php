<?php

namespace App\Repository;

use App\Entity\Fullkit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fullkit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fullkit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fullkit[]    findAll()
 * @method Fullkit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FullkitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fullkit::class);
    }

     /**
      * @return Fullkit[] Returns an array of Fullkit objects
      */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fullkit
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
