<?php
require_once('models/Database.php');
class Permission{

    var $conn;

    function __construct()
    {
        $connection_object = new Database();
        $this->conn = $connection_object->conn;

    }

    public function all(){

        $data = array();

        $query = "SELECT * FROM permissions";

        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {

            $data[] =$row;
        }

        return $data;
    }

    function insert($data){

        $query = "INSERT INTO permissions (name,created_at)
		VALUES ('".$data['name']."','".$data['created_at']."')";
        return $this->conn->query($query);
    }

    function delete($id){

        $query = "DELETE FROM permissions WHERE id = ".$id." ";

        return $this->conn->query($query);
    }

    function edit($id){

        $query = "SELECT * FROM permissions WHERE id = ".$id." ";
        $result = $this->conn->query($query);
        $permission = array();
        while ($row = $result->fetch_assoc()) {
            $permission[] = $row;
        }
        return $permission;
    }

    function update($data,$id){

        $query = "UPDATE permissions SET name = '".$data['name']."',created_at = '".$data['created_at']."',update_at = '".$data['update_at']."' WHERE id = ".$id;
        return $this->conn->query($query);
    }


}
?>