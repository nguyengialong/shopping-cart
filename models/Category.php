<?php
require_once ('models/Database.php');
class Category{
    var $conn;

    function __construct()
    {
        $connection_object = new Database();
        $this->conn = $connection_object->conn;
    }

    function all(){

        $data = array();

        $query = "SELECT * FROM categories";

        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $data[] =$row;
        }
        return $data;
    }

    function insert($data){

        $query = "INSERT INTO categories (name,image,parent_id,created_at)
		VALUES ('".$data['name']."','".$data['image']."','".$data['parent_id']."','".$data['created_at']."')";
        return $this->conn->query($query);
    }

    function delete($id){

        $query = "DELETE FROM categories WHERE id = ".$id." ";

        return $this->conn->query($query);
    }

    function edit($id){

        $query = "SELECT * FROM categories WHERE id = ".$id." ";
        $result = $this->conn->query($query);
        $category = array();
        while ($row = $result->fetch_assoc()) {
            $category[] = $row;
        }
        return $category;
    }

    function update($data,$id){
        $query = "UPDATE categories SET name = '".$data['name']."',image = '".$data['image']."',created_at = '".$data['created_at']."',update_at = '".$data['update_at']."' WHERE id = ".$id;
        return $this->conn->query($query);
    }


    function upload(){

        $target_dir = "public/uploads/images/";  // thư mục chứa file upload

        $target_file = $target_dir . basename($_FILES["image"]["name"]); // link sẽ upload file lên

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi
            echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
        } else { // Upload file có lỗi
            echo "Sorry, there was an error uploading your file.";
        }
    }



}
?>