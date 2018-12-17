<?php

namespace App\Repository;

use App\Entity\LieuVisite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LieuVisite|null find($id, $lockMode = null, $lockVersion = null)
 * @method LieuVisite|null findOneBy(array $criteria, array $orderBy = null)
 * @method LieuVisite[]    findAll()
 * @method LieuVisite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LieuVisiteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LieuVisite::class);
    }

    // /**
    //  * @return LieuVisite[] Returns an array of LieuVisite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LieuVisite
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
