<?php
require_once ('models/Database.php');
class Bill_detail{
    var $conn;

    function __construct()
    {
        $connection_object = new Database();
        $this->conn = $connection_object->conn;

    }

    function SaveBillDetail($bill_detail){

        $query = "INSERT INTO bill_detail (bill_id,product_id,quality,price,created_at)
		VALUES ('".$bill_detail['bill_id']."','".$bill_detail['product_id']."','".$bill_detail['quality']."','".$bill_detail['price']."'
		,'".$bill_detail['created_at']."')";
        return $this->conn->query($query);


    }
}
?>