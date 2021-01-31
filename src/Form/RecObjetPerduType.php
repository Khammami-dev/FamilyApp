<?php

namespace App\Form;

use App\Entity\Medias;
use App\Entity\RecObjetPerdu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class RecObjetPerduType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class,[
                'label' => 'Titre*',
                'required' => True,
            ])
            ->add('date',null)
            ->add('localisation',TextType::class,[
        'attr' => array(
            'id' => 'infoposition',
            'placeholder' => 'position'
        )
    ])

            ->add('adresse',TextType::class,[
                'label' => 'Adresse Manuelle*',

                'required' => True,
                'attr' => array(
                    'id' => 'infoposition',
                    'placeholder' => '8,Rue el borhaine,Mourouj5,Ben Arous'
                )
            ])
            ->add('etat',CheckboxType::class,[
                'label_attr' => ['class' => 'switch-custom'],
            ])
            ->add('validiter',CheckboxType::class,[
                        'label_attr' => ['class' => 'switch-custom'],
                       ])
            ->add('categorie',ChoiceType::class,[
                        'choices'  => [
                    'SmartPhone'=>'SmartPhone',
                    'Voiture'=>'Voiture',
                    'Documents personnels' => 'Documents personnels',
                    'Argent'=>'Argent',
                    'Ordinateur'=>'Ordinateur',
                    'Sac à main'=>'Sac à main',
                    'Vétements'=>'Vétements',


                ],
                'attr' => array(
                    'class'=>'select2'
                )

            ])
            ->add('marque')
            ->add('dateperte',null,[
        'attr' => array(
            'id'=>'datetimepicker1'
        )
    ])
            ->add('modele')
            ->add('couleur')
            ->add('numSerie')
            ->add('commisariatPolice', null,[
                'attr' => array(
                    'class'=>'select2'
                )
            ])
            ->add('user')
           ->add('Media',FileType::class,[
                'label' => 'Media',
                'mapped' =>false,
                'multiple' => true,
                'required' => false,


            ])
            ->add('image', FileType::class, [
                'mapped' => false,
                'required' => false,

            ] )
            ->add('description',TextareaType::class,[
                'label' => 'Description',
                    'attr' => array(
                        'placeholder' => 'Si vous avez plus des détails'
                    )
                ]
            )
            ->add('publique',CheckboxType::class,[
                    'required' => true,

                    'attr' => array(
                        'placeholder' => 'Si vous choisisez publique votre réclamation vas étre publier dans notre site'
                    )
                ]
            )

        ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RecObjetPerdu::class,
        ]);
    }
}
