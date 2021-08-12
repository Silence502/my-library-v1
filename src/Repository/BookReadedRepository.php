<?php

namespace App\Repository;

use App\Entity\BookReaded;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookReaded|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookReaded|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookReaded[]    findAll()
 * @method BookReaded[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookReadedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookReaded::class);
    }

    // /**
    //  * @return BookReaded[] Returns an array of BookReaded objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BookReaded
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
