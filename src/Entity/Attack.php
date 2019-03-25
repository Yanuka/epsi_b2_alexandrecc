<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AttackRepository")
 */
class Attack extends Base
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
    private $Name;

    /**
     * @ORM\Column(type="integer")
     */
    private $Power;

    /**
     * @ORM\Column(type="smallint")
     */
    private $Type;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Pokemon", mappedBy="Attack")
     */
    private $Pokemon;

    public function __construct()
    {
        $this->Pokemon = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getPower(): ?int
    {
        return $this->Power;
    }

    public function setPower(int $Power): self
    {
        $this->Power = $Power;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->Type;
    }

    public function setType(int $Type): self
    {
        $this->Type = $Type;

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
            $pokemon->addAttack($this);
        }

        return $this;
    }

    public function removePokemon(Pokemon $pokemon): self
    {
        if ($this->Pokemon->contains($pokemon)) {
            $this->Pokemon->removeElement($pokemon);
            $pokemon->removeAttack($this);
        }

        return $this;
    }
}
