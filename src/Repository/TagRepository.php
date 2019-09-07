<?php

namespace App\Repository;


use App\Entity\Tag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityRepository;

class TagRepository extends ServiceEntityRepository implements TagRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tag::class);
    }

    /**
     * @param string $title
     * @return Tag|null
     */
    public function getTagByTitle(string $title): ?Tag
    {
        $tag = $this->createQueryBuilder('t')
            ->andWhere('t.title = :title')
            ->setParameter('title', $title)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult();

        return $tag;
    }

}