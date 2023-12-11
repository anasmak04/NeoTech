<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


class DbConfig {
    protected $username;
    protected $password;
    protected $dbname;
    protected $servername;
    protected $db;

    public function __construct() {
        $this->username = $_ENV["DB_username"];
        $this->password = $_ENV["DB_password"];
        $this->dbname = $_ENV["DB_dbname"];
        $this->servername = $_ENV["DB_servername"];
    }

    public function getConnection() {
        $this->db = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }

        return $this->db;
    }
}





