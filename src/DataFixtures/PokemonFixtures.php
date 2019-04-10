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
        foreach ($this->getPokemons() as [$name, $surName, $type, $HP, $attack, $attack2]) {
            $pokemon = new Pokemon;
            $pokemon
                ->setName($name)
                ->setSurName($surName)
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
        // [name, surname, type, HP, attack, attack2]
        return [
            ['Salamèche', 'Salami', Type::TYPE_FIRE, 100, $this->getReference('Flammèche'), $this->getReference('Charge')],
            ['Carapuce', 'Caramel', Type::TYPE_WATER, 120, $this->getReference('Pistolet à O'), $this->getReference('Charge')],
            ['Bulbizarre', 'BouleBizarre', Type::TYPE_PLANT, 90, $this->getReference('Vol-Vie'), $this->getReference('Charge')]

        ];
    }
}
