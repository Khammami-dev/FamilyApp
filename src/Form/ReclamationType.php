<?php

namespace App\Form;

use App\Entity\Reclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('date',HiddenType::class)
            ->add('localisation')
            ->add('adresse')
            ->add('etat',HiddenType::class)
            ->add('publique')
            ->add('validiter',HiddenType::class)
            ->add('recPerteObjet',HiddenType::class)
            ->add('recHarcelement',HiddenType::class)
            ->add('recAttaque',HiddenType::class)
            ->add('id_utilisateur',HiddenType::class)
            ->add('id_commissariat')
            ->add('Media',null,[
                    'attr'  => [
                        'class' => 'input-images'
                    ],
                    'label' => 'Media',
                    'mapped' =>false,
                    'required' => false,
                ])


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,

        ]);
    }
}
