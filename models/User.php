<?php
require_once('models/Database.php');

class User
{
    var $conn;

    function __construct()
    {
        $connection_object = new Database();
        $this->conn = $connection_object->conn;

    }

    function all()
    {

        $data = array();

        $query = "SELECT * FROM users";

        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function getUser($data)
    {

        $query = "SELECT * FROM users WHERE email ='" . $data['email'] . "' AND password = '" . $data['password'] . "'";
        // Thuc thi cau lenh truy van co so du lieu

        $user = $this->conn->query($query)->fetch_assoc();

        return $user;

    }

    function getPassword($data)
    {

        $query = "SELECT password,name,email FROM users WHERE email ='" . $data . "'";
        $password = $this->conn->query($query)->fetch_assoc();
        return $password;

    }

    function getNewpassword($data)
    {
        $query = "UPDATE users SET password = '" . $data['new_password'] . "' WHERE id = " . $data['id'];
        return $this->conn->query($query);
    }

    function Register_User($data)
    {

        $query = "INSERT INTO users (name,email,password,status,created_at,phone,address,role)
		VALUES ('" . $data['name'] . "','" . $data['email'] . "','" . md5($data['password']) . "','" . $data['status'] . "',
		'" . $data['created_at'] . "','" . $data['phone'] . "','" . $data['address'] . "','" . $data['role'] . "')";

        $this->conn->query($query);

        return $this->conn->insert_id;
    }

    function SeederUser($data)
    {

        $query = "INSERT INTO users (name,email,password,status,created_at,phone,address,role)
		VALUES ('" . $data['name'] . "','" . $data['email'] . "','" . md5($data['password']) . "','" . $data['status'] . "',
		'" . $data['created_at'] . "','" . $data['phone'] . "','" . $data['address'] . "','" . $data['role'] . "')";

        $this->conn->query($query);

        return $this->conn->insert_id;
    }

    function insert($data)
    {

        $query = "INSERT INTO users (name,email,password,created_at,phone,address)
		VALUES ('" . $data['name'] . "','" . $data['email'] . "','" . md5($data['password']) . "',
		'" . $data['created_at'] . "','" . $data['phone'] . "','" . $data['address'] . "')";

        $this->conn->query($query);

        return $this->conn->insert_id;
    }

    function deleteUser($id)
    {

        $query = "DELETE FROM users WHERE id = " . $id . " ";

        return $this->conn->query($query);
    }

    function edit($id)
    {

        $query = "SELECT * FROM users WHERE id = " . $id . " ";
        $result = $this->conn->query($query);
        $user = array();
        while ($row = $result->fetch_assoc()) {
            $user[] = $row;
        }
        return $user;
    }

    function update($data, $id)
    {

        $query = "UPDATE users SET name = '" . $data['name'] . "',email = '" . $data['email'] . "',
        phone = '" . $data['phone'] . "',address = '" . $data['address'] . "',created_at = '" . $data['created_at'] . "',update_at = '" . $data['update_at'] . "' WHERE id = " . $id;
        return $this->conn->query($query);
    }

    function checkEmail($data)
    {

        $query = "SELECT email FROM users WHERE email ='" . $data . "'";
        $email = $this->conn->query($query)->fetch_assoc();
        return $email;
    }

    function CountUser()
    {

        $query = "SELECT COUNT(*) AS total FROM users";
        $result = $this->conn->query($query)->fetch_assoc();

        return $result;

    }

    function getDataPage($offset, $limit_recode)
    {
        $data = array();

        $query = "SELECT * FROM users LIMIT $offset, $limit_recode";

        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }


}

?>