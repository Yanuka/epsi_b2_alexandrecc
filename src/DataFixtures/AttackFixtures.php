<?php

namespace App\DataFixtures;

use App\Entity\Attack;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AttackFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getAttacks() as [$name, $power, $type]) {
            $attack = new Attack;
            $attack
                ->setName($name)
                ->setPower($power)
                ->setType($type)
            ;

            $manager->persist($attack);
            $reference = $this->addReference($name, $attack);
        }

        $manager->flush();
    }

    public function getAttacks()
    {
        // [name, power, type]
        return [
            ['Flammèche', 50, Type::TYPE_FIRE],
            ['Pistolet à O', 70, Type::TYPE_WATER],
            ['Vol-Vie', 40, Type::TYPE_PLANT]
        ];
    }
}
