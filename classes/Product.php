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
}