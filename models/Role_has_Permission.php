<?php
require_once('models/Database.php');

class Role_has_Permission
{

    var $conn;

    function __construct()
    {
        $connection_object = new Database();
        $this->conn = $connection_object->conn;

    }

    public function insertRP($role, $permission)
    {

        $query = "INSERT INTO role_has_permission (role_id,permission_id)
		                  VALUES ('" . $role . "','" . $permission . "')";

        return $this->conn->query($query);

    }

    public function SeederRP($role, $permission)
    {

        $query = "INSERT INTO role_has_permission (role_id,permission_id)
		                  VALUES ('" . $role . "','" . $permission . "')";

        return $this->conn->query($query);

    }

    public function RgetP($id)
    {

        $data = array();

        $query = "SELECT permission_id FROM role_has_permission  WHERE role_id = " . $id;

        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {

            $data[] = $row;
        }
        return $data;
    }

    function updateRgetP($id, $per)
    {

        $query = "UPDATE role_has_permission SET role_id = '" . $id . "',
                        permission_id = '" . $per . "' WHERE role_id = " . $id;

        return $this->conn->query($query);
    }

    function deteleRgetP($id)
    {

        $query = "DELETE FROM role_has_permission WHERE role_id = " . $id . " ";

        return $this->conn->query($query);
    }


}

?>