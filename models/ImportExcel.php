<?php
require_once('models/Database.php');

class ImportExcel{

    var $conn;

    function __construct()
    {
        $connection_object = new Database();
        $this->conn = $connection_object->conn;

    }
    function insert($data)
    {

        $date = date("Y-m-d H:i:s");

        $query = "INSERT INTO users (name,email,password,created_at,phone,address)
		VALUES ('".$data['name']."','".$data['email']."','".'123456'."',
		'".$date."','".$data['phone']."','".$data['address']."')";

        return  $this->conn->query($query);

    }



}

?>