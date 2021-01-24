<?php

namespace App\Repository;

use App\Entity\PostModality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PostModality|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostModality|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostModality[]    findAll()
 * @method PostModality[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostModalityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostModality::class);
    }

    // /**
    //  * @return PostModality[] Returns an array of PostModality objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PostModality
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
