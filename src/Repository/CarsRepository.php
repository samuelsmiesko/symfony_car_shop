<?php

namespace App\Repository;

use App\Entity\Cars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cars>
 */
class CarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cars::class);
    }

//    /**
//     * @return Cars[] Returns an array of Cars objects
//     */


//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cars
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findAllOrdered(): array
    {

        $qb = $this->createQueryBuilder('category')
            ->addOrderBy('category.modelname', Criteria::DESC);
        
        $query = $qb->getQuery();

        return $query->getResult();


    }

    /**
     * @return string $term
     * @return Category[]
     */

    public function search(string $term): array
    {
        return $this->createQueryBuilder('category')
            ->andWhere('category.modelname LIKE :searchTerm')
            
            ->setParameter('searchTerm', '%' .$term.'%')
            ->addOrderBy('category.modelname', 'Desc')
            ->getQuery()    
            ->getResult();
    }

    
}
