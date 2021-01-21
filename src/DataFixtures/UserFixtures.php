<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr');
        $user = new User();
        $user->setEmail('admin@gmail.com');
        $user->setPassword(
            $this->passwordEncoder->encodePassword(
                $user,
                'secret'
            )
        )
            ->setRoles(['ROLE_ADMIN'])
        ;
        $user->setNom('Agent');
        $user->setPrenom('Police');
        $user->setTelephone($faker->phoneNumber);
        $user->setAdresse($faker->address);
        $user->setNumcin($faker->numberBetween(11111111,99999999));

        $manager->persist($user);
        $manager->flush();
    }
    public static function getGroups(): array
    {
        return ['groupeUser'];
    }
}
