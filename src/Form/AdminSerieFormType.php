<?php

namespace App\Form;

use App\Entity\Serie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminSerieFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre ',
                'required' => true
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Status ',
                'required' => true,
                'choices' => [
                    'A venir' => 'A venir',
                    'En cours' => 'En cours',
                    'Terminée' => 'Terminée',
                    'Abandonnée'=> 'Abandonnée',
                ],
                'placeholder' => '-- Status --'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Serie::class,
        ]);
    }
}
