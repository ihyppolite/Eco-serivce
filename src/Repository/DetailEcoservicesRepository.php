<?php

namespace App\Repository;

use App\Entity\DetailEcoservices;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DetailEcoservices>
 *
 * @method DetailEcoservices|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailEcoservices|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailEcoservices[]    findAll()
 * @method DetailEcoservices[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailEcoservicesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetailEcoservices::class);
    }

    public function save(DetailEcoservices $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DetailEcoservices $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DetailEcoservices[] Returns an array of DetailEcoservices objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DetailEcoservices
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
