<?php

namespace App\Repository;

use App\Entity\Visiteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Visiteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Visiteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Visiteur[]    findAll()
 * @method Visiteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VisiteurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Visiteur::class);
    }

    private function endQuery($query, $value)
    {
        $query->setParameter('val', $value)
        ->orderBy('v.heure_arrivee', 'DESC')
        ->getQuery()
        ->getResult()
        ;
        return $query;
    }

    /**
    * @return Visiteur[] Returns an array of Visiteur objects
    */
    
    public function findByName($value)
    {
       $query = $this->createQueryBuilder('v')
            ->andWhere('v.nom = :val')
        ;
        endQuery($query, $value);
        return $query;

    }

    public function findByFirstName($value)
    {
        $query = $this->createQueryBuilder('v')
            ->andWhere('v.prenom = :val')
        ;
        endQuery($query, $value);
        return $query;
        
    }

    public function findBySociety($value)
    {
        $query = $this->createQueryBuilder('v')
            ->andWhere('v.societe = :val')
        ;
        endQuery($query, $value);
        return $query;
        
    }

    public function findByMotive($value)
    {
        $query = $this->createQueryBuilder('v')
            ->andWhere('v.motif = :val')
        ;
        endQuery($query, $value);
        return $query;
        
    }

    public function findByDate($value1='0000-00-00 00-00-00', $value2=date('Y-m-d H:i:s'))
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.heure_arrivee >= :val1')
            ->andWhere('v.heure_depart <= :val2')
            ->setParameter('val1', $value1)
            ->setParameter('val2', $value2)
            ->orderBy('v.heure_arrivee', 'DESC')
            ->getQuery()
            ->getResult()
        
    }
    

    /*
    public function findOneBySomeField($value): ?Visiteur
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
