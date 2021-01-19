<?php

namespace App\Form;

use App\Entity\RecPersonnePerdue;
use Symfony\Component\Form\AbstractType;
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
            ->add('description')
            ->add('etat')
            ->add('publique')
            ->add('validiter')
            ->add('nom')
            ->add('prenom')
            ->add('numCin')
            ->add('age')
            ->add('datePerte')
            ->add('commissariatPolice')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RecPersonnePerdue::class,
        ]);
    }
}
