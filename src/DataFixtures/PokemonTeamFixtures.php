<?php

namespace App\DataFixtures;

use App\Entity\Trainer;
use App\Entity\Pokemon;
use App\Entity\PokemonTeam;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PokemonTeamFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getPokemonTeams() as [$username, $pokemon1, $pokemonSurname1, $pokemon2, $pokemonSurname2, $pokemon3, $pokemonSurname3]) {
            $pokemonTeam = new PokemonTeam;
            $pokemonTeam
                ->addUsername($username)
                ->addPokemon($pokemon1)
                ->addPokemonSurname($pokemonSurname1)
                ->addPokemon($pokemon2)
                ->addPokemonSurname($pokemonSurname2)
                ->addPokemon($pokemon3)
                ->addPokemonSurname($pokemonSurname3)
            ;

            $manager->persist($pokemonTeam);
            $reference = $this->addReference($username, $pokemonTeam);
        }

        $manager->flush();
    }

    public function getPokemonTeams()
    {
        // [username, pokemon1, pokemonSurname1, pokemon2, pokemonSurname2, pokemon3, pokemonSurname3]
        return [
            [$this->getReference('Sacha'), $this->getReference('Carapuce'), $this->getReference('Caramel'), $this->getReference('Salamèche'), $this->getReference('Salami'), $this->getReference('Bulbizarre'), $this->getReference('Boulebizarre')]

            
        ];
    }

    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}

?>