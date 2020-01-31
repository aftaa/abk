<?php

namespace App\Repository;

use App\Entity\CarOwner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CarOwner|null find($id, $lockMode = null, $lockVersion = null)
 * @method CarOwner|null findOneBy(array $criteria, array $orderBy = null)
 * @method CarOwner[]    findAll()
 * @method CarOwner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarOwnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CarOwner::class);
    }

    // /**
    //  * @return CarOwner[] Returns an array of CarOwner objects
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
    public function findOneBySomeField($value): ?CarOwner
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
