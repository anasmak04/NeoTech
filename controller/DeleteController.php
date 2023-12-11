<?php

use entities\Product;

require_once "../database/DbConfig.php";
require_once "../entities/Product.php";

class DeleteController{
    private $database;

    public function __construct() {
        $dbConfig = new DbConfig();
        $this->database = $dbConfig->getConnection();
    }

    public function DeleteProduct($id){
        $product = new Product($id, null , null , null );

        $sql = "DELETE FROM product WHERE id = ?";

        $stmt = $this->database->prepare($sql);
        $id1 = $product->getId();

        $stmt->bind_param("i", $id1);

        $stmt->execute();

        $stmt->close();



        exit();
    }
}
