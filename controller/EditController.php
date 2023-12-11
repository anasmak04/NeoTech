<?php

// EditController.php
use entities\Product;

require_once "../database/DbConfig.php";
require_once "../entities/Product.php";

class EditController {
    private $database;

    public function __construct() {
        $dbConfig = new DbConfig();
        $this->database = $dbConfig->getConnection();
    }

    public function editProduct($id, $name, $description, $price) {
        $sql = "UPDATE `product` SET `name`=?, `description`=?, `price`=? WHERE `id`=?";

        $stmt = $this->database->prepare($sql);
        $stmt->bind_param("sssi", $name, $description, $price, $id);
        $stmt->execute();
        $stmt->close();
        $path = "../view/show.php";
        header("Location: ".$path);
        exit();
    }
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $editController = new EditController();
    $editController->editProduct($id, $name, $description, $price);
}
