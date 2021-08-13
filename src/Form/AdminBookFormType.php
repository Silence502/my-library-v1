<?php

namespace App\Form;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Category;
use App\Entity\Genre;
use App\Entity\Illustrator;
use App\Entity\Publisher;
use App\Entity\Serie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminBookFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('originalTitle', TextType::class, [
                'label' => 'Titre original ',
                'required' => true,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('frenchTitle', TextType::class, [
                'label' => 'Titre français ',
                'required' => false,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('romajiTitle', TextType::class, [
                'label' => 'Titre romaji ',
                'required' => false,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('kanaTitle', TextType::class, [
                'label' => 'Titre kana ',
                'required' => false,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('tome', IntegerType::class, [
                'label' => 'Tome ',
                'required' => false,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('nbPages', IntegerType::class, [
                'label' => 'Nombre de pages ',
                'required' => true,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('isbn', TextType::class, [
                'label' => 'ISBN ',
                'required' => true,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('price', NumberType::class, [
                'label' => 'Prix ',
                'required' => true,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('releaseDate', IntegerType::class, [
                'label' => 'Date de publication ',
                'required' => true,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('country', ChoiceType::class, [
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
                ],
                'placeholder' => '-- Pays --',
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('summary', TextareaType::class, [
                'label' => 'Résumé ',
                'required' => true,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('author', EntityType::class, [
                'label' => 'Auteur ',
                'required' => true,
                'class' => Author::class,
                'choice_label' => 'name',
                'placeholder' => '-- Editeur --',
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('illustrator', EntityType::class, [
                'label' => 'Illustrateur(s) ',
                'required' => false,
                'class' => Illustrator::class,
                'choice_label' => 'name',
                'placeholder' => '-- Illustrateur --',
                'multiple' => true,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('publisher', EntityType::class, [
                'label' => 'Editeur ',
                'required' => true,
                'class' => Publisher::class,
                'choice_label' => 'name',
                'placeholder' => '-- Editeur --',
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('serie', EntityType::class, [
                'label' => 'Saga ',
                'required' => false,
                'class' => Serie::class,
                'choice_label' => 'title',
                'placeholder' => '-- Saga --',
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('genre', EntityType::class, [
                'label' => 'Genre ',
                'required' => true,
                'class' => Genre::class,
                'choice_label' => 'name',
                'placeholder' => '-- Genre --',
                'multiple' => true,
                'expanded' => true,
                'attr' =>[
                    'class' => 'test',
                ],
            ])
            ->add('category', EntityType::class, [
                'label' => 'Catégorie ',
                'required' => true,
                'class' => Category::class,
                'choice_label' => 'name',
                'placeholder' => '-- Catégorie --',
                'attr' =>[
                    'class' => 'test',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
