<?php

namespace App\Form;

use App\Entity\Reclamation;
use App\Entity\RecPerteObjet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecPerteObjetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('id_reclamation',ReclamationType::class)
            ->add('categorie',ChoiceType::class, [
                'choices'  => [
                    'documents' => 1,
                    'Smarthone' => 2,
                    'pc portable' => 3,
                ],
            ])
            ->add('marque')
            ->add('date_perte')
            ->add('modele')
            ->add('couleur')
            ->add('num_serie')
            ->add('Ajouter',SubmitType::class)


        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RecPerteObjet::class,

        ]);

    }

}
