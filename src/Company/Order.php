<?php 

namespace App\Company;

use DateTimeImmutable;

class Order {

    const TVA_NORMAL = 20;
    const TVA_INTERMEDIAIRE = 10;

    private string $reference;

    private Customer $customer;

    private DateTimeImmutable $date;

    private float $totalHT = 0;

    private int $vat = Order::TVA_NORMAL;

    public function getReference(): string 
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;
        return $this;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    public function setCustomer(Customer $customer): self
    {
        $this->customer = $customer;
        return $this;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(DateTimeImmutable $date): self
    {
        $this->date = $date;
        return $this;
    }

    public function getTotalHT(): float
    {
        return $this->totalHT;
    }

    public function setTotalHT(float $totalHT): self
    {
        $this->totalHT = $totalHT;
        return $this;
    }

    public function getVat(): int
    {
        return $this->vat;
    }

    public function setVat(int $vat): self
    {
        $this->vat = $vat;
        return $this;
    }

    public function getTotalTTC(): float
    {
        // (TVA 20) TTC = HT * 1,20
        return $this->totalHT * (1 + $this->vat / 100);
    }
}