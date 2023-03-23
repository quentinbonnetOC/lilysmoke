<?php

namespace App\Entity;

use App\Repository\DiyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DiyRepository::class)
 */
class Diy
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
    private $Dominant_notes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Flavour;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nicotine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Capacity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Origin;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $product;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $PG;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $VG;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TypeOfNicotine;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TypeOfAroma;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addedAlcohol;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $water;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $recommendedDosage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $maturationTime;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $collection;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDominantNotes(): ?string
    {
        return $this->Dominant_notes;
    }

    public function setDominantNotes(?string $Dominant_notes): self
    {
        $this->Dominant_notes = $Dominant_notes;

        return $this;
    }

    public function getFlavour(): ?string
    {
        return $this->Flavour;
    }

    public function setFlavour(?string $Flavour): self
    {
        $this->Flavour = $Flavour;

        return $this;
    }

    public function getNicotine(): ?string
    {
        return $this->Nicotine;
    }

    public function setNicotine(?string $Nicotine): self
    {
        $this->Nicotine = $Nicotine;

        return $this;
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

    public function getOrigin(): ?string
    {
        return $this->Origin;
    }

    public function setOrigin(?string $Origin): self
    {
        $this->Origin = $Origin;

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

    public function getPG(): ?string
    {
        return $this->PG;
    }

    public function setPG(string $PG): self
    {
        $this->PG = $PG;

        return $this;
    }

    public function getVG(): ?string
    {
        return $this->VG;
    }

    public function setVG(string $VG): self
    {
        $this->VG = $VG;

        return $this;
    }

    public function getTypeOfNicotine(): ?string
    {
        return $this->TypeOfNicotine;
    }

    public function setTypeOfNicotine(?string $TypeOfNicotine): self
    {
        $this->TypeOfNicotine = $TypeOfNicotine;

        return $this;
    }

    public function getTypeOfAroma(): ?string
    {
        return $this->TypeOfAroma;
    }

    public function setTypeOfAroma(?string $TypeOfAroma): self
    {
        $this->TypeOfAroma = $TypeOfAroma;

        return $this;
    }

    public function getAddedAlcohol(): ?string
    {
        return $this->addedAlcohol;
    }

    public function setAddedAlcohol(?string $addedAlcohol): self
    {
        $this->addedAlcohol = $addedAlcohol;

        return $this;
    }

    public function getWater(): ?string
    {
        return $this->water;
    }

    public function setWater(?string $water): self
    {
        $this->water = $water;

        return $this;
    }

    public function getRecommendedDosage(): ?string
    {
        return $this->recommendedDosage;
    }

    public function setRecommendedDosage(?string $recommendedDosage): self
    {
        $this->recommendedDosage = $recommendedDosage;

        return $this;
    }

    public function getMaturationTime(): ?string
    {
        return $this->maturationTime;
    }

    public function setMaturationTime(?string $maturationTime): self
    {
        $this->maturationTime = $maturationTime;

        return $this;
    }
    
    public function getCollection(): ?string
    {
        return $this->collection;
    }

    public function setCollection(?string $collection): self
    {
        $this->collection = $collection;

        return $this;
    }
}
