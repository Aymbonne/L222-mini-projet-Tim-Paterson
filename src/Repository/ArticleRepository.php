<?php

namespace App\Repository;

use App\Entity\Article;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    
    public function findBySearch(string $value, string $article_filter): array
    {
        $article_requete = $this->createQueryBuilder('article');

        if ($article_filter == 'titre') {
            $article_requete->andWhere('article.title LIKE :val');

        } elseif ($article_filter == 'categorie') {
            $article_requete->leftJoin('article.Category', 'category')
            ->andWhere('category.name LIKE :val');
        } 
        // else {
        //     $article_requete->leftJoin('article.')
        // }

        return $article_requete ->setParameter('val', '%' .$value. "%")
        ->orderBy('article.id', 'DESC')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult();
    }

    // /**
    //  * @return Article[] Returns an array of Article objects
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
    public function findOneBySomeField($value): ?Article
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
