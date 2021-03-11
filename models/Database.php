
<?php
class Database{
    var $conn;
    function __construct(){
        $servername = "localhost";//host vd : 255.123.45.21
        $username = "root";   // ten dang nhap
        $password = "12345678";    // mat khau
        $dbname = "manager";   // db muon ket noi

        // Tao ra ket noi den CSDL connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        $this->conn->set_charset("utf8"); // set utf-8 dể đọc dữ liệu tiếng Việt

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}

?>