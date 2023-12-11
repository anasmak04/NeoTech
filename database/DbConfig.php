<?php

class DbConfig
{

    protected $username = "root";
    protected $password = "";
    protected $dbname = "NeoTech";
    protected $servername = "localhost";
    protected $db;

    public function __construct(){

        $this->db = new mysqli($this->servername,$this->username,$this->password,$this->dbname);

        if($this->db->connect_error){
            die("connection failed");
        }

        else {
            echo "connection work";
        }

    }








}