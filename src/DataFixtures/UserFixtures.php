<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
		// Pour ajouter des utilisateurs par ici, utiliser "php bin/console security:hash-password" pour obtenir un mot de passe hashé correctement.
		$admin = new User();
		$admin->setEmail("admin@blog.com");
		$admin->setPassword('$2y$13$vqm4lFfk5n6AJGsqqZHvt.EmtOMQNZAZBoHbAuKP209Mg/gyT3X7y');  // password = admin 
		$manager->persist($admin);
		
        $manager->flush();
    }
}
