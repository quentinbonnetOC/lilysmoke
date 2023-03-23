<?php

namespace App\Entity;

use App\Repository\AtoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AtoRepository::class)
 */
class Ato
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $product;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $length;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $diameter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Capacity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resistance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $filling;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $airflow;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCapacity(): ?string
    {
        return $this->Capacity;
    }

    public function setCapacity(?string $Capacity): self
    {
        $this->Capacity = $Capacity;

        return $this;
    }

    public function getProduct(): ?int
    {
        return $this->product;
    }

    public function setProduct(?int $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getLength(): ?string
    {
        return $this->length;
    }

    public function setLength(?string $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function getDiameter(): ?string
    {
        return $this->diameter;
    }

    public function setDiameter(?string $diameter): self
    {
        $this->diameter = $diameter;

        return $this;
    }

    public function getResistance(): ?string
    {
        return $this->resistance;
    }

    public function setResistance(?string $resistance): self
    {
        $this->resistance = $resistance;

        return $this;
    }

    public function getFilling(): ?string
    {
        return $this->filling;
    }

    public function setFilling(?string $filling): self
    {
        $this->filling = $filling;

        return $this;
    }

    public function getAirflow(): ?string
    {
        return $this->airflow;
    }

    public function setAirflow(?string $airflow): self
    {
        $this->airflow = $airflow;

        return $this;
    }
}
