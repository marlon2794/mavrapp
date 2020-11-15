<?php

namespace App\Entity;

use App\Repository\PersonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonRepository::class)
 */
class Person
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="bigint")
     */
    private $ci;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $idperson;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tipobanco;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombres(): ?string
    {
        return $this->nombres;
    }

    public function setNombres(string $nombres): self
    {
        $this->nombres = $nombres;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getCi(): ?string
    {
        return $this->ci;
    }

    public function setCi(string $ci): self
    {
        $this->ci = $ci;

        return $this;
    }

    public function getIdperson(): ?string
    {
        return $this->idperson;
    }

    public function setIdperson(string $idperson): self
    {
        $this->idperson = $idperson;

        return $this;
    }

    public function getTipobanco(): ?string
    {
        return $this->tipobanco;
    }

    public function setTipobanco(?string $tipobanco): self
    {
        $this->tipobanco = $tipobanco;

        return $this;
    }
}
