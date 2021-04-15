<?php


class ShoppingCart
{
    //Properties
    private $date;
    private $current_price;
    private Product $product;

    //Constructor
    public function __construct($date, $current_price, $product)
    {
        $this->date = $date;
        $this->current_price = $current_price;
        $this->product = $product;
    }
}