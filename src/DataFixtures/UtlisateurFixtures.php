<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class UtlisateurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
       $faker = Factory::create('fr');
       for($i=0; $i<200 ; $i++){
           $utilisateur = new Utilisateur();
           $utilisateur->setNumCin($faker->numberBetween(11111111,99999999));
           $utilisateur->setNom($faker->firstName);
           $utilisateur->setPrenom($faker->lastName);
           $utilisateur->setAdresse($faker->address);
           $utilisateur->setTelephone($faker->phoneNumber);
           $manager->persist($utilisateur);

       }

        $manager->flush();
    }
}
