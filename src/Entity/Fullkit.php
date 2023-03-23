<?php

namespace App\Entity;

use App\Repository\FullkitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FullkitRepository::class)
 */
class Fullkit
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

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $power;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Battery;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $autonomy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Operation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $height;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $width;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $depth;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $matter;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NumberOfBatteries;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TypeOfBatteries;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $RechargableByUsb;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rechargingConnectors;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $MaxPower;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $inputVoltage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $outputVoltage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chargingVoltage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $chargingCurrent;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $compatibleResistance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addIndividual;

    public function getPower(): ?string
    {
        return $this->power;
    }

    public function setPower(?string $power): self
    {
        $this->power = $power;

        return $this;
    }

    public function getBattery(): ?string
    {
        return $this->Battery;
    }

    public function setBattery(?string $Battery): self
    {
        $this->Battery = $Battery;

        return $this;
    }

    public function getAutonomy(): ?string
    {
        return $this->autonomy;
    }

    public function setAutonomy(?string $autonomy): self
    {
        $this->autonomy = $autonomy;

        return $this;
    }

    public function getOperation(): ?string
    {
        return $this->Operation;
    }

    public function setOperation(?string $Operation): self
    {
        $this->Operation = $Operation;

        return $this;
    }

    public function getHeight(): ?string
    {
        return $this->height;
    }

    public function setHeight(?string $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWidth(): ?string
    {
        return $this->width;
    }

    public function setWidth(?string $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getDepth(): ?string
    {
        return $this->depth;
    }

    public function setDepth(?string $depth): self
    {
        $this->depth = $depth;

        return $this;
    }

    public function getMatter(): ?string
    {
        return $this->matter;
    }

    public function setMatter(?string $matter): self
    {
        $this->matter = $matter;

        return $this;
    }

    public function getWeight(): ?string
    {
        return $this->weight;
    }

    public function setWeight(?string $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getNumberOfBatteries(): ?string
    {
        return $this->NumberOfBatteries;
    }

    public function setNumberOfBatteries(?string $NumberOfBatteries): self
    {
        $this->NumberOfBatteries = $NumberOfBatteries;

        return $this;
    }

    public function getTypeOfBatteries(): ?string
    {
        return $this->TypeOfBatteries;
    }

    public function setTypeOfBatteries(?string $TypeOfBatteries): self
    {
        $this->TypeOfBatteries = $TypeOfBatteries;

        return $this;
    }

    public function getRechargableByUsb(): ?string
    {
        return $this->RechargableByUsb;
    }

    public function setRechargableByUsb(?string $RechargableByUsb): self
    {
        $this->RechargableByUsb = $RechargableByUsb;

        return $this;
    }

    public function getRechargingConnectors(): ?string
    {
        return $this->rechargingConnectors;
    }

    public function setRechargingConnectors(?string $rechargingConnectors): self
    {
        $this->rechargingConnectors = $rechargingConnectors;

        return $this;
    }

    public function getMaxPower(): ?string
    {
        return $this->MaxPower;
    }

    public function setMaxPower(?string $MaxPower): self
    {
        $this->MaxPower = $MaxPower;

        return $this;
    }

    public function getInputVoltage(): ?string
    {
        return $this->inputVoltage;
    }

    public function setInputVoltage(?string $inputVoltage): self
    {
        $this->inputVoltage = $inputVoltage;

        return $this;
    }

    public function getOutputVoltage(): ?string
    {
        return $this->outputVoltage;
    }

    public function setOutputVoltage(?string $outputVoltage): self
    {
        $this->outputVoltage = $outputVoltage;

        return $this;
    }

    public function getChargingVoltage(): ?string
    {
        return $this->chargingVoltage;
    }

    public function setChargingVoltage(?string $chargingVoltage): self
    {
        $this->chargingVoltage = $chargingVoltage;

        return $this;
    }

    public function getChargingCurrent(): ?string
    {
        return $this->chargingCurrent;
    }

    public function setChargingCurrent(?string $chargingCurrent): self
    {
        $this->chargingCurrent = $chargingCurrent;

        return $this;
    }

    public function getCompatibleResistance(): ?string
    {
        return $this->compatibleResistance;
    }

    public function setCompatibleResistance(?string $compatibleResistance): self
    {
        $this->compatibleResistance = $compatibleResistance;

        return $this;
    }

    public function getAddIndividual(): ?string
    {
        return $this->addIndividual;
    }

    public function setAddIndividual(string $addIndividual): self
    {
        $this->addIndividual = $addIndividual;

        return $this;
    }
}
