<?php

namespace App\Repository;

use App\Entity\Minecraft;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Minecraft|null find($id, $lockMode = null, $lockVersion = null)
 * @method Minecraft|null findOneBy(array $criteria, array $orderBy = null)
 * @method Minecraft[]    findAll()
 * @method Minecraft[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MinecraftRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Minecraft::class);
    }

    // /**
    //  * @return Minecraft[] Returns an array of Minecraft objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Minecraft
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
