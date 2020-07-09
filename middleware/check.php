<?php
class Middleware{
    function checklogin(){

        if ($_SESSION['islogin']!=1) {
            header('Location: ?view=login&act=');
        }
    }
}
?>