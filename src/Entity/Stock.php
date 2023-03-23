<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StockRepository")
 */
class Stock
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $product;

    /**
     * @ORM\Column(type="integer")
     */
    private $remainingQuantity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $alertLimitQuantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(string $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getRemainingQuantity(): ?int
    {
        return $this->remainingQuantity;
    }

    public function setRemainingQuantity(int $remainingQuantity): self
    {
        $this->remainingQuantity = $remainingQuantity;

        return $this;
    }

    public function getAlertLimitQuantity(): ?int
    {
        return $this->alertLimitQuantity;
    }

    public function setAlertLimitQuantity(?int $alertLimitQuantity): self
    {
        $this->alertLimitQuantity = $alertLimitQuantity;

        return $this;
    }
}
