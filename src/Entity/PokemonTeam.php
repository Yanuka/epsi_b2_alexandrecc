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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $surName;

    /**
     * @ORM\Column(type="integer")
     */
    private $HP;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Trainer")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trainer;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pokemon")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pokemon;

    public function __construct()
    {
        $this->Trainer = new ArrayCollection();
        $this->Pokemon = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getSurName(): ?string
    {
        return $this->surName;
    }

    public function setSurName(?string $surName): self
    {
        $this->surName = $surName;

        return $this;
    }

    public function getHP(): ?int
    {
        return $this->HP;
    }

    public function setHP(int $HP): self
    {
        $this->HP = $HP;

        return $this;
    }

    public function getTrainer(): ?Trainer
    {
        return $this->trainer;
    }

    public function setTrainer(?Trainer $trainer): self
    {
        $this->trainer = $trainer;

        return $this;
    }

    public function getPokemon(): ?Pokemon
    {
        return $this->pokemon;
    }

    public function setPokemon(?Pokemon $pokemon): self
    {
        $this->pokemon = $pokemon;

        return $this;
    }
}
