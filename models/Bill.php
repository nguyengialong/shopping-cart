<?php
require_once ('models/Database.php');
class Bill{
    var $conn;

    function __construct()
    {
        $connection_object = new Database();
        $this->conn = $connection_object->conn;

    }


}
?>