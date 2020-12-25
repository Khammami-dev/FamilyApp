<?php

namespace App\Form;

use App\Entity\RecObjetPerdu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecObjetPerduType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('date')
            ->add('localisation')
            ->add('adresse')
            ->add('description')
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RecObjetPerdu::class,
        ]);
    }
}
