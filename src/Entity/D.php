<?php

namespace App\Entity;

use App\Repository\DRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DRepository::class)
 */
class D
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $d;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=5)
     */
    private $a;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $n = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getD(): ?\DateTimeInterface
    {
        return $this->d;
    }

    public function setD(?\DateTimeInterface $d): self
    {
        $this->d = $d;

        return $this;
    }

    public function getA(): ?string
    {
        return $this->a;
    }

    public function setA(string $a): self
    {
        $this->a = $a;

        return $this;
    }

    public function getN(): ?array
    {
        return $this->n;
    }

    public function setN(?array $n): self
    {
        $this->n = $n;

        return $this;
    }
}
