<?php

namespace App\Form;

use App\Entity\Film;
use App\Entity\Tag;
use Doctrine\DBAL\Types\StringType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FilmType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'title',
                TextType::class,
                ['attr' =>
                     ['class' => 'form-control']
                ]
            )
            ->add('year',

                TextType::class,
                ['attr' =>
                     ['class' => 'form-control']
                ])
            ->add(
                'tags',
                EntityType::class, [
                    'class'        => Tag::class,
                    'choice_label' => 'title',
                    'expanded'     => false,
                    'multiple'     => true,
                    'attr'         => [
                        'class'    => 'form-control selecting',
                        'multiple' => 'multiple',
                    ]
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
