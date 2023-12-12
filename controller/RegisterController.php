<?php


use entities\User;

require_once "../database/DbConfig.php";
require_once "../entities/User.php";
class RegisterController{

    private $database;

    public function __construct() {
        $dbConfig = new DbConfig();
        $this->database = $dbConfig->getConnection();
    }

    public function CreateAccount($fullname,$id_role,$username,$password){

        $sql = "INSERT INTO `user`(`fullname`, `id_role`,   `username`, `password`) VALUES (?,?,?,?)";
        $user = new User(null,$fullname,$id_role,$username,$password,null);
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->database->prepare($sql);

        if($stmt){
            $stmt->bind_param("siss", $fullname, $id_role ,$username,$hashedPwd);
            $stmt->execute();
            $id2 = $this->database->insert_id;


            $sql2 = "INSERT INTO `User_Role`(`user_id`, `role_id`) VALUES (?,2)";
            $stmt2 = $this->database->prepare($sql2);

            if($stmt2){
                $stmt2->bind_param("i", $id2);
                $stmt2->execute();

                $path = "../view/Login.php";
                header("Location: ".$path);
            }

            else {
                echo "error";
            }

        }

    }
}

if(isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = 2;
    $registerController = new RegisterController();
    $registerController->CreateAccount($fullname,$role,$username,$password);

}
