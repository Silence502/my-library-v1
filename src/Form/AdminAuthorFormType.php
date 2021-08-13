<?php

namespace App\Form;

use App\Entity\Author;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminAuthorFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('alias', TextType::class, [
                'label' => 'Alias ',
                'required' => false,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom ',
                'required' => true,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('birthday', DateType::class, [
                'label' => 'Date de naissance ',
                'required' => false,
                'widget' => 'single_text',
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('deathday', DateType::class, [
                'label' => 'Date de décés ',
                'required' => false,
                'widget' => 'single_text',
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('nationality', ChoiceType::class, [
                'label' => 'Nationalité ',
                'required' => true,
                'choices' => [
                    'France' => 'France',
                    'Angleterre' => 'Angleterre',
                    'Ecosse' => 'Ecosse',
                    'Irlande' => 'Irlande',
                    'Etats-Unis' => 'Etats-Unis',
                    'Espagne' => 'Espagne',
                    'Japon' => 'Japon',
                ],
                'placeholder' => '-- Nationalité --',
                'attr' =>[
                    'class' => 'test',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Author::class,
        ]);
    }
}
