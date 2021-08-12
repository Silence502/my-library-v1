<?php

namespace App\Repository;

use App\Entity\Illustrator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Illustrator|null find($id, $lockMode = null, $lockVersion = null)
 * @method Illustrator|null findOneBy(array $criteria, array $orderBy = null)
 * @method Illustrator[]    findAll()
 * @method Illustrator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IllustratorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Illustrator::class);
    }

    // /**
    //  * @return Illustrator[] Returns an array of Illustrator objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Illustrator
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
