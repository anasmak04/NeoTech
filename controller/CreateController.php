<?php

// CreateController.php

namespace controller;

require_once "../database/DbConfig.php";
require_once "../entities/Product.php";
use DbConfig;
use entities\Product;

class CreateController {
    private $database;

    public function __construct() {
        $dbConfig = new DbConfig();
        $this->database = $dbConfig->getConnection();
    }

    public function addProduct($name, $description, $price) {
        $product = new Product(null, $name, $description, $price);

        $stmt = $this->database->prepare("INSERT INTO product (name, description, price) VALUES (?, ?, ?)");


        $name1 = $product->getName();
        $description1 = $product->getDescription();
        $price1 = $product->getPrice();

        $stmt->bind_param("ssd", $name1, $description1, $price1);
        $stmt->execute();

        $stmt->close();

        header("Location: show.php");
        exit();
    }
}

if(isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $createController = new CreateController();
    $createController->addProduct($name, $description, $price);
}
