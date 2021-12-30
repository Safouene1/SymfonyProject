<?php

namespace App\Repository;

use App\Entity\D;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method D|null find($id, $lockMode = null, $lockVersion = null)
 * @method D|null findOneBy(array $criteria, array $orderBy = null)
 * @method D[]    findAll()
 * @method D[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, D::class);
    }

    // /**
    //  * @return D[] Returns an array of D objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?D
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
