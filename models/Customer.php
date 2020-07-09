<?php
require_once ('models/Database.php');
class Customer{
    var $conn;

    function __construct()
    {
        $connection_object = new Database();
        $this->conn = $connection_object->conn;

    }

    function all(){

        $data = array();

        $query = "SELECT * FROM customer";

        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $data[] =$row;
        }
        return $data;
    }


    function SaveCustomer($data){

        $query = "INSERT INTO customer (name,gender,email,address,phone_number,created_at)
		VALUES ('".$data['name']."','".$data['gender']."','".$data['email']."','".$data['address']."',
		'".$data['phone_number']."','".$data['created_at']."')";
        return $this->conn->query($query);

    }
}
?>