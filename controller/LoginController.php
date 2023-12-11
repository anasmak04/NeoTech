<?php

use entities\Product;
use entities\User;

require_once "../database/DbConfig.php";
require_once "../entities/User.php";
class LoginController{
    private $database;

    public function __construct() {
        $dbConfig = new DbConfig();
        $this->database = $dbConfig->getConnection();
    }


    public function LogToAccount($username,$password){
    $product = new User(null,$username,$password,null);
    $sql = "SELECT *  FROM user WHERE username = ?";

    $stmt = $this->database->prepare($sql);
    if($stmt){
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $password1= $row['password'];
            if(password_verify($password,$password1)){
                $path = "../view/show.php";
                header("Location: ".$path);
            }
        }
    }
    }
}

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $loginController = new LoginController();
    $loginController->LogToAccount($username,$password);
}
