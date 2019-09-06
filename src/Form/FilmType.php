<?php

namespace App\Form;

use App\Entity\Film;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('year')
            ->add(
                'tags',
                EntityType::class, [
                    'class'=> Tag::class,
                    'choice_label' => 'title',
                    'expanded' => true,
                    'multiple' => true,
//                ChoiceType::class, [
//                    'choices'      => [
//                        'tags' => function (TagRepository $tagRepository) {
//                            return $tagRepository->findAll();
//                        }],
//                    'expanded' => true,
//                    'multiple' => true,
//                    'choice_label' => function (Tag $tag, $key, $value) {
//                        return $tag->getTitle();
//                    },
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Film::class,
        ]);
    }
}
