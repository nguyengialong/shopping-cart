<?php
class Middleware{
    function checklogin(){
        // check login
        if ($_SESSION['islogin']!=1) {
            header('Location: ?view=login&act=');
        }
    }
}
?>