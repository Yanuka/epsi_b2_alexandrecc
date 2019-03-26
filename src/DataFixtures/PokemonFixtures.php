<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use App\Entity\Type;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PokemonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getPokemons() as [$name, $type, $HP, $attack, $attack2]) {
            $pokemon = new Pokemon;
            $pokemon
                ->setName($name)
                ->setType($type)
                ->setHP($HP)
                ->addAttack($attack)
                ->addAttack($attack2)

            ;

            $manager->persist($pokemon);
        }

        $manager->flush();
    }

    public function getPokemons()
    {
        // [name, type, HP, attack, attack2]
        return [
            ['Salamèche', Type::TYPE_FIRE, 100, $this->getReference('Flammèche'), $this->getReference('Charge')],
            ['Carapuce', Type::TYPE_WATER, 120, $this->getReference('Pistolet à O'), $this->getReference('Charge')],
            ['Bulbizarre', Type::TYPE_PLANT, 90, $this->getReference('Vol-Vie'), $this->getReference('Charge')]

        ];
    }
}
