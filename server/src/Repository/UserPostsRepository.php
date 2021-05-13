<?php

namespace App\Repository;

use App\Entity\UserPosts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserPosts|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserPosts|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserPosts[]    findAll()
 * @method UserPosts[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserPostsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserPosts::class);
    }

    // /**
    //  * @return UserPosts[] Returns an array of UserPosts objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserPosts
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
