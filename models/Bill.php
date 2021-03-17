<?php
require_once ('models/Database.php');
class Bill{
    var $conn;

    function __construct()
    {
        $connection_object = new Database();
        $this->conn = $connection_object->conn;

    }

    function all(){

        $data = array();

        $query = "SELECT * FROM bill";

        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $data[] =$row;
        }
        return $data;
    }

    function save($data_bill){
        $query = "INSERT INTO bill (user_id,total,date_oder,created_at)
		VALUES ('".$data_bill['user_id']."','".$data_bill['total']."','".$data_bill['date_oder']."','".$data_bill['created_at']."')";
        return $this->conn->query($query);

    }
}
?>