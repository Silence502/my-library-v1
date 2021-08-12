<?php

namespace App\Repository;

use App\Entity\BookWished;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookWished|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookWished|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookWished[]    findAll()
 * @method BookWished[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookWishedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookWished::class);
    }

    // /**
    //  * @return BookWished[] Returns an array of BookWished objects
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
    public function findOneBySomeField($value): ?BookWished
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
