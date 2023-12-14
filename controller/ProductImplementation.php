<?php


use App\dao\ProductInterface;
use entities\Product;

require_once "../database/DbConfig.php";
require_once "../entities/Product.php";
require_once "../dao/ProductInterface.php";
class ProductImplementation implements ProductInterface {
    private $database;

    public function __construct() {
        $dbConfig = new DbConfig();
        $this->database = $dbConfig->getConnection();
    }


    public function save($Product){
        $name = $Product->getName();
        $description = $Product->getDescription();
        $price = $Product->getPrice();
        $stmt = $this->database->prepare("INSERT INTO product (name, description, price) VALUES (?, ?, ?)");
        $stmt->bind_param("ssd", $name, $description, $price);
        $stmt->execute();
        $stmt->close();
        $path = "../view/show.php";
        header("Location: ".$path);
        exit();

    }



    public function edit($Product){

        $id = $Product->getId();
        $name = $Product->getName();
        $description = $Product->getDescription();
        $price = $Product->getPrice();

        $sql = "UPDATE `product` SET `name`=?, `description`=?, `price`=? WHERE `id`=?";
        $stmt = $this->database->prepare($sql);
        $stmt->bind_param("ssii", $name, $description, $price, $id);


        if($stmt){

            $stmt->execute();
            $stmt->close();

            $path = "../view/show.php";
            header("Location: ".$path);
            echo "works";
        }

        else {
            echo "error";
        }
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


if(isset($_POST['add_submit'])) {
    $product = Product::createInstance(null,"a","e",null);
    $product->setName($_POST['name']);
    $product->setDescription($_POST['description']);
    $product->setPrice($_POST['price']);
    $productimplementation  = new ProductImplementation();
    $productimplementation->save($product);
}

if (isset($_POST['edit_submit'])) {

    $product = Product::createInstance(null,"a","e",null);
    $product->setId($_POST["id"]);
    $product->setName($_POST['name']);
    $product->setDescription($_POST['description']);
    $product->setPrice($_POST['price']);

    $productimplementation  = new ProductImplementation();
    $productimplementation->edit($product);
}
