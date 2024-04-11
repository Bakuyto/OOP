<?php
require_once('../app/models/AdminModel.php');
class AdminController extends AdminModel{

    public function showAdmin(){
        require_once('../app/views/admin/admin.php');
    }
}

?>