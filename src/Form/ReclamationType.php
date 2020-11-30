<?php

namespace App\Form;

use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('date')
            ->add('localisation')
            ->add('adresse')
            ->add('etat')
            ->add('publique')
            ->add('validiter')
            ->add('recPerteObjet')
            ->add('recHarcelement')
            ->add('recAttaque')
            ->add('id_utilisateur')
            ->add('id_commissariat')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
