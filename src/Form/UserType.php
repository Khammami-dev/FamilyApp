<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',TextType::class,[
                'label' => 'Nom*',
                'required' => True,

            ])
            ->add('prenom',TextType::class,[
                'label' => 'Prenom*',
                'required' => True,

            ])
            ->add('numcin',TextType::class,[
                'label' => 'Numéro CIN*',
                'required' => True,
            ])
            ->add('telephone',TextType::class,[
                'label' => 'Numéro Téléphone*',
                'required' => True,
                'attr' => array(
                    'placeholder' => '+216 00 000 000'
                )
            ])
            ->add('adresse',TextType::class,[
                'label' => 'Adresse*',
                'required' => True,
                'attr' => array(
                    'placeholder' => '8,Rue el borhaine,Mourouj5,Ben Arous'
                )
            ])
            ->add('roles')
            ->add('email', EmailType::class,[
                'label' => 'Email*',
                'required' => True,
                'attr' => array(
                    'placeholder' => 'xxx@yyy.com'
                )
            ])
            ->add('password', PasswordType::class,[
                'label' => 'Mot de passe*',
                'required' => True,
                'attr' => array(

                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
