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

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isWin;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $b1;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $b2;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $b3;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $c1;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $c2;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $c3;
    

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

    public function getIsWin(): ?bool
    {
        return $this->isWin;
    }

    public function setIsWin(?bool $isWin): self
    {
        $this->isWin = $isWin;

        return $this;
    }

    public function getB1(): ?bool
    {
        return $this->b1;
    }

    public function setB1(?bool $b1): self
    {
        $this->b1 = $b1;

        return $this;
    }

    public function getB2(): ?bool
    {
        return $this->b2;
    }

    public function setB2(?bool $b2): self
    {
        $this->b2 = $b2;

        return $this;
    }

    public function getB3(): ?bool
    {
        return $this->b3;
    }

    public function setB3(?bool $b3): self
    {
        $this->b3 = $b3;

        return $this;
    }

    public function getC1(): ?bool
    {
        return $this->c1;
    }

    public function setC1(?bool $c1): self
    {
        $this->c1 = $c1;

        return $this;
    }

    public function getC2(): ?bool
    {
        return $this->c2;
    }

    public function setC2(?bool $c2): self
    {
        $this->c2 = $c2;

        return $this;
    }

    public function getC3(): ?bool
    {
        return $this->c3;
    }

    public function setC3(?bool $c3): self
    {
        $this->c3 = $c3;

        return $this;
    }

    
}