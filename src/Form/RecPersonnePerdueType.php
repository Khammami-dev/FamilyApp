<?php

namespace App\Form;

use App\Entity\RecPersonnePerdue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecPersonnePerdueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('date')
            ->add('localisation')
            ->add('adresse')
            ->add('etat',CheckboxType::class,[
                'label_attr' => ['class' => 'switch-custom'],
            ])
            ->add('validiter',CheckboxType::class,[
                'label_attr' => ['class' => 'switch-custom'],
            ])
            ->add('nom')
            ->add('prenom')
            ->add('numCin')
            ->add('age')
            ->add('datePerte')
            ->add('commissariatPolice', null,[
                'attr' => array(
                    'class'=>'select2'
                )
            ])
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
            ->add('image', FileType::class, [
                'mapped' => false,
                'required' => false,

            ] )

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RecPersonnePerdue::class,
        ]);
    }
}
