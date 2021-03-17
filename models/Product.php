<?php
require_once ('models/Database.php');
class Product{

    var $conn;

    function __construct()
    {
        $connection_object = new Database();
        $this->conn = $connection_object->conn;
    }

    function all(){

        $data = array();

        $query = "SELECT * FROM products";

        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $data[] =$row;
        }
        return $data;
    }

    function DetailProduct($id){

        $query = "SELECT * FROM products  WHERE id = ".$id;
        // $query = "SELECT * FROM posts join categories on posts.category_id = ".$id."";
        $result = $this->conn->query($query)->fetch_assoc();
        // var_dump($result);
        return $result;
    }
    function ProductByCategory($id){
        $data = array();
        $query = "SELECT  products.* FROM products JOIN categories ON products.category_id = categories.id
                    WHERE categories.id = ".$id." ORDER BY products.created_at DESC";

        $result = $this->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $data[] =$row;
        }
        return $data;
    }

    function Cart($id){

        $data = array();

        $query = "SELECT * FROM products WHERE id = ".$id;

        $result = $this->conn->query($query)->fetch_assoc();

        return $result;
    }

    function ProductbyShirt(){
        $data = array();
        $query = "SELECT  products.* FROM products JOIN categories ON products.category_id = categories.id
                    WHERE products.category_id = 10 ORDER BY products.created_at DESC limit 3";

        $result = $this->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $data[] =$row;
        }
        return $data;
    }

    function ProductbyDress(){
        $data = array();
        $query = "SELECT  products.* FROM products JOIN categories ON products.category_id = categories.id
                    WHERE products.category_id = 12 ORDER BY products.created_at DESC limit 3";

        $result = $this->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $data[] =$row;
        }
        return $data;
    }

    function ProductbyCoat(){
        $data = array();
        $query = "SELECT  products.* FROM products JOIN categories ON products.category_id = categories.id
                    WHERE products.category_id = 13 ORDER BY products.created_at DESC limit 3";

        $result = $this->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $data[] =$row;
        }
        return $data;
    }

    function ProductbyPant(){
        $data = array();
        $query = "SELECT  products.* FROM products JOIN categories ON products.category_id = categories.id
                    WHERE products.category_id = 11 ORDER BY products.created_at DESC limit 3";

        $result = $this->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $data[] =$row;
        }
        return $data;
    }


    function search($text){
        $data = array();

        $query ="SELECT products.*,products.id as id  from products JOIN categories ON products.category_id = categories.id
        WHERE products.name LIKE '%$text%' OR categories.name LIKE '%$text%' ORDER BY products.created_at DESC";
        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $data[] =$row;
        }
        return $data;
    }

    function InsertProduct($data){

        $query = "INSERT INTO products (name,category_id,description,price,sale_price,discount_percent,image,created_at,size,image_product)
		VALUES ('".$data['name']."','".$data['category_id']."','".$data['description']."','".$data['price']."'
		,'".$data['sale_price']."','".$data['discount_percent']."','".$data['image']."'
		,'".$data['created_at']."','".$data['size']."','".$data['image_product']."')";
        return $this->conn->query($query);
    }

    function updateProduct($data,$id){
        $query = "UPDATE products SET name = '".$data['name']."',image = '".$data['image']."',
        description = '".$data['description']."',price = '".$data['price']."',discount_percent = '".$data['discount_percent']."',
        category_id = '".$data['category_id']."',created_at = '".$data['created_at']."',update_at = '".$data['update_at']."' WHERE id = ".$id;
        return $this->conn->query($query);
    }

    function edit($id){

        $query = "SELECT * FROM products WHERE id = ".$id." ";
        $result = $this->conn->query($query);
        $product = array();
        while ($row = $result->fetch_assoc()) {
            $product[] = $row;
        }
        return $product;
    }

    function delete($id){

        $query = "DELETE FROM products WHERE id = ".$id." ";

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
    function upload_images(){

        $target_dir = "public/uploads/images/";  // thư mục chứa file upload
        for ($i=0; $i < count($_FILES["image_product"]["name"]); $i++){
            $target_file = $target_dir . basename($_FILES["image_product"]["name"][$i]); // link sẽ upload file lên

            if (move_uploaded_file($_FILES["image_product"]["tmp_name"][$i], $target_file)) { // nếu upload file không có lỗi
                echo "The file ". basename( $_FILES["image_product"]["name"]). " has been uploaded.";
            } else { // Upload file có lỗi
                echo "Sorry, there was an error uploading your file.";
            }
        }

    }

    function CountProduct(){

        $query =  "SELECT COUNT(*) AS total FROM products";

        $result = $this->conn->query($query)->fetch_assoc();

        return $result;

    }

    function getDataPage($offset,$no_of_records_per_page){

        $data = array();

        $query ="SELECT * FROM products LIMIT $offset, $no_of_records_per_page";

        $result = $this->conn->query($query);

        while ($row = $result->fetch_assoc()){

            $data[] =$row;
        }

        return $data;
    }

}
?>