<?php
require_once ('../config/database.php');
class AdminModel{
    public function __construct()
    {
        $this->db = new Database();
    }

}

?>