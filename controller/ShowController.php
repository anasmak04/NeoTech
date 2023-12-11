<?php

require_once "../database/DbConfig.php";

class ShowController {
    private $database;

    public function __construct() {
        $dbConfig = new DbConfig();
        $this->database = $dbConfig->getConnection();
    }


    public function getProducts(){
        $sql = "SELECT * FROM product";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }


}