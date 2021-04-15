<?php


class Product
{
    //Properties
    private $name;
    private $description;
    private $price;

    //Constructor
    public function __construct($name, $description, $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function __toString(): string
    {
        return $this->name." ; ".$this->description." ; ".$this->price;
    }
}