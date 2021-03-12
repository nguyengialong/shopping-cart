<?php
require_once('models/Database.php');

class Model_has_Role{

    var $conn;

    function __construct()
    {
        $connection_object = new Database();
        $this->conn = $connection_object->conn;

    }

    public function insertUR($user,$role){

        $query = "INSERT INTO model_has_role (role_id,user_id)
		                  VALUES ('".$role."','".$user."')";

        return $this->conn->query($query);

    }

    public function getRoleUser($id){
        $data = array();

        $query = "SELECT role_id FROM model_has_role  WHERE user_id = ".$id ;

        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {

            $data[] =$row;
        }
        return $data;
    }

    public function updateUR($id,$role){

        $query = "UPDATE model_has_role SET 
                        role_id = '".$role."' WHERE user_id = ".$id;

        return $this->conn->query($query);

    }

    public function deleteUR($id){

        $query = "DELETE FROM model_has_role WHERE user_id = ".$id." ";

        return $this->conn->query($query);
    }


}

?>