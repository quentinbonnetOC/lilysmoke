<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaymentRepository")
 */
class Payment
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
    private $amount;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $paymentChoice;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getamount(): ?int
    {
        return $this->amount;
    }

    public function setamount(?int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getPaymentChoice(): ?string
    {
        return $this->paymentChoice;
    }

    public function setPaymentChoice(?string $paymentChoice): self
    {
        $this->paymentChoice = $paymentChoice;

        return $this;
    }
}
