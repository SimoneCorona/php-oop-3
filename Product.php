<?php 
class Product {
    public $price;
    public $code;

    function __construct($_price, $_code)
    {
        $this->price = $_price;
        $this->code = $_code;
    }
}
