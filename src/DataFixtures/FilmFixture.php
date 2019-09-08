<?php

namespace App\DataFixtures;


use App\Entity\Film;
use App\Entity\Tag;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class FilmFixture extends Fixture implements DependentFixtureInterface
{

    const FILMS = [
        ['Один Дома', '1994', ['Комедии']],
        ['Индиана Джонс', '1993', ['Приключения', 'Комедии']],
        ['Кошмар на улице вязов', '1989', ['Ужасы']]
    ];

    public function load(ObjectManager $manager)
    {
        $tags = $manager->getRepository(Tag::class)->findAll();

        $namedTags = [];

        foreach ($tags as $tag) {
            $namedTags[$tag->getTitle()] = $tag;
        }

        foreach (self::FILMS as $film) {
            $entity = new Film();
            $entity->setTitle($film[0]);
            $entity->setYear($film[1]);

            $tags = [];

            foreach ($film[2] as $title) {
                $tags[] = $namedTags[$title];
            }

            $entity->setTags($tags);
            $manager->persist($entity);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            TagFixture::class,
        );
    }
}