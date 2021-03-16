<?php
/**
 *
 */
require_once('models/User.php');
require_once ('models/Model_has_Role.php');
require_once ('controller/CheckPermissionController.php');

class LoginController
{
    public $checkPermission;
    public $modelHasRole;


//    public $modelHasRole;
//    public $roleHasPermission;
//    public $permission;

    public function __construct()
    {
        $this->checkPermission = new CheckPermissionController();
        $this->modelHasRole = new Model_has_Role();

//
//        $this->modelHasRole = new Model_has_Role();
//        $this->roleHasPermission = new Role_has_Permission();
//        $this->permission = new Permission();

    }

    function form(){

        require_once('views/login/login.php');

    }

    function form_register(){

        require_once('views/login/register.php');
    }



    function login(){

        $data['email'] = $_POST['email'];
        $data['password'] = $_POST['password'];
        $user = new user();
        $result = $user->getUser($data);



        if ($result!=null) {

            $_SESSION['user'] = $result;
//            $_SESSION['permission'] = $allPermission;
            $_SESSION['islogin'] = 1;
            $per = 'manager page';
            $check = $this->checkPermission->CheckPer($per);
            if($check){
                header('Location: ?view=admin&act=index');
            }else{
                header('Location: ?view=&act=');
            }

        }else{
            header('Location: ?view=login&act=');
            setcookie('er_login','Email hoặc mật khẩu không đúng !',time() + 1);
        }

    }

    function register(){
//        require_once('views/login/register.php');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];
        if($password != $re_password){
            $_SESSION['error']= "Mật khẩu không giống nhau !";
           header('Location: ?view=login&act=form_register');

        }else{
            unset($_SESSION['error']);

            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $password,
                'status' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'role' => 2,
            ];
            $RoleID = $_POST['roles'];
            $user = new user();
            $UserId = $user->Register_User($data);
            $this->modelHasRole->insertUR($UserId,$RoleID);
            setcookie("msg", 'Đăng ký tài khoản thành công', time() + 1);
            header('Location: ?view=login&act=');
        }


    }

    function forgot_password(){

        require_once('views/login/forgot_password.php');
    }

    function get_password(){

        require_once('models/mail.php');
        $data = $_POST['email'];
        $user = new user();
        $result = $user->getPassword($data);
        $email = $result['email'];
        $name = $result['name'];
        $password = $result['password'];
        $subject='Quên mật khẩu đăng nhập';
//        ob_start();
//         include_once('views/mail/sendmail.php');
        $contents = 'abc';
        // $contents ='abc' ;
//        ob_end_clean();
        if(isset($result['email'])){
            send_email($email,$name,$contents,$subject,$password);
            header("Location: ?view=admin&act=''");
        }else{
            setcookie('er_mail','Email của bạn không đúng!', time()+1);
            header("Location: ?view=login&act=forgot_password");
        }
    }

    function change_password(){

        require_once('views/login/change_password.php');

    }

    function new_password(){

        $data['id'] = $_GET['id'];
        $data['new_password'] = $_POST['new_password'];
        $user = new user();
        $result = $user->getNewpassword($data);
        header('Location: ?view=admin&act=index');

    }

    function error(){

        require_once('views/login/error.php');
    }

    function logout(){

        session_destroy();
//        unset($_SESSION['cart']);
        header('Location: ?view=login&act=');
    }

}
?>