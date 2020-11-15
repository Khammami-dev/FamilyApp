<?php

namespace App\Form;

use App\Entity\RecObjetPerdu;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\LocaleType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecObjetPerduType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('date', DateTimeType::class)
            ->add('position')
            ->add('categorie',ChoiceType::class, [
                'choices'  => [
                    'documents' => 1,
                    'Smarthone' => 2,
                    'pc portable' => 3,
                ],
            ])

            ->add('marque')
            ->add('couleur')
            ->add('NumSerie')
            ->add('image', FileType::class, [
                'mapped' => false] )
            ->add('video',FileType::class, [
                'mapped' => false] )
            ->add('type')
            ->add('id_utilisateur')
            ->add('id_commisseriatPolice')
            ->add('description',TextareaType::class)
            ->add('publique')
            ->add('Ajouter', SubmitType::class);


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RecObjetPerdu::class,
        ]);
    }
}
