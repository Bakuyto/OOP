<?php
require_once ('../config/database.php');
class LoginModel {
    
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }  

    public function validateUser($username, $password) {
        $sql = "CALL User_login (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

}
?>