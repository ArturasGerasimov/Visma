<?php

namespace App\Repository;

use App\Entity\Counting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Counting|null find($id, $lockMode = null, $lockVersion = null)
 * @method Counting|null findOneBy(array $criteria, array $orderBy = null)
 * @method Counting[]    findAll()
 * @method Counting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Counting::class);
    }

    // /**
    //  * @return Counting[] Returns an array of Counting objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Counting
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
