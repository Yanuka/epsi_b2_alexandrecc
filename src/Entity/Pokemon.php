<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PokemonRepository")
 */
class Pokemon extends Base
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="smallint")
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $HP;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Attack", inversedBy="Pokemon")
     */
    private $attack;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PokemonTeam", inversedBy="Pokemon")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pokemonTeam;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $surName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

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

    /**
     * @return Collection|Attack[]
     */
    public function getAttack(): Collection
    {
        return $this->attack;
    }

    public function addAttack(Attack $attack): self
    {
        if (!$this->attack->contains($attack)) {
            $this->attack[] = $attack;
        }

        return $this;
    }

    public function removeAttack(Attack $attack): self
    {
        if ($this->attack->contains($attack)) {
            $this->attack->removeElement($attack);
        }

        return $this;
    }

    public function getPokemonTeam(): ?PokemonTeam
    {
        return $this->pokemonTeam;
    }

    public function setPokemonTeam(?PokemonTeam $pokemonTeam): self
    {
        $this->pokemonTeam = $pokemonTeam;

        return $this;
    }

    public function getSurName(): ?string
    {
        return $this->surName;
    }

    public function setSurName(string $surName): self
    {
        $this->surName = $surName;

        return $this;
    }

    
}
