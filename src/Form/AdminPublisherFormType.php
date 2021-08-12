<?php

namespace App\Form;

use App\Entity\Publisher;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminPublisherFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom ',
                'required' => true,
            ])
            ->add('nationality', ChoiceType::class, [
                'label' => 'Pays ',
                'required' => true,
                'choices' => [
                    'France' => 'France',
                    'Angleterre' => 'Angleterre',
                    'Ecosse' => 'Ecosse',
                    'Irlande' => 'Irlande',
                    'Etats-Unis' => 'Etats-Unis',
                    'Espagne' => 'Espagne',
                    'Japon' => 'Japon',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Publisher::class,
        ]);
    }
}