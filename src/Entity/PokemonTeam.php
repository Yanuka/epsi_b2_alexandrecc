<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonTeamRepository")
 */
class PokemonTeam
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Trainer", mappedBy="pokemonTeam")
     */
    private $Trainer;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Pokemon", mappedBy="pokemonTeam")
     */
    private $Pokemon;

    public function __construct()
    {
        $this->Trainer = new ArrayCollection();
        $this->Pokemon = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Trainer[]
     */
    public function getTrainer(): Collection
    {
        return $this->Trainer;
    }

    public function addTrainer(Trainer $trainer): self
    {
        if (!$this->Trainer->contains($trainer)) {
            $this->Trainer[] = $trainer;
            $trainer->setPokemonTeam($this);
        }

        return $this;
    }

    public function removeTrainer(Trainer $trainer): self
    {
        if ($this->Trainer->contains($trainer)) {
            $this->Trainer->removeElement($trainer);
            // set the owning side to null (unless already changed)
            if ($trainer->getPokemonTeam() === $this) {
                $trainer->setPokemonTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pokemon[]
     */
    public function getPokemon(): Collection
    {
        return $this->Pokemon;
    }

    public function addPokemon(Pokemon $pokemon): self
    {
        if (!$this->Pokemon->contains($pokemon)) {
            $this->Pokemon[] = $pokemon;
            $pokemon->setPokemonTeam($this);
        }

        return $this;
    }

    public function removePokemon(Pokemon $pokemon): self
    {
        if ($this->Pokemon->contains($pokemon)) {
            $this->Pokemon->removeElement($pokemon);
            // set the owning side to null (unless already changed)
            if ($pokemon->getPokemonTeam() === $this) {
                $pokemon->setPokemonTeam(null);
            }
        }

        return $this;
    }
}
