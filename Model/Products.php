<?php
/**
 * Created by PhpStorm.
 * User: tuan
 * Date: 24/06/19
 * Time: 13:53
 */
namespace Model;
class Products
{
    public $id;
    public $name;
    public $price;
    public $status;
    public $producer;

    public function __construct($name, $price, $status, $producer)
    {
        $this->name = $name;
        $this->price = $price;
        $this->status = $status;
        $this->producer = $producer;
    }
}