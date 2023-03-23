<?php

namespace App\Repository;

use App\Entity\Ecig;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ecig|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ecig|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ecig[]    findAll()
 * @method Ecig[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EcigRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ecig::class);
    }

    // /**
    //  * @return Ecig[] Returns an array of Ecig objects
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
    public function findOneBySomeField($value): ?Ecig
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
