<?php

namespace App\Repository;

use App\Entity\BookReading;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookReading|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookReading|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookReading[]    findAll()
 * @method BookReading[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookReadingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookReading::class);
    }

    // /**
    //  * @return BookReading[] Returns an array of BookReading objects
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
    public function findOneBySomeField($value): ?BookReading
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
