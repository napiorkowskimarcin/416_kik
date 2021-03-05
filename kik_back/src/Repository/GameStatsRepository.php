<?php

namespace App\Repository;

use App\Entity\GameStats;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GameStats|null find($id, $lockMode = null, $lockVersion = null)
 * @method GameStats|null findOneBy(array $criteria, array $orderBy = null)
 * @method GameStats[]    findAll()
 * @method GameStats[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GameStatsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GameStats::class);
    }

    // /**
    //  * @return GameStats[] Returns an array of GameStats objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AmeStats
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}