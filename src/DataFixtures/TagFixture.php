<?php
/**
 * Created by PhpStorm.
 * User: fotki
 * Date: 07.09.2019
 * Time: 18:47
 */

namespace App\DataFixtures;


use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TagFixture extends Fixture
{

    const TAGS = [
        'Комедии',
        'Ужасы',
        'Приключения',
    ];

    public function load(ObjectManager $manager)
    {
        foreach (self::TAGS as $tag) {
            $entity = new Tag();
            $entity->setTitle($tag);
            $manager->persist($entity);
        }

        $manager->flush();
    }
}