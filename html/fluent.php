<?php
declare(strict_types=1);

class ShippingInfo
{
    private string $customerName = '';
    private string $address = '';
    private string $city = '';
    private string $postcode = '';

    public function setCustomer(string $name) : self
    {
        $this->customerName = $name;
        return $this;
    }

    public function setAddress(string $address) : self
    {
        $this->address = $address;
        return $this;
    }

    public function setCity(string $city) : self
    {
        $this->city = $city;
        return $this;
    }

    public function setPostcode(string $postcode) : self
    {
        $this->postcode = $postcode;
        return $this;
    }

    public function __toString()
    {
        return $this->customerName . ",\n" .
            $this->address . ",\n" .
            $this->city . ",\n" .
            $this->postcode;
    }

    public function countLetters()
    {
        return strlen( $this->__toString() );
    }
}

$n = new ShippingInfo;
$n->setCustomer('Derick Rethans')
    ->setAddress('Portland Place')
    ->setCity('London')
    ->setPostcode('W1A 1AA');

$letters = $n->countLetters();

echo $n, "\n";