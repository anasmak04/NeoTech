<?php

namespace controller;

use DbConfig;
use entities\Product;
use ProductInterface;

require_once "../database/DbConfig.php";
require_once "../entities/Product.php";
require_once __DIR__ . "../dao/ProductInterface.php";



class ProductImplementation implements ProductInterface {
    private $database;

    public function __construct() {
        $dbConfig = new DbConfig();
        $this->database = $dbConfig->getConnection();
    }


    public function create($name, $description, $price){

        $product = Product::createInstance(null,$name,$description,$price);

        $stmt = $this->database->prepare("INSERT INTO product (name, description, price) VALUES (?, ?, ?)");

        $name1 = $product->getName();
        $description1 = $product->getDescription();
        $price1 = $product->getPrice();

        $stmt->bind_param("ssd", $name1, $description2, $price2);
        $stmt->execute();
        $stmt->close();
        $path = "../view/show.php";
        header("Location: ".$path);
        exit();

    }



    public function edit($id, $name, $description, $price){

        $sql = "UPDATE `product` SET `name`=?, `description`=?, `price`=? WHERE `id`=?";

        $stmt = $this->database->prepare($sql);
        $stmt->bind_param("sssi", $name, $description, $price, $id);
        $stmt->execute();
        $stmt->close();
        $path = "../view/show.php";
        header("Location: ".$path);
        exit();
    }

    public function deleteById($id){

        $sql = "DELETE FROM product WHERE id = ?";
        $stmt = $this->database->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        header("Location: ../view/show.php");
        exit();
    }


    public function findAll(){

        $sql = "SELECT * FROM product";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}


if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $productimplementation  = new ProductImplementation();
    $productimplementation->create($name, $description, $price);
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $productimplementation  = new ProductImplementation();
    $productimplementation->edit($id, $name, $description, $price);
}
