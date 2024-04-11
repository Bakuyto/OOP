<?php

class Database {
    private $host = "localhost";
    private $db_name = "inventorymanagement";
    private $username = "root";
    private $password = "";
    private $conn;

    public function getConnection(){
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        } catch (mysqli_sql_exception $e) {
            die("Connection failed: " . $e->getMessage());
        }

        return $this->conn;
    }
}

?>
