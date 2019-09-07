<?php

namespace App\Repository;


use App\Entity\Tag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepositoryInterface;

interface TagRepositoryInterface extends ServiceEntityRepositoryInterface
{
    public function getTagByTitle(string $title): ?Tag;

}