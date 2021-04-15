<?php


class Product
{
    //Properties
    public $name;
    public $description;
    public $price;

    //Constructor
    public function __construct($name, $description, $price)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }
}