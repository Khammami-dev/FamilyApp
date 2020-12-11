<?php

namespace App\Form;

use App\Entity\RecPertePersonne;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecPertePersonneType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id_reclamation',ReclamationType::class)
            ->add('nom')
            ->add('prenom')
            ->add('num_cin')
            ->add('age')
            ->add('date_perte')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RecPertePersonne::class,
        ]);
    }
}
