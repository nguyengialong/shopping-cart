<?php
require_once('models/Database.php');
class Role{

    var $conn;

    function __construct()
    {
        $connection_object = new Database();
        $this->conn = $connection_object->conn;

    }

    public function all(){

        $data = array();

        $query = "SELECT * FROM roles";

        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {

            $data[] =$row;
        }
        return $data;
    }

    function insert($data){

        $query = "INSERT INTO roles (name,created_at)
		VALUES ('".$data['name']."','".$data['created_at']."')";

        $this->conn->query($query);

        return $this->conn->insert_id;

    }

    function SeederRole($data){

        $query = "INSERT INTO roles (name,created_at)
		VALUES ('".$data['name']."','".$data['created_at']."')";

        $this->conn->query($query);

        return $this->conn->insert_id;

    }

    function delete($id){

        $query = "DELETE FROM roles WHERE id = ".$id." ";

        return $this->conn->query($query);
    }

    function edit($id){

        $query = "SELECT * FROM roles WHERE id = ".$id." ";
        $result = $this->conn->query($query);
        $role = array();
        while ($row = $result->fetch_assoc()) {
            $role[] = $row;
        }
        return $role;
    }

    function updateRole($data,$id){

        $query = "UPDATE roles SET name = '".$data['name']."',
                        created_at = '".$data['created_at']."',updated_at = '".$data['updated_at']."' WHERE id = ".$id;

         return $this->conn->query($query);


    }




}
?>