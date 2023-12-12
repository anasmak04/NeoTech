<?php

namespace entities;

use http\Exception\InvalidArgumentException;

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;


    public static function createInstance($id, $name, $description, $price){
    $product = new Product();
    $product->id = $id;
    $product->name = $name;
    $product->description = $description;
    $product->price = $price;
    if($name == null || empty($name)) throw new InvalidArgumentException("name cannot be empty or null");
    if($description == null || empty($description)) throw new InvalidArgumentException("description cannot be empty or null");
        return $product;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function getPrice()
    {
        return $this->price;
    }


    public function setPrice($price)
    {
        $this->price = $price;
    }





}