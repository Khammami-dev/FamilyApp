<?php

namespace App\Form;

use App\Entity\RecObjetPerdu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecObjetPerduType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',TextType::class,[
                'label' => 'Titre*',
                'required' => True,
            ])
            ->add('date')
            ->add('localisation')
            ->add('adresse',TextType::class,[
                'label' => 'Adresse Manuelle*',
                'required' => True,
                'attr' => array(
                    'placeholder' => '8,Rue el borhaine,Mourouj5,Ben Arous'
                )
            ])
            ->add('etat')
            ->add('publique')
            ->add('validiter')
            ->add('categorie')
            ->add('marque')
            ->add('dateperte')
            ->add('modele')
            ->add('couleur')
            ->add('numSerie')
            ->add('commisariatPolice')
            ->add('user')
           ->add('Media',FileType::class,[
                'label' => 'Media',
                'mapped' =>false,
                'multiple' => true,
                'required' => false,
            ])
            ->add('description',TextareaType::class,[
                'label' => 'Description',
                    'attr' => array(
                        'placeholder' => 'Si vous avez plus des détails'
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
