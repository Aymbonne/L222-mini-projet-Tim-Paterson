<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
		$admin = new User();
		$admin->setEmail("admin@blog.com");
		$admin->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
		$admin->setPassword('$2y$13$vqm4lFfk5n6AJGsqqZHvt.EmtOMQNZAZBoHbAuKP209Mg/gyT3X7y');
		$manager->persist($admin);
		
        $manager->flush();
    }
}
