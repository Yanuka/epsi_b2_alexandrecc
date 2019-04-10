<?php

namespace App\DataFixtures;

use App\Entity\Trainer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TrainerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getTrainers() as [$username, $roles, $password]) {
            $trainer = new Trainer;
            $trainer
                ->setUsername($username)
                ->setRoles($roles)
                ->setPassword($password)
            ;

            $manager->persist($trainer);
            $reference = $this->addReference($username, $trainer);
        }

        $manager->flush();
    }

    public function getTrainers()
    {
        // [username, roles, password]
        return [
            ['Admin', ['ROLE_ADMIN'], 'Admin'],
            ['Sacha', ['ROLE_USER'], 'FLORA4EVER']
            
        ];
    }
}

?>