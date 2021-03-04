<?php

namespace App\Entity;

use App\Repository\GameStatsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameStatsRepository::class)
 */
class GameStats
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isGame;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $a1;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $a2;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $a3;

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

    public function getIsGame(): ?bool
    {
        return $this->isGame;
    }

    public function setIsGame(bool $isGame): self
    {
        $this->isGame = $isGame;

        return $this;
    }
    
    public function __construct($name)
    {
        $this->name = $name;
        $this->setIsGame(1);
        return $this;
    }

    public function getA1(): ?bool
    {
        return $this->a1;
    }

    public function setA1(?bool $a1): self
    {
        $this->a1 = $a1;

        return $this;
    }

    public function getA2(): ?bool
    {
        return $this->a2;
    }

    public function setA2(?bool $a2): self
    {
        $this->a2 = $a2;

        return $this;
    }

    public function getA3(): ?bool
    {
        return $this->a3;
    }

    public function setA3(?bool $a3): self
    {
        $this->a3 = $a3;

        return $this;
    }
}