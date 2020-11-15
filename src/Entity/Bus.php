<?php

namespace App\Entity;

use App\Repository\BusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BusRepository::class)
 */
class Bus
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
    private $id_bus;

    /**
     * @ORM\Column(type="bigint")
     */
    private $ci;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombres;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tipo_lic_conducir;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cooperativa;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_unidad;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $provincia;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tipo_banco;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBus(): ?string
    {
        return $this->id_bus;
    }

    public function setIdBus(string $id_bus): self
    {
        $this->id_bus = $id_bus;

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

    public function getTipoLicConducir(): ?string
    {
        return $this->tipo_lic_conducir;
    }

    public function setTipoLicConducir(string $tipo_lic_conducir): self
    {
        $this->tipo_lic_conducir = $tipo_lic_conducir;

        return $this;
    }

    public function getCooperativa(): ?string
    {
        return $this->cooperativa;
    }

    public function setCooperativa(string $cooperativa): self
    {
        $this->cooperativa = $cooperativa;

        return $this;
    }

    public function getNumUnidad(): ?int
    {
        return $this->num_unidad;
    }

    public function setNumUnidad(int $num_unidad): self
    {
        $this->num_unidad = $num_unidad;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getTipoBanco(): ?string
    {
        return $this->tipo_banco;
    }

    public function setTipoBanco(?string $tipo_banco): self
    {
        $this->tipo_banco = $tipo_banco;

        return $this;
    }
}
